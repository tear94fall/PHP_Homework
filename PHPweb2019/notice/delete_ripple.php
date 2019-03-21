<?
      include "../dbconn.php";

      $sql = "delete from notice_ripple where num = $ripple_num";
      mysql_query($sql, $connect);
      Header("Location:view.php?num=$num");
      mysql_close();
?>


