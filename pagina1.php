<?php
include 'login.php';
//$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
//echo $url;


echo '<br/>';
echo '<h2> essa e a pagina 1 Sr.'.$_SESSION['user'].'</h2>';
?>
<br/>
<a href="logout.php">Logout</a>
<br/>
<a href="index.php">Home</a>
