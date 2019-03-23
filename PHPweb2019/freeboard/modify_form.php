<?php
session_start();

include "../dbconn.php";

$num = $_REQUEST['num'];
$passwd = $_REQUEST['passwd'];

$sql = "select * from freeboard where num='$num'";

$result = $connect->query($sql) or die($this->_connect->error);
$row = $result->fetch_array();

$userid = $_SESSION['userid'];

if ($passwd != $row['passwd'] and $userid != "admin")
{
    echo "<script>alert('비밀번호가 틀립니다.'); history.go(-1)</script>";
    exit;
}
?>

<html>
<head>
    <title> :: PHP 프로그래밍 입문에 오신것을 환영합니다~~ ::</title>
    <link rel="stylesheet" href="../style.css" type="text/css">
</head>
<table border=0 cellspacing=0 cellpdding=0 width='776' align='center'>
    <tr><td colspan="6" height=25>
            <img src="img/freeboard_title.gif"></td></tr>
    <tr><td background="img/bbs_bg.gif">
            <img border="0" src="img/blank.gif" width="1" height="3"></td>
    </tr>
    <tr><td height=10></td></tr>
    <form name="modifyform"
          action="modify.php?num=<?php echo $num; ?>&
           page=<?php echo $page; ?>" method="post">
        <tr>
            <td align=center colspan=2>
                <table width=776 border=0 cellspacing=0 cellpadding=0
                       class="txt" bgcolor=#F7F7F2>
                    <tr height=1 bgcolor=#5AB2C8><td></td></tr>
                    <tr bgcolor="#D2EAF0" height=20>
                        <td width="100%">&nbsp;&nbsp;
                            <b>이름, 비밀번호</b></td>
                    </tr>
                    <tr height=1 bgcolor=#5AB2C8><td></td></tr>
                    <tr>
                        <td>
                            <table width="100%" border=0 cellspacing=0 cellpadding=0
                                   class="txt">
                                <tr height=25>
                                    <td align=right width=100>이름&nbsp;</td>
                                    <td align=left>
                                        <input style='font-size:9pt;border:1px solid' type=text
                                               name="name" value="<?php echo $row['name'] ?>"
                                               size=25 maxlength=16></td>
                                </tr>

                                <tr height=25>
                                    <td align=right>비밀번호&nbsp;</td>
                                    <td align=left><input style='font-size:9pt;border:1px solid'
                                                          type="password" name="passwd"
                                                          value="<?php echo $row['passwd']; ?>" size=25 maxlength=16>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                    <tr height=1 bgcolor=#5AB2C8><td colspan=2></td></tr>
                    <tr bgcolor="#D2EAF0" height=20>
                        <td colspan=2>&nbsp;&nbsp;<b>하고 싶은 말을 남기세요.</b></td>
                    </tr>
                    <tr height=1 bgcolor=#5AB2C8><td colspan=5></td></tr>
                    <tr>
                        <td colspan=2>
                            <table width="100%" border=0 cellspacing=0
                                   cellpadding=0 class="txt">
                                <tr>
                                    <td height=25>&nbsp;&nbsp;제목&nbsp;&nbsp;&nbsp;
                                        <input style='font-size:9pt;border:1px solid'
                                               type='text' name="subject"
                                               value="<?php echo $row['subject']; ?>"
                                               size=50 maxlength=100></td>
                                </tr>
                                <tr><td height=2></td> </tr>

                                <tr valign=top>
                                    <td>내용
                                        <textarea style='font-size:9pt;border:1px solid'
                                                  name="content" style=background-image:url
                                                  ('img/bbs_text_line.gif');
                                        cols=74 rows=14 wrap=virtual><?php echo $row['content'] ?></textarea></td>
                                </tr>
                                <tr height=20>
                                    <td></td>
                                </tr>
                                <tr height=1 bgcolor=#5AB2C8><td colspan=5></td></tr>
                                <tr>
                                    <td height=30 align=center valign=top bgcolor="FFFFFF">
                                        <br>

                                        <input type=image src="img/i_write.gif"
                                               align=absmiddle border=0>&nbsp;
                                        <a href='list.php?page=<?php echo $page ?>'>
                                            <img style='cursor:hand'src="img/i_list.gif"
                                                 align=absmiddle border=0 ></a></td>

                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </form>
</table>
</body>
</html>