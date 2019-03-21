<?php
include "../dbconn.php";

//post 방식으로 값 넘겨 받을때
$singer = $_REQUEST['singer'];

$sql = "update survey set $singer = $singer + 1";
$result = $connect->query($sql) or die($this->_connect->error);

//mysql_close();

Header("location:result.php");
?>

