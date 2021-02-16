<?php
session_start();

include "../dbconn.php";

$userid = NULL;
if(isset($_SESSION['userid'])){
    $userid = $_SESSION['userid'];
}

$sql = "select * from member where id='$userid'";
$result = $connect->query($sql) or die($this->_connect->error);
$count = mysqli_num_rows($result);
$row = $result->fetch_array();

if($count==0){
    echo("<script>window.alert('로그인되지 않았습니다.'); history.go(-1)</script>");
    exit;
}

$phone = explode("-", $row['tel']);
$phone1 = $phone[0];
$phone2 = $phone[1];
$phone3 = $phone[2];  

mysqli_close($connect);
?>
<html>
<body>
<head>
    <script>
        function check_input()
        {
            if (!document.member_form.name.value)
            {
                alert("이름을 입력하세요");
                document.member_form.name.focus();
                return;
            }

            if (!document.member_form.passwd.value)
            {
                alert("비밀번호를 입력하세요");
                document.member_form.passwd.focus();
                return;
            }

            if (!document.member_form.passwd_confirm.value)
            {
                alert("비밀번호확인을 입력하세요");
                document.member_form.passwd_confirm.focus();
                return;
            }

            if (document.member_form.passwd.value != document.member_form.passwd_confirm.value)
            {
                alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");
                document.member_form.passwd.focus();
                document.member_form.passwd.select();
                return;
            }

            document.member_form.submit();
        }

        function reset_form()
        {
            document.member_form.name.value = "";
            document.member_form.passwd.value = "";
            document.member_form.passwd_confirm.value = "";
            document.member_form.phone1.value = "";
            document.member_form.phone2.value = "";
            document.member_form.phone3.value = "";
            document.member_form.address.value = "";

            document.member_form.name.focus();

            return;
        }

    </script>
    <link rel="stylesheet" href="../style.css" type="text/css">
</head>

<table align=center border="0" cellspacing="0" cellpadding="15" width="718">
    <tr>
        <td><img src="img/member_title.gif"></td>
    </tr>
    <tr>
        <td align=center>
            <form  name=member_form method=post action=modify.php>
                <table border=0 cellspacing=0 cellpadding=0 align=center width="682" >
                    <tr>
                        <td bgcolor=DEDEDE>
                            <table border="0" width=682 cellspacing="1" cellpadding="4">
                                <tr>
                                    <td width=20% bgcolor=#F7F7F7 align=right style=padding-right:6>
                                        * 아이디 : </td>
                                    <td bgcolor=#FFFFFF style=padding-left:10><?php echo $row['id'] ?></td>
                                </tr>
                                <tr>
                                    <td bgcolor=#F7F7F7 align=right style=padding-right:6> * 이름 :</td>
                                    <td bgcolor=#FFFFFF style=padding-left:10>
                                        <input type=text size=12 class=m_box maxlength=12 name=name
                                               value='<?php echo $row['name'] ?>'></td>
                                </tr>
                                <tr>
                                    <td bgcolor=#F7F7F7 align=right style=padding-right:6>* 비밀번호 :</td>
                                    <td bgcolor=#FFFFFF style=padding-left:10><input type=password size=10
                                                                                     class=m_box maxlength=10 name=passwd value='<?php echo $row[passwd] ?>'>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor=#F7F7F7 align=right style=padding-right:6>
                                        * 비밀번호 확인 :</td>
                                    <td bgcolor=#FFFFFF style=padding-left:10>
                                        <input type=password size=12 class=m_box maxlength=12
                                               name=passwd_confirm value='<?php echo $row['passwd'] ?>'> </td>
                                </tr>
                                <tr>
                                    <td bgcolor=#F7F7F7 align=right style=padding-right:6>성별 :</td>
                                    <td bgcolor=#FFFFFF style=padding-left:10>
                                        <?php
                                        if ($row['sex']=='M')
                                        {
                                            echo "<input type=radio name=sex value='M' checked>남<input type=radio name=sex value='W'>여";
                                        }
                                        else
                                        {
                                            echo "<input type=radio name=sex value='M'>남<input type=radio name=sex value='W' checked>여";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor=#F7F7F7 align=right style=padding-right:6>휴대전화 :</td>
                                    <td bgcolor=#FFFFFF style=padding-left:10>
                                        <input type=text size=4 class=m_box name=phone1 maxlength=4
                                               value='<?php echo $phone1 ?>'>
                                        - <input type=text size=4 class=m_box name=phone2 maxlength=4
                                                 value='<?php echo $phone2 ?>'>
                                        - <input type=text size=4 class=m_box name=phone3 maxlength=4
                                                 value='<?php echo $phone3 ?>'>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor=#F7F7F7 align=right style=padding-right:6 rowspan=3>
                                        주 소 :</td>
                                </tr>
                                <tr>
                                    <td bgcolor=#FFFFFF style=padding-left:10>
                                        <input type=text size=50 class=m_box name=address
                                               value='<?php echo $row['address'] ?>'></td>
                                </tr>
                            </table>
                            <!---------- 회원가입 입력 폼 끝--------------->
                        </td>
                    </tr>
                    <tr>
                        <td align=right height=60>
                            <img src="img/ok.gif" border="0" onclick=check_input()></a>
                            <img src="img/reset.gif" border="0" onclick=reset_form()></a></td>
                    </tr>
            </form>
</table>
</td>
</tr>
</table>
<!------------- 컨텐츠 테이블 끝 ---------------->

</td>
</tr>
</table>
</body>
</html>
