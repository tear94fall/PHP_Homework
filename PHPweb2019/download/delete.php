<?
   session_start();

   include "../dbconn.php";
   
   $sql = "select * from down_board where num = $num";   
   $result = mysql_query($sql, $connect);
   $row = mysql_fetch_array($result);

   // 관리자나 글 쓴 사람만이 삭제 가능
   if ($userid != "admin" and $userid != $row[id])  
   {
      echo("
	   <script>
             window.alert('삭제 권한이 없습니다.')
             history.go(-1)
	   </script>
           ");
      exit;
   }
   else
   {
      if ($row[filename])
      {
         unlink("data/$row[filename]");
      }

      $sql = "delete from down_board where num = $num";
      mysql_query($sql, $connect);
   }

   mysql_close();

   Header("Location:list.php?page=$page");
?>

