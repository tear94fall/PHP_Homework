<?
   include "../dbconn.php";

   $sql = "delete from qna_ripple where num = $ripple_num";
   mysql_query($sql, $connect);
   Header("Location:view.php?num=$num");
   mysql_close();
?>


