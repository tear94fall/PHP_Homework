<?
   session_start();

   if ($userid == "admin")  
   {
      include "../dbconn.php";

      $sql = "delete from notice_board where num = $num";
      mysql_query($sql, $connect);
      mysql_close();
   }

   Header("Location:list.php?page=$page");
?>

