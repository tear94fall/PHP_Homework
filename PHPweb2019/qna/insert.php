<?
   session_start();

   if(!$userid) {  
     echo("
	   <script>
	     window.alert('�α��� �� ����ϼ���.')
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
    
   include "../dbconn.php";

   $regist_day = date("Y-m-d (H:i)");  // ������ '��-��-��-��-��'�� ����
   $ip = $REMOTE_ADDR;         // �湮���� IP �ּҸ� ����

   if (!$num) // $num �� 0 �̸� ����, 1�̸� �亯 ��
   {    
      $depth = 0;   // depth, ord �� 0���� �ʱ�ȭ
      $ord = 0;

      // ���ڵ� ����(group_num ����)
      $sql = "insert into qna_board(depth, ord, id, name, subject,";
      $sql .= "content, regist_day, hit, ip) ";
      $sql .= "values($depth, $ord, '$userid', '$username', '$subject',";
      $sql .= "'$content', '$regist_day', 0, '$ip')";    
      mysql_query($sql, $connect);  // $sql �� ����� ��� ����

      // �ֱ� auto_increment �ʵ�(num) �� ��������
      $sql = "select last_insert_id()"; 
      $result = mysql_query($sql, $connect);
      $row = mysql_fetch_array($result);
      $auto_num = $row[0]; 

      // group_num �� ������Ʈ 
      $sql = "update qna_board set group_num = $auto_num where num=$auto_num";
      mysql_query($sql, $connect);
   }
    else
   {
      // �θ� �� ��������
      $sql = "select * from qna_board where num = $num";
      $result = mysql_query($sql, $connect);
      $row = mysql_fetch_array($result);

      // �θ� �۷� ���� group_num, depth, ord �� ����
      $group_num = $row[group_num];
      $depth = $row[depth] + 1;
      $ord = $row[ord] + 1;

      // �ش� �׷쿡�� ord �� �θ���� ord($row[ord]) ���� ū ��쿣
      // ord �� 1 ���� ��Ŵ
      $sql = "update qna_board set ord = ord + 1 where group_num = $row[group_num] 
              and ord > $row[ord]";
      mysql_query($sql, $connect);  

      // ���ڵ� ����
      $sql = "insert into qna_board(group_num, depth, ord, id, name, subject,";
      $sql .= "content, regist_day, hit, ip) ";
      $sql .= "values($group_num, $depth, $ord, '$userid', '$username', '$subject',";
      $sql .= "'$content', '$regist_day', 0, '$ip')";    

      mysql_query($sql, $connect);  // $sql �� ����� ��� ����

   }
      mysql_close();                // DB ���� ����
   
      Header("Location:list.php?page=$page");  // list.php �� �̵��մϴ�.
?>

   
