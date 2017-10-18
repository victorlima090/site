<?php
require_once ('login.php');
$url='http://'.$_SERVER['HTTP_HOST'].dirname(dirname($_SERVER['PHP_SELF'])).'/index.html';
header('Location:'.$url);
exit();
?>
