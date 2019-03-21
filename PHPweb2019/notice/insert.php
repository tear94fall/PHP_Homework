<?
   session_start();

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
   
   include "../dbconn.php";       // dconn.php 파일을 불러옴

   $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
$ip = $_SERVER["REMOTE_ADDR"];        // 방문자의 IP 주소를 저장

   // 레코드 삽입 명령
   $sql = "insert into notice_board(id, name, subject, content, regist_day, hit, ip) ";
   $sql .= "values('$userid', '$username', '$subject', '$content', '$regist_day', 0, '$ip')";    
   
   mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행

   mysql_close();                // DB 연결 끊기
   
   Header("Location:list.php");  // list.php 로 이동합니다.
?>