<?
   session_start();

   include "../dbconn.php";
   
   $sql = "select id from qna_board where num = $num";   
   $result = mysql_query($sql, $connect);

   $row = mysql_fetch_array($result);

   if ($userid != "admin" and $userid != $row[id])   // ��й�ȣ�� ������ 
   {
     echo("
	   <script>
                 window.alert('���� ������ �����ϴ�.')
                 history.go(-1)
	   </script>
          ");
      exit;
   }
   else
   {
      $sql = "delete from qna_board where num = $num";
      mysql_query($sql, $connect);
   }

   mysql_close();

   Header("Location:list.php?page=$page");
?>

