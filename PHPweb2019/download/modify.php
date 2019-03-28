<?php
session_start();

$num = $_REQUEST['num'];
$page = $_REQUEST['page'];
$subject = $_REQUEST['subject'];
$content = $_REQUEST['content'];

$userid = $_SESSION['userid'];

include "../dbconn.php";

$sql = "select id from down_board where num = $num";
$result = $connect->query($sql) or die($this->_connect->error);
$row = $result->fetch_array();


if($userid != "admin" and $userid != $row['id'])
    // 비밀번호가 맞으면
{
    //echo("<script>window.alert('수정 권한이 없습니다.');history.go(-1)</script>");
    exit;
}

if(!$subject) {
    echo("
	   <script>
	     window.alert('제목을 입력하세요.')
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

$regist_day = date("Y-m-d (H:i)");
// 현재의 '년-월-일-시-분'을 저장
$ip = $_SERVER["REMOTE_ADDR"];
// 방문자의 IP 주소를 저장

$sql = "update down_board set subject='$subject', ";
$sql .= "content='$content' where num=$num";

$result = $connect->query($sql) or die($this->_connect->error);

Header("Location:list.php?page=$page");  // list.php 로 이동
?>