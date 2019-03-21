<?php

include "../dbconn.php";

$num = $_REQUEST['num'];
$name = $_REQUEST['name'];
$passwd = $_REQUEST['passwd'];
$subject = $_REQUEST['subject'];
$content = $_REQUEST['content'];

// 이전화면에서 이름이 입력되지 않았으면 "이름을 입력하세요"
// 메시지 출력
if(!$name) {
    echo("<script>window.alert('이름을 입력하세요.'); history.go(-1)</script>");
    exit;
}

if(!$passwd) {
    echo("<script>window.alert('비밀번호를 입력하세요.'); history.go(-1)</script>");
    exit;
}

if(!$subject) {
    echo("<script>window.alert('제목을 입력하세요.'); history.go(-1)</script>");
    exit;
}

if(!$content) {
    echo("<script>window.alert('내용을 입력하세요.'); history.go(-1)</script>");
    exit;
}

$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
$ip = $_SERVER["REMOTE_ADDR"];


$sql = "update freeboard set name='$name', subject='$subject', ";
$sql .= "content='$content', passwd='$passwd' where num=$num";

$result = $connect->query($sql) or die($this->_connect->error);
$connect->close();


Header("Location:list.php?num=$num&page=$page");  // list.php 로 이동
?>

   
