<?php
//Se nao tiver logado ainda, fazer o login
$error_msg="";
//echo $_SERVER['PHP_SELF'];
session_start();
if(!isset($_SESSION['user'])){
    if(isset($_POST['Submit'])){
        //connect to database
        require_once ('dbvar.php');    
        $db= mysqli_connect(DBHOST, DBUSER, DBPW, DBNAME);
        //"clean" the variables
        $user= mysqli_real_escape_string($db,trim($_POST['user']));
        $pw= mysqli_real_escape_string($db,trim($_POST['pw']));
        //send query to serve
        //USE PASSWORD() FUNCTION INSTEAD OF SHA()(testar sem isso)
        if(!empty($user) && !empty($pw)){
        $query="SELECT * FROM users WHERE user='$user' AND pw='$pw';";
        $data= mysqli_query($db, $query);
        if(mysqli_num_rows($data) == '1' ){
            $row= mysqli_fetch_array($data);
            //session_start();
            $_SESSION['user']=$user;
            $_SESSION['username']=$row['username'];
            $url=$_SERVER['HTTP_REFERER'];
            //echo $url;
            header('Location:'.$url);
            
            exit();
        }
        else{
            $error_msg="Usário/Senha Incorretos";
        }
        }
        else{
            $error_msg="Por favor preencher todos os campos";
        }
   
    }
    ?>
        
    <!DOCTYPE html>
        <html>
            <head>
                <title>Log in</title>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
            </head>
            <body>
                <h2>Bem Vindo a Nafisio</h2>                
                <?php if(empty($_SESSION['user'])){
                    echo "$error_msg";                
                ?>
                <form method="post" action="login.php">
                    <label>Username</label>
                    <input type="text" name="user">
                    <br/>
                    <label> Senha</label>
                    <input type="password" name="pw">
                    <input type="submit" name="Submit" value="Entrar">
                    <a href="cadastro.php">Cadastre-se</a>

                </form>
                <?php }
                else{
                    echo 'Login feito com sucesso';
                    echo '<a href="pagina1.php">Pagina1</a>';
                }
                ?>
            </body>
        </html>
            <?php
    
exit();}

?>
           