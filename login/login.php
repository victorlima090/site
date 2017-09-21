<?php
//Se nao tiver logado ainda, fazer o login
$error_msg="";

session_start();
//Check Session and Cookie is user is logged in
if(!isset($_SESSION['user'])){
    if(!isset($_COOKIE['user'])){
        if(isset($_POST['Submit'])){
            //connect to database
            require_once $_SERVER['DOCUMENT_ROOT'].'/Nafisio/dbvar.php';    
            $db= mysqli_connect(DBHOST, DBUSER, DBPW, DBNAME);
            //"clean" the variables
            $user= mysqli_real_escape_string($db,trim($_POST['user']));
            $pw= mysqli_real_escape_string($db,trim($_POST['pw']));
            //send query to serve
            //USE PASSWORD() FUNCTION INSTEAD OF SHA()(testar sem isso)
            if(!empty($user) && !empty($pw)){
            $query="SELECT * FROM users WHERE user='$user' AND pw='$pw';";
            $data= mysqli_query($db, $query);
            //check answer
            if(mysqli_num_rows($data) == '1' ){
                $row= mysqli_fetch_array($data);
                //save in session
                $_SESSION['user']=$user;
                $_SESSION['username']=$row['username'];
                //save in cookies
                setcookie('user',$user,time() + 60*60*24*30,'/');//expire in 30days            
                setcookie('username',$row['username'],time() + 60*60*24*30,'/');//expire in 30days
                //redirect to previous page
                //echo 'the file the called me was'.$_SERVER['HTTP_REFERER'];
                $url=$_SERVER['HTTP_REFERER'];
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
    }else{
        $_SESSION['user']=$_COOKIE['user'];
        $_SESSION['username']=$_COOKIE['username'];
        //redirect to previous page
        $url='http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/'.basename($_SERVER['SCRIPT_FILENAME']);
        header('Location:'.$url);
        exit();
        
    }
    ?>
        
    <!DOCTYPE html>
        <html>
            <head>
                <title>Log in</title>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
            </head>
            <body>
                <h2>Bem Vindo a Nafisio</h2>                
                <?php if(empty($_SESSION['user'])){
                    echo "$error_msg";                
                ?>
                <form method="post" action="<?php echo basename($_SERVER['SCRIPT_FILENAME'])?>">
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
           