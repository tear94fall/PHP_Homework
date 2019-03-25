<?php
session_start();
$subject = $_REQUEST['subject'];
$content = $_REQUEST['content'];
$page = $_REQUEST['page'];
$num = $_REQUEST['num'];

$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

if(!$userid) {
   echo("
	   <script>
	     window.alert('로그인 후 사용하세요.')
	     history.go(-1)
	   </script>
	 ");
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

include "../dbconn.php";

$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
$ip = $_SERVER["REMOTE_ADDR"];      // 방문자의 IP 주소를 저장합니다.


if (!$num) // $num 이 0 이면 원글, 1이면 답변 글
{
   $depth = 0;   // depth, ord 를 0으로 초기화
   $ord = 0;

   // 레코드 삽입(group_num 제외)
   $sql = "insert into qna_board(group_num, depth, ord, id, name, subject,";
   $sql .= "content, regist_day, hit, ip) ";
   $sql .= "values(0, $depth, $ord, '$userid', '$username', '$subject',";
   $sql .= "'$content', '$regist_day', 0, '$ip')";
   $result = $connect->query($sql) or die($this->_connect->error);


   // 최근 auto_increment 필드(num) 값 가져오기
   $sql = "select last_insert_id()";
   $result = $connect->query($sql) or die($this->_connect->error);
   $row = $result->fetch_array();
   $auto_num = $row[0];


   // group_num 값 업데이트
   $sql = "update qna_board set group_num = $auto_num where num=$auto_num";
   $result = $connect->query($sql) or die($this->_connect->error);
}
else
{
   // 부모 글 가져오기
   $sql = "select * from qna_board where num = $num";
   $result = $connect->query($sql) or die($this->_connect->error);
   $row = $result->fetch_array();

   // 부모 글로 부터 group_num, depth, ord 값 설정
   $group_num = $row[group_num];
   $depth = $row[depth] + 1;
   $ord = $row[ord] + 1;

   // 해당 그룹에서 ord 가 부모글의 ord($row[ord]) 보다 큰 경우엔
   // ord 값 1 증가 시킴
   $sql = "update qna_board set ord = ord + 1 where group_num = $row[group_num] 
              and ord > $row[ord]";
   $result = $connect->query($sql) or die($this->_connect->error);

   // 레코드 삽입
   $sql = "insert into qna_board(group_num, depth, ord, id, name, subject,";
   $sql .= "content, regist_day, hit, ip) ";
   $sql .= "values($group_num, $depth, $ord, '$userid', '$username', '$subject',";
   $sql .= "'$content', '$regist_day', 0, '$ip')";

   $result = $connect->query($sql) or die($this->_connect->error);

}
$connect->close();

Header("Location:list.php?page=$page");  // list.php 로 이동합니다.
?>

   
