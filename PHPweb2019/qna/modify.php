<?
   session_start();

   include "../dbconn.php";

   $sql = "select id from qna_board where num = $num";
   $result = mysql_query($sql, $connect);

   $row = mysql_fetch_array($result);

   if ($userid != "admin" and $userid != $row[id])   // 비밀번호가 맞으면
     {
      echo("
	   <script>
                 window.alert('수정 권한이 없습니다.')
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
   
   $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
   $ip = $REMOTE_ADDR;         // 방문자의 IP 주소를 저장
   

   $sql = "update qna_board set subject='$subject', ";
   $sql .= "content='$content' where num=$num";
   
   mysql_query($sql, $connect);
   mysql_close();
   
   Header("Location:list.php?page=$page");  // list.php 로 이동
?>

   
