<?php
require_once('../dbvar.php');
$erro_msg="";
if(isset($_POST['submit'])){
    if(!empty($_POST['user']) && !empty($_POST['email']) && !empty($_POST['pw'])){
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
            $homeurl="http://".$_SERVER['HTTP_HOST'].'/Nafisio/index.html';
            header('Location:'.$homeurl);
            
            
        }else{
            $erro_msg="Usuário já existe.Tente Novamente";
        }
    }else{
        $erro_msg="Por favor preencher todos os campos abaixo";        
    }   
}?>
<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/Nafisio/css/cadastro_style.css" rel="stylesheet" type="text/css">
    </head>
        <!-- Header -->
        <body>
         <div id="container">
            <div class="header-banner">                
                <ul id="navbar">
                    <li><a href="#">QUEM SOMOS</a></li>
                    <li><a href="#">A TUTORIA</a></li>
                    <li><a href="#">PORTAL DO PROFESSOR</a></li>
                    <li><a href="#">PORTAL DO ALUNO</a></li>
                    <li><a href="#">AJUDA</a></li>                      
                </ul>                                
            </div>            
        </div>
        <!-- login cointainer   -->
        
        <div class="login_container">
            <ul id="menu-left">
                <li><img src="images_login/yellow-user-box-icon.png" alt="user"></li>
                <li><img src="images_login/signup-lateral-button-active.png"></li>
                <li><img src="images_login/yellow-question-mark-icon-active.png"></li>
            </ul>
            <div id="center">
                <img id="icon-center"  src="../images/Logo.png" alt=""/> 
            </div>
            <div id="menu-right">
                
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                    <?php if (!empty($erro_msg)) echo $erro_msg."<br/>";?>
                    <label class="login-label">Username</label>
                    <input type="text" name="user">
                    <br/>
                    <label class="login-label">Password</label>
                    <input type="password" name="pw" value="">
                    <label class="login-label">Email</label>
                    <input type="email" name="email" value="">
                    <input id="submit-box" type="submit" name="submit" value="Cadastrar" >                                     
                    
                </form>
            </div>
           
        </div>
        
        
          <!-- Footer -->
        <footer class="footer">
            <p> &copy; 2017 NAFISIO	</p>
         </footer>
    </body>
</html>





