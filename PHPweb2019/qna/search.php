<?
   session_start();

   $scale = 8;   // �� ȭ�鿡 ǥ�õǴ� �� ��

   include "../dbconn.php";

   $sql = "select * from qna_board where $find like '%$search%'
           order by group_num desc, ord asc";

   $result = mysql_query($sql, $connect);
?>
<html>
<META http-equiv="Content-Type" content="text/html; charset=Korean">
 <head>
  <title> :: PHP ���α׷��� �Թ��� ���Ű��� ȯ���մϴ�~~ :: </title>
  <link rel="stylesheet" href="../style.css" type="text/css">	
 </head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
    <table border=0 cellspacing=0 cellpdding=0 width='776' align='center'>
        <tr>
          <td colspan="5" height=25><img src="img/qa_title.gif"></td>
        </tr>
        <tr>
          <td background="img/bbs_bg.gif"><img border="0" src="img/blank.gif" width="1" height="3"></td>
        </tr>
        <tr>
          <td height=10></td>
<?  $total_record = mysql_num_rows($result); // ��ü �� ��?>
        <tr><td align="right" colspan="5" height=20>��ü <? echo $total_record; ?>�� 
          </td></tr>
        <tr>
          <td>

    <table border=0 cellspacing=0 cellpdding=0 width='100%' class="txt">
        <tr bgcolor="#5AB2C8"> 
          <td colspan="5" height=1></td>
        </tr>
        <tr bgcolor="#D2EAF0" height=25> 
          <td width="50" align="center"><strong>��ȣ</strong></td>
          <td width="450" align=center><strong>����</strong></td>
          <td width="145" align=center><strong>�ۼ���</strong></td>
          <td width="55" align=center><strong>��ȸ</strong></td>
          <td width="76" align=center><strong>�۾���</strong></td>
        </tr>
        <tr bgcolor="#5AB2C8"> 
          <td colspan="5" height=1></td>
        </tr>
  
<?
   // ��ü ������ ��($total_page) ��� 
   if ($total_record % $scale == 0)     // $total_record�� $scale�� ���� ������ ��� 
      $total_page = floor($total_record/$scale);     // �������� 0�� �� 
   else
      $total_page = floor($total_record/$scale) + 1; // �������� 0�� �ƴ� ��
 
   if (!$page)                 // ��������ȣ($page)�� 0 �� ��
       $page = 1;              // ������ ��ȣ�� 1�� �ʱ�ȭ
 
   $start = ($page - 1) * $scale;      // ǥ���� ������($page)�� ���� $start ���  

   $number = $total_record - $start;

   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       // ������ ���ڵ�� ��ġ(������) �̵�  
      $row = mysql_fetch_array($result);       // �ϳ��� ���ڵ� ��������
      
      $day = substr($row[regist_day], 0, 10);

      $sql = "select * from qna_ripple where parent = '$row[num]'";

      $result2 = mysql_query($sql, $connect);
      $num_ripple = mysql_num_rows($result2);

      $space = "";

      for ($j=0; $j<$row[depth]; $j++)
          $space = "&nbsp;&nbsp;".$space;

      // ���ڵ� ȭ�鿡 ����ϱ�
      echo "
        <tr height=25>
          <td align=center>$number</td>
          <td> $space 
           ";
      if ($row[depth]>0)
        echo "<img src='img/reply_head.gif' border=0>";
      else
        echo "<img src='img/record_id.gif' border=0>";

        echo "<a href='view.php?num=$row[num]&page=$page'>&nbsp;$row[subject]";

      if ($num_ripple) echo " <font color=blue>[$num_ripple]</font>";

      echo "
            </a></td>
          <td align=center>$day</td>
          <td align=center>$row[hit]</td>
          <td align=center>$row[name] </td>
        </tr>
        <tr bgcolor='#CCCCCC' height=1> 
          <td colspan='5'></td>
        </tr>
        ";
       $number--;
   } 
?>

        <tr> 
          <td colspan="5" height=20></td>
        </tr>

        <tr height=25>
          <td colspan=5 align=center>
<?
   // �Խ��� ��� �ϴܿ� ������ ��ũ ��ȣ ���
   for ($i=1; $i<=$total_page; $i++)
   {
       if ($page == $i)     // ���� ������ ��ȣ ��ũ ����
       {
           echo "
                <font color='4C5317'><b>[$i]</b></font>
                ";
       }
       else
       { 
           echo "
                <a href='search.php?find=$find&search=$search&page=$i'>
                <font color='4C5317'>[$i]</font></a>
                ";
       }      
   }
?>
          </td>
         </tr>
         <tr bgcolor="#CCCCCC" height=1> 
           <td colspan="5"></td>
         </tr>
    </table>
        </td>
        </tr>      
    </table>

    <table width=766 align=center border=0 cellpadding=0 cellspacing=0
                 bgcolor="#D2EAF0">
        <tr height=5>
          <td></td>
        </tr>

   <form name=searchForm method=post action="search.php">
         <tr>
           <td>&nbsp;&nbsp;
                <select name="find" class="txt">
                <option value="subject">���񿡼�</option>
                <option value="content">��������</option>
                <option value="name">�۾��̿���</option>
                </select>

                <input type="text" name="search" size=10>
                <input type="image" src="img/i_search.gif" align=absmiddle border=0>
          </td>
          <td align=right>
            <a href='write_form.php'><img src='img/i_write.gif' align=absmiddle
                                   border=0></a>
            &nbsp;<a href="list.php"><img src="img/i_list.gif" border=0></a>
            &nbsp;</td>
        </tr>
  </form>
        <tr height=5>
          <td></td>
        </tr>
        <tr bgcolor="#5AB2C8" height=1>
          <td colspan=2></td>
        </tr>
    </table>
   <!-- �˻��ϱ� �� -->

</body>
</html>
