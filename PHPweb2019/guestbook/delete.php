<?php
   include "../dbconn.php";

$num = $_REQUEST['num'];
$passwd = $_REQUEST['passwd'];

$sql = "select passwd from guestbook where num='$num'";
$result = $connect->query($sql) or die($this->_connect->error);
$row = $result->fetch_array();

   if ($passwd == $row['passwd'])
   {
      $sql = "delete from guestbook where num = '$num'";
      $result = $connect->query($sql) or die($this->_connect->error);
      print("<script type='text/javascript'>alert(\"Wrong Username or Password\")</script>");
      echo("<script>window.alert('삭제가 완료 되었습니다.'); history.go(-1)</script>");
      Header("Location:guestbook.php?page=$page");
   }
   else
   {
      echo("<script>window.alert('비밀번호가 틀립니다.'); history.go(-1)</script>");
      exit;
    }

$connect->close();
?>


