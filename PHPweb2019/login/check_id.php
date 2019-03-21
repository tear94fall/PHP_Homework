<?php

$id = $_REQUEST['id'];

if(!$id)
{
   echo("아이디를 입력하세요.");
}
else
{
   include "../dbconn.php";

   $sql = "select * from member where id='$id'";

   $result = $connect->query($sql) or die($this->_connect->error);
   $num_record = mysqli_num_rows($result);

   if ($num_record)
   {
      echo "아이디가 중복됩니다.<br>";
      echo "다른 아이디를 사용하세요.<br>";
   }
   else
   {
      echo "사용가능한 아이디입니다.";
   }

   mysqli_close();
}
?>

