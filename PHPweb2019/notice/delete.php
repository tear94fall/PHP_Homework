<?php
session_start();

$num = $_REQUEST['num'];

$userid = $_SESSION['userid'];

if ($userid == "admin")
{
   include "../dbconn.php";

   $sql = "delete from notice_board where num = '$num'";
   $result = $connect->query($sql) or die($this->_connect->error);
   $connect->close();
}

Header("Location:list.php?page=$page");
?>

