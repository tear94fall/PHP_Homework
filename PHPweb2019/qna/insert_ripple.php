<?
   session_start();

   if(!$userid) {
     echo("
	   <script>
	     window.alert('ȸ������ �� �̿��ϼ���.')
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
   
   include "../dbconn.php";       // dconn.php ������ �ҷ���

   $id = $userid;
   $name = $username;

   $regist_day = date("Y-m-d (H:i)");  // ������ '��-��-��-��-��'�� ����
   $ip = $REMOTE_ADDR;         // �湮���� IP �ּҸ� ����

   // ���ڵ� ���� ���
   $sql = "insert into qna_ripple(parent, id, name, content, regist_day, ip) ";
   $sql .= "values('$num', '$id', '$name', '$content', '$regist_day', '$ip')";    
   
   mysql_query($sql, $connect);  // $sql �� ����� ��� ����

   mysql_close();                // DB ���� ����
   
   Header("Location:view.php?num=$num");  // view.php �� �̵��մϴ�.
?>

   
