<?php
//Se nao tiver logado ainda, fazer o login
if(!isset($_SESSION['user'])){
    if(!isset($_POST['Submit'])){ ?>
        <!DOCTYPE html>
        <html>
            <head>
                <title>TODO supply a title</title>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
            </head>
            <body>
                <div>Log in</div>
                <br/>
                <form method="post">
                    <label>Username</label>
                    <input type="text" name="user">
                    <br/>
                    <label> Senha</label>
                    <input type="password" name="pw">
                    <input type="submit" name="Submit">

                </form>
            </body>
        </html>     
    <?php 
    }
    else{
        //connect to database
        require_once ('dbvar.php');    
        $db= mysqli_connect(DBHOST, DBUSER, DBPW, DBNAME);
        //"clean" the variables
        $user= mysqli_real_escape_string($db,trim($_POST['user']));
        $pw= mysqli_real_escape_string($db,trim($_POST['pw']));
        //send query to serve
        //USE PASSWORD() FUNCTION INSTEAD OF SHA()(testar sem isso)
        $query="SELECT * FROM users WHERE user='$user' AND pw='$pw';";
        $data= mysqli_query($db, $query);
        if(mysqli_num_rows($data) == '1' ){
            $row= mysqli_fetch_array($data);
            session_start();
            $_SESSION['user']=$user;
            $_SESSION['username']=$row['username'];
            echo' you are logged in =D';
        }
        else{
            echo'errado';
            header('Location'.'index.php');
            exit('Usuario ou senha incorretos');
        }

        
    }
    
    
    
    ?>

<?php    
}

?>
