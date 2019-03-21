<?php
session_start();

include "../dbconn.php";
$num = $_REQUEST['num'];
$num = $_REQUEST['num'];

$sql = "select passwd from freeboard where num=$num";
$result = $connect->query($sql) or die($this->_connect->error);
$row = $result->fetch_array();

// $passwd : 사용자가 passwd_form.php 화면에서 입력한 값
// $row[passwd] : DB에 들어있는 값

// and $userid != "admin"
// 비밀번호만 맞으면 삭제
$passwd = $_REQUEST['passwd'];
if ($passwd != $row['passwd'] and $userid != "admin")
   // 관리자가 아니고 비밀번호가 틀리면
{
   echo("<script>window.alert('비밀번호가 틀립니다.'); history.go(-1)</script>");
   exit;
}
else
{
   $sql = "delete from freeboard where num = $num";
   $result = $connect->query($sql) or die($this->_connect->error);

   // mysql_close();
   Header("Location:list.php?page=$page");
}


?>


