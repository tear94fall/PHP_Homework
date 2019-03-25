<?php
session_start();

$num = $_REQUEST['num'];
$userid = $_SESSION['userid'];

include "../dbconn.php";

$sql = "select id from qna_board where num = $num";
$result = $connect->query($sql) or die($this->_connect->error);
$row = $result->fetch_array();

if ($userid != "admin" and $userid != $row[id])   // 비밀번호가 맞으면
{
   echo("
	   <script>
                 window.alert('삭제 권한이 없습니다.')
                 history.go(-1)
	   </script>
          ");
   exit;
}
else
{
   $sql = "delete from qna_board where num = $num";
   $result = $connect->query($sql) or die($this->_connect->error);
}

$connect->close();

Header("Location:list.php?page=$page");
?>

