<?php
include "../dbconn.php";

session_start();

$userid = $_SESSION['userid'];

$num = $_REQUEST['num'];
$page = $_REQUEST['page'];
$subject = $_REQUEST['subject'];
$content = $_REQUEST['content'];

if ($userid=="admin")
{
   if(!$subject) {
      echo("<script>window.alert('제목을 입력하세요.'); history.go(-1)</script>");
      exit;
   }

   if(!$content) {
      echo("<script>window.alert('내용을 입력하세요.'); history.go(-1)</script>");
      exit;
   }

   $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
   $ip = $_SERVER["REMOTE_ADDR"];       // 방문자의 IP 주소를 저장

   $sql = "update notice_board set subject='$subject', ";
   $sql .= "content='$content' where num='$num'";

   $result = $connect->query($sql) or die($this->_connect->error);
   $connect->close();
}else{
   echo("<script>window.alert('관리자 계정이 아닙니다.'); history.go(-1)</script>");
   exit;
}

Header("Location:list.php?num=$num&page=$page");  // list.php 로 이동
?>

   
