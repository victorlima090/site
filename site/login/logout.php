<?php

session_start();
if(isset($_SESSION['user'])){
    echo"primeiro if session<br/>";
    $_SESSION=array();//apaga todos as variaveis de session
}

if(isset($_COOKIE['user'])){
    echo "entrou no primeiro if cookie<br/>";   
    setcookie('user','',time()-3600,'/');
    setcookie('username','',time()-3600,'/');
    
}
session_destroy();
echo "ca estou em logout<br/>";
if (isset($_COOKIE['user'])){
    echo "cookie is set";
}else{
    echo "cookie is not set";
}
$homeurl='http://'.$_SERVER['HTTP_HOST'].dirname(dirname($_SERVER['PHP_SELF'])).'/index.html';
header('Location:'.$homeurl);
exit();