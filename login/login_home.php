<?php
require_once ('login.php');
$url='http://'.$_SERVER['HTTP_HOST'].dirname(dirname($_SERVER['PHP_SELF'])).'/index.php';
header('Location:'.$url);
exit();
?>
