<?php

session_start();
if(isset($_SESSION['user'])){
    $_SESSION=array();//apaga todos as variaveis de session
}

if(isset($_COOKIE['user'])){
    setcookie('user','',time()-3600);
    setcookie('username','',time()-3600);
    
}
session_destroy();
$url='http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/index.php';
header('Location:'.$url);
exit();