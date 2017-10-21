<?php
//Se nao tiver logado ainda, fazer o login
$error_msg="";

session_start();
//Check Session and Cookie is user is logged in
if(!isset($_SESSION['user'])){
    if(!isset($_COOKIE['user'])){      
        if(isset($_POST['Submit'])){               
            include $_SERVER['DOCUMENT_ROOT'].'/Nafisio/dbvar.php';        
            $db= mysqli_connect(DBHOST, DBUSER, DBPW, DBNAME);
            //"clean" the variables
            if (!$db)
            {
            die("<br/>Connection error: " . mysqli_connect_error());
            }
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
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo $_SERVER['DOCUMENT_ROOT'].'/Nafisio/login/login-style.css'?>" rel="stylesheet" type="text/css">
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
                <li><img src="images/yellow-user-box-icon.png" alt="user"></li>
                <li><img src="images/signup-lateral-button-active.png"></li>
                <li><img src="images/yellow-question-mark-icon-active.png"></li>
            </ul>
            <div id="center">
                <img id="icon-center"  src="../images/Logo.png" alt=""/> 
            </div>
            <div id="menu-right">
                
                <form method="post" action="<?php echo basename($_SERVER['SCRIPT_FILENAME'])?>">
                    <?php if(empty($_SESSION['user'])){
                    echo "$error_msg";                
                    ?>
                    <input type="text" name="user" value="Username">
                    <br/>
                    <input type="password" name="pw" value="Password">
                    <input id="submit-box" type="submit" name="Submit" value="Entrar" >
                    <p style="color:yellow; font-size:10pt;float: left;padding: 0; font-style: italic;">
                        Esqueceu sua senha?</p>
                    <a href="cadastro.php"><img id="cadastrar-icon" src="images/cadastrar-icon_1.png" alt=""/></a>
                    
                </form>
                    <?php }                             
                    ?>
            </div>
           
        </div>
        
        
          <!-- Footer -->
        <footer class="footer">
            <p> &copy; 2017 NAFISIO	</p>
        </footer>
    </body>
</html>

            <?php
exit();
}
           