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
   
   $regist_day = date("Y-m-d (H:i)");  // ������ '��-��-��-��-��'�� ����
   $ip = $REMOTE_ADDR;         // �湮���� IP �ּҸ� ����
   

   $sql = "update qna_board set subject='$subject', ";
   $sql .= "content='$content' where num=$num";
   
   mysql_query($sql, $connect);
   mysql_close();
   
   Header("Location:list.php?page=$page");  // list.php �� �̵�
?>

   
