<?php
include "../dbconn.php";

$num = $_REQUEST['num'];
$ripple_num = $_REQUEST['ripple_num'];

$sql = "delete from down_ripple where num = $ripple_num";
$result = $connect->query($sql) or die($this->_connect->error);

Header("Location:view.php?num=$num");
$connect->close();
?>


