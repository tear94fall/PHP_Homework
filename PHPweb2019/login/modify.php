<?php
session_start();

include "../dbconn.php";       // dconn.php 파일을 불러옴

$passwd = $_REQUEST['passwd'];
$name = $_REQUEST['name'];
$sex= $_REQUEST['sex'];
$phone1 = $_REQUEST['phone1'];
$phone2 = $_REQUEST['phone2'];
$phone3 = $_REQUEST['phone3'];
$address = $_REQUEST['address'];


$userid = $_SESSION['userid'];


$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
$ip = $_SERVER["REMOTE_ADDR"];          // 방문자의 IP 주소를 저장

if ($phone1 && $phone2 && $phone3)
   $tel = $phone1."-".$phone2."-".$phone3;
else
   $tel = "";


$sql = "update member set passwd='$passwd', name='$name' , ";
$sql .= "sex='$sex', tel='$tel', address='$address' where id='$userid'";

$result = $connect->query($sql) or die($this->_connect->error);

echo("<script>window.alert('정보 변경이 완료되었습니다.'); history.go(-1)</script>");


echo("<script>top.location.href = '../index.php';</script>");
?>

   
