<?php
session_start();

$userid = $_SESSION['userid'];
?>
<html>
<head>
    <title>:: PHP 프로그래밍 입문에 오신것을 환영합니다~~ ::</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="776" align="center" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td>
            <table width=776 cellspacing="0" cellpadding="0" border="0">
                <!--상단제목그림-->
                <tr>
                    <td colspan="10" align="left">
                        <img src="top_php_smartbutton1.gif" border="0" width="60%"></td>
                </tr>

                <tr>
                    <td height="8" colspan="10">
                        <img border="0" src="img/blank.gif" width="1" height="8"></td>
                </tr>


                <!--메뉴 시작-->
                <TR>
                    <TD>
                        <a href="main.php" target="main">
                            <img SRC="img/menu_01.gif" WIDTH=87 HEIGHT=47 border=0 ALT=""></a></TD>
                    <?php
                    if (!$userid)
                    {
                        echo "<TD><a href='login/login_form.html'  target='main'><img SRC='img/menu_02.gif' WIDTH=87 HEIGHT=47 border=0 ALT=''></a></TD>";
                    }
                    else
                    {
                        echo "<TD><a href='login/logoff.php'  target='main'><img SRC='img/menu_10.gif' WIDTH=87 HEIGHT=47 border=0 ALT=''></a></TD>";
                    }
                    if (!$userid)
                    {
                        echo "<TD><a href='login/member_form.html'  target='main'><img SRC='img/menu_03.gif' WIDTH=84 HEIGHT=47  border=0 ALT=''></a></TD>";
                    }
                    else
                    {
                        echo "<TD><a href='login/modify_memberinfo.php'  target='main'><img SRC='img/menu_11.gif' WIDTH=84 HEIGHT=47  border=0 ALT=''></a></TD>";
                    }
                    ?>
                    <TD>
                        <a href="guestbook/guestbook.php"  target="main">
                            <img SRC="img/menu_04.gif" WIDTH=86 HEIGHT=47 border=0 ALT=""></a></TD>
                    <TD>
                        <a href="freeboard/list.php"  target="main">
                            <img SRC="img/menu_05.gif" WIDTH=86 HEIGHT=47 border=0 ALT=""></a></TD>
                    <TD>
                        <a href="notice/list.php"  target="main">
                            <img SRC="img/menu_06.gif" WIDTH=90 HEIGHT=47 border=0 ALT=""></a></TD>
                    <TD>
                        <a href="qna/list.php"  target="main">
                            <img SRC="img/menu_07.gif" WIDTH=85 HEIGHT=47 border=0 ALT=""></a></TD>
                    <TD>
                        <a href="download/list.php"  target="main">
                            <img SRC="img/menu_08.gif" WIDTH=88 HEIGHT=47 border=0 ALT=""></a></TD>
                    <TD>
                        <a href="survey/survey.php"  target="main">
                            <img SRC="img/menu_09.gif" WIDTH=89 HEIGHT=47 border=0 ALT=""></a></TD>
                </TR>
            </table>
        </td>
    </tr>
</table>
<!--메뉴끝-->
</body>
</html>
