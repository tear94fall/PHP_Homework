<?php
session_start();

$userid = $_SESSION['userid'];


$num = $_REQUEST['num'];
$page = $_REQUEST['page'];

include "../dbconn.php";

$sql = "select * from down_board where num = $num";
$result = $connect->query($sql) or die($this->_connect->error);
$row = $result->fetch_array();

// 관리자나 글 쓴 사람만이 삭제 가능
if ($userid != "admin" and $userid != $row[id])
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
   if ($row['filename'])
   {
      unlink("data/$row[filename]");
   }

   $sql = "delete from down_board where num = '$num'";
   $result = $connect->query($sql) or die($this->_connect->error);
}

$connect->close();

Header("Location:list.php?page=$page");
?>

