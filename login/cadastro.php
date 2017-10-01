<?php
require_once('../dbvar.php');
$erro_msg="";
if(isset($_POST['submit'])){
    if(!empty($_POST['user']) && !empty($_POST['username']) && !empty($_POST['pw'])){
        //Connect to dabatase
        $db = mysqli_connect(DBHOST, DBUSER, DBPW, DBNAME);
        if (!$db){
        die("<br/>Connection error: " . mysqli_connect_error());
        }
        //Check if user exist
        $user= mysqli_real_escape_string($db,trim($_POST['user']));
        $checkuser= "SELECT * FROM users WHERE user='$user'";
        $result= mysqli_query($db, $checkuser);
        if(mysqli_num_rows($result)==0){
            $pw= mysqli_real_escape_string($db,trim($_POST['pw']));                
            $username= mysqli_real_escape_string($db,trim($_POST['username']));
            $query="INSERT INTO users (user,username,pw) VALUES ('$user','$username','$pw')";

            $result=mysqli_query($db,$query);
            session_start();
            $_SESSION['user']=$user;
            $_SESSION['username']=$row['username'];
            echo 'cadastro feito com sucesso';
            $homeurl="http://".$_SERVER['HTTP_HOST'].'/Nafisio/index.php';
            header('Location:'.$homeurl);
            
            
        }else{
            $erro_msg="usuario ja existe, try again";
        }
    }else{
        $erro_msg="Por favor preencher todos os campos abaixo";        
    }   
}?>
    <!DOCTYPE html>
        <html>
            <head>
                <title>Cadastre-se</title>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
            </head>
            <body>
                <h2>Bem Vindo a Nafisio </h2>
                    <?php if(!empty($erro_msg)) echo $erro_msg;?>
                    <br/>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                    <label>User</label>
                    <input type="text" name="user">
                    <br/>
                    <label>Nome Completo</label>
                    <input type="text" name="username">
                    <br/>
                    <label> Senha</label>
                    <input type="password" name="pw">
                    <input type="submit" name="submit">

                </form>




