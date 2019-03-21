<?
session_start();

include "../dbconn.php";

$sql = "select id from down_board where num = $num";
$result = mysql_query($sql, $connect);

$row = mysql_fetch_array($result);

if ($userid != "admin" and $userid != $row[id])
{
    echo("<script>window.alert('수정 권한이 없습니다.');history.go(-1)</script>");
    exit;
}
$sql = "select * from down_board where num=$num";
$result = mysql_query($sql, $connect);
$row = mysql_fetch_array($result);
$subject = $row[subject];
$content = $row[content];
?>
<html>
<head>
    <title>:: PHP 프로그래밍 입문에 오신것을 환영합니다~~ ::</title>
    <link rel='stylesheet' href='../style.css' type='text/css'>
</head>
<body leftmargin='0' topmargin='0' marginwidth='0' marginheight='0'>

<form name='writeform' action='modify.php? num=<?php print$num ?>& page=<?php print$page ?>' method='post' enctype='multipart/form-data' >
    <table width=776 border=0 cellspacing=0 cellpadding=0 align=center>
        <tr>
            <td colspan="6" height=25><img src="img/down_title.gif"></td>
        </tr>
        <tr>
            <td background="img/bbs_bg.gif">
                <img border="0" src="img/blank.gif"
                     width="1" height="3"></td>
        </tr>
        <tr>
            <td height=10></td>
        </tr>
        <td align=center colspan=2>
            <table width=776 border=0 cellspacing=0 cellpadding=0 class='txt'
                   bgcolor=#F7F7F2>
                <tr height=1 bgcolor=#5AB2C8><td></td></tr>
                <tr height=1 bgcolor=#5AB2C8><td></td></tr>
                <tr>
                    <td>
                        <table width='100%' border=0 cellspacing=0 cellpadding=0 class='txt'>
                            <tr height=25>
                                <td align=right width=100>이름&nbsp;</td>
                                <td align=left> : <? echo $username ?> </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr height=1 bgcolor=#5AB2C8><td colspan=2></td></tr>
                <tr bgcolor='#D2EAF0' height=20>
                    <td colspan=2>&nbsp;&nbsp;<b>글 제목, 내용만 수정 가능
                            (첨부파일 수정할려면 삭제 후 다시 작성하세요)</b></td>
                </tr>
                <tr height=1 bgcolor=#5AB2C8><td colspan=5></td></tr>
                <tr>
                    <td colspan=2>
                        <table width='100%' border=0 cellspacing=0 cellpadding=0 class='txt'>
                            <tr height=10><td colspan=2></td> </tr>
                            <tr>
                                <td width=70 height=25 align=left>&nbsp;&nbsp;제목
                                </td>
                                <td height=25 >
                                    <input style='font-size:9pt;border:1px solid' type='text'
                                           name='subject' size=50 maxlength=100
                                           value='<? echo $subject ?>'></td>
                            </tr>

                            <tr valign=top>
                                <td width=70 height=25 align=left>&nbsp;&nbsp;내용
                                </td>
                                <td>
            <textarea style='font-size:9pt;border:1px solid' name='content'
                      style=background-image:url('img/bbs_text_line.gif');
                      cols=74 rows=12 wrap=virtual><? echo $content ?>
            </textarea></td>
                            </tr>
                            <tr height=10> <td colspan=2></td> </tr>
                            <tr height=1 bgcolor=#5AB2C8><td colspan=2></td></tr>
                            <tr>
                                <td colspan=2 height=10 align=center valign=top bgcolor='FFFFFF'><br>

                                    <input type=image src='img/i_write.gif' align=absmiddle border=0>
                                    &nbsp;<a href='list.php'>
                                        <img style='cursor:hand'src='img/i_list.gif' align=absmiddle
                                             border=0 ></a></td>

                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
        </table>
</form>
</table>
</body>
</html>