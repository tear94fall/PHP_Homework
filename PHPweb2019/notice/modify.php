<?
   session_start();

   if ($userid=="admin")
   {
      if(!$subject) {
        echo("
	   <script>
	     window.alert('������ �Է��ϼ���.')
	     history.go(-1)
	   </script>
	 ");
	 exit;
      }
   
      if(!$content) {
        echo("
	   <script>
	     window.alert('������ �Է��ϼ���.')
	     history.go(-1)
	   </script>
	 ");
	 exit;
      }
   
      include "../dbconn.php";

      $regist_day = date("Y-m-d (H:i)");  // ������ '��-��-��-��-��'�� ����
      $ip = $REMOTE_ADDR;         // �湮���� IP �ּҸ� ����
   

      $sql = "update notice_board set subject='$subject', ";
      $sql .= "content='$content' where num=$num";
   
      mysql_query($sql, $connect);
      mysql_close();
}
   
      Header("Location:list.php?num=$num&page=$page");  // list.php �� �̵�
?>

   
