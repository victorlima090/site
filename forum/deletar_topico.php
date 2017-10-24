<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Nafisio/dbvar.php';
if(isset($_GET['id'])){
    
    $id=$_GET['id'];
    echo "id e:".$id;
    $db = mysqli_connect(DBHOST, DBUSER, DBPW, 'Nafisio');
    if (!$db){
    die("<br/>Connection error: " . mysqli_connect_error());
    }
    $query="DELETE FROM `Discussoes` WHERE `id` = $id";
    $result= mysqli_query($db, $query);
    
    $query="DELETE FROM `Resposta` WHERE `id_topico` = $id";
    $result= mysqli_query($db, $query);
    
    $url='http://'.$_SERVER['HTTP_HOST'].dirname(dirname($_SERVER['PHP_SELF'])).'/forum/index_forum.php';
    header('Location:'.$url);
    exit();
    
}
?>

