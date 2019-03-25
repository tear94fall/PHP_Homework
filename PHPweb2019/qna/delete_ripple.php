<?php
include "../dbconn.php";

$ripple_num = $_REQUEST['ripple_num'];
$num = $_REQUEST['num'];

$sql = "delete from qna_ripple where num = $ripple_num";
$result = $connect->query($sql) or die($this->_connect->error);
Header("Location:view.php?num=$num");
$connect->close();
?>


