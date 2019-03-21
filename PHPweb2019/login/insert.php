<?php

include "../dbconn.php";       // dconn.php 파일을 불러옴

$id = $_REQUEST['id'];
$passwd = $_REQUEST['passwd'];
$name = $_REQUEST['name'];
$sex = $_REQUEST['sex'];
$phone1 = $_REQUEST['phone1'];
$phone2 = $_REQUEST['phone2'];
$phone3 = $_REQUEST['phone3'];
$address = $_REQUEST['address'];

$sql = 'select * from member where id = $id';
$result = mysqli_query($sql, $connect);
$exist_id = mysqli_num_rows($result);

if($exist_id) {
    echo("<script>window.alert('해당 아이디가 존재합니다.'); history.go(-1)</script>");
    exit;
}

$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
$ip = $_SERVER["REMOTE_ADDR"];         // 방문자의 IP 주소를 저장

if ($phone1 && $phone2 && $phone3)
    $tel = $phone1."-".$phone2."-".$phone3;
else
    $tel = "";

$sql = "insert into member(id, passwd, name, sex, tel, address)";
$sql .= "values('$id', '$passwd', '$name', '$sex', '$tel', '$address')";

// 레코드 삽입 명령
$result = $connect->query($sql) or die($this->_connect->error);

mysqli_close();                // DB 연결 끊기
echo("<script>window.alert('회원가입이 완료 되었습니다.'); history.go(-1)</script>");

Header("Location:login_form.html");  // login_form.html 로 이동
?>

   
