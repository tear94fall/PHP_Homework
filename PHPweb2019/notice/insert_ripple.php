<?php
session_start();

$userid = $_SESSION['userid'];
$name = $_SESSION['username'];

$content = $_REQUEST['content'];
$num = $_REQUEST['num'];

if(!$userid) {
   echo("
	   <script>
	     window.alert('로그인 후 이용하세요.')
	     history.go(-1)
	   </script>
	 ");
   exit;
}

if(!$content) {
   echo("
	   <script>
	     window.alert('내용을 입력하세요.')
	     history.go(-1)
	   </script>
	 ");
   exit;
}

include "../dbconn.php";       // dconn.php 파일을 불러옴

$id = $userid;

$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
$ip = $REMOTE_ADDR;         // 방문자의 IP 주소를 저장

// 레코드 삽입 명령
$sql = "insert into notice_ripple(parent, id, name, content, regist_day, ip) ";
$sql .= "values('$num', '$id', '$name', '$content', '$regist_day', '$ip')";

$result = $connect->query($sql) or die($this->_connect->error);

$connect->close();            // DB 연결 끊기

Header("Location:view.php?num=$num");  // view.php 로 이동합니다.
?>

   
