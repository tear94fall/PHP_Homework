<?
   include "../dbconn.php";

   $sql = "delete from down_ripple where num = $ripple_num";
   mysql_query($sql, $connect);
   Header("Location:view.php?num=$num");
   mysql_close();
?>


