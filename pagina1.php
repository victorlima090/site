<?php
require_once 'login/login.php';
//$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
//echo $url;


echo '<br/>';
echo '<h2> essa e a pagina 1 Sr.'.$_SESSION['user'].'</h2>';
?>


    <!DOCTYPE html>
        <html>
            <head>
                <title>Nafisio</title>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
            </head>
            <body>
                <br/>
                <a href="login/logout.php">Logout</a>
                <br/>
                <a href="index.php">Home</a>
                 
            </body>
        </html>
    