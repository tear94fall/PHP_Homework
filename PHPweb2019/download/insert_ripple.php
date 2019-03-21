<?
   session_start();

   if(!$userid) {
     echo("
           <script>
	     window.alert('회원가입 후 이용하세요.')
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
   $name = $username;

   $regist_day = date("Y-m-d (H:i)"); 
    // 현재의 '년-월-일-시-분'을 저장
   $ip = $REMOTE_ADDR;         
    // 방문자의 IP 주소를 저장
   // 레코드 삽입 명령
   $sql = "insert into down_ripple
   (parent, id, name, content, regist_day, ip)";
   $sql .= "values
   ('$num', '$id', '$name', '$content', '$regist_day', '$ip')";    
   
   mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행

   mysql_close();                // DB 연결 끊기
   
   Header("Location:view.php?num=$num");  // view.php 로 이동합니다.
?>