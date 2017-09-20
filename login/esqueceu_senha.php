<?php
include_once 'dbvar.php';
/*
 *  $to = "recipient@example.com";
 $subject = "Password";
 $body = "Hi,\n\nHow are you?\n Your new password is $pw";
 if (mail($to, $subject, $body)) {
   echo("<p>Email successfully sent!</p>");
  } else {
   echo("<p>Email delivery failed…</p>");
  }
 */
$msg="";
if(isset($_POST['submit'])){
    $db= mysqli_connect(DBHOST, DBUSER, DBPW, DBNAME);
    $user= mysqli_real_escape_string($db,trim($_POST['user']));
    $query="SELECT pw FROM users WHERE user='$user'";
    $data= mysqli_query($db, $query);
    if(mysqli_num_rows($data)==1){
        $row= mysqli_fetch_array($data);
        $pw = $row['pw'];
        //Teste primeiro com o meu email
        $to = "victorlima090@gmail.com";
        $subject = "Password";
        $body = "Hi,\n\nHow are you?\n Your new password is $pw";
        if (mail($to, $subject, $body)) {
          echo("<p>Email successfully sent!</p>");
        }
        else {
          echo("<p>Email delivery failed…</p>");
        }
    }else{
        $msg="email não encontrado";
    }
}?>
    
    <!DOCTYPE html>
        <html>
            <head>
                <title>Esqueci a senha</title>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
            </head>
            <body>
                <h2>Esqueceu a senha?</h2>                
                <?php if(empty($_SESSION['user'])){
                    echo "$msg";                
                }?>
                <form method="post" action="<?php echo basename($_SERVER['SCRIPT_FILENAME'])?>">
                    <label>Username</label>
                    <input type="text" name="user">
                    <br/>                    
                    <input type="submit" name="submit" value="Entrar">
                </form>                
            </body>
        </html>
        
        
        