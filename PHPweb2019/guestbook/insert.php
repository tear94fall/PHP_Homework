<?php

include "../dbconn.php";
$name = $_REQUEST['name'];
$passwd = $_REQUEST['passwd'];
$content = $_REQUEST['content'];

if(!$name) {
    echo("<script>window.alert('이름을 입력하세요.'); history.go(-1)</script>");
    exit;
}

if(!$passwd) {
    echo("<script>window.alert('비밀번호를 입력하세요.'); history.go(-1)</script>");
    exit;
}

if(!$content) {
    echo("<script>window.alert('내용을 입력하세요.'); history.go(-1)</script>");
    exit;
}

$regist_day = date("Y-m-d (H:i)");
// 현재의 '년-월-일-시-분'을 저장합니다.
$ip = $_SERVER["REMOTE_ADDR"];

$ipv6 = $ip;

/* IP 로직 부분 수정 할것 */
$ipv4 = hexdec(substr($ipv6, 0, 2)). "." . hexdec(substr($ipv6, 2, 2)). "." . hexdec(substr($ipv6, 5, 2)). "." . hexdec(substr($ipv6, 7, 2));
// 방문자의 IP 주소를 저장합니다.

$sql = "insert into guestbook(name, passwd, content, regist_day, ip) ";
$sql .= "values('$name', '$passwd', '$content', '$regist_day', '$ipv4')";

$result = $connect->query($sql) or die($this->_connect->error);

//6. 연결 종료
$connect->close();

Header("Location:guestbook.php");  // guestbook.php 로 이동합니다.
?>