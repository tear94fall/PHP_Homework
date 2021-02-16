<?php
session_start();

$subject = NULL;
if(isset($_REQUEST['subject'])){
    $subject = $_REQUEST['subject'];
}

$content = NULL;
if(isset($_REQUEST['content'])){
    $content = $_REQUEST['content'];
}

$userid = NULL;
if(isset($_SESSION['userid'])){
    $userid = $userid['userid'];
}

$username = NULL;
if(isset($_SESSION['username'])){
    $username = $_REQUEST['username'];
}

$page = NULL;
if(isset($_REQUEST['page'])){
    $page = $_REQUEST['page'];
}

$num = NULL;
if(isset($_REQUEST['num'])){
    $num = $_REQUEST['num'];
}

if (!$userid)
{
    echo("<script>window.alert('로그인 후 글쓰기를 하셔야 합니다.');history.go(-1)</script>");
    exit;
}
?>
<html>
<head>
    <title>:: PHP 프로그래밍 입문에 오신 것을 환영합니다~~ ::</title>
    <link rel='stylesheet' href='../style.css' type='text/css'>
</head>
<body leftmargin='0' topmargin='0' marginwidth='0' marginheight='0'>
<form name='writeform'
      action='insert.php?num=<?php echo $num ?>&page=<?php echo $page ?>'
      method='post' enctype='multipart/form-data'>
    <table width=776 border=0 cellspacing=0 cellpadding=0 align=center>
        <tr>
            <td colspan="5" height=25><img src="img/down_title.gif"></td>
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
                                <td align=left> : <?php echo $username ?> </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr height=1 bgcolor=#5AB2C8><td colspan=2></td></tr>
                <tr bgcolor='#D2EAF0' height=20>
                    <td colspan=2><b>하고 싶은 말을 남기세요.</b></td>
                </tr>
                <tr height=1 bgcolor=#5AB2C8><td colspan=5></td></tr>
                <tr>
                    <td colspan=2>
                        <table width='100%' border=0 cellspacing=0 cellpadding=0 class='txt'>
                            <?php
                            if ($num)
                            {
                                include "../dbconn.php";

                                $sql = "select * from down_board where num = $num";
                                $result = $connect->query($sql) or die($this->_connect->error);
                                $row = $result->fetch_array();

                                $subject = "[re]".$row['subject'];
                                $content = ">".$row['content'];
                                $content = str_replace("\n", "\n>", $content);
                                $content = "\n\n".$content;

                                $connect->close();
                            }
                            ?>
                            <tr height=10><td colspan=2></td> </tr>
                            <tr>
                                <td width=70 height=25 align=left>&nbsp;&nbsp;제목
                                </td>
                                <td height=25 >
                                    <input style='font-size:9pt;border:1px solid' type='text'
                                           name='subject' size=50 maxlength=100
                                           value='<?php echo $subject ?>'></td>
                            </tr>

                            <tr valign=top>
                                <td width=70 height=25 align=left>&nbsp;&nbsp;내용
                                </td>
                                <td>
            <textarea style='font-size:9pt;border:1px solid' name='content'
                      style=background-image:url('img/bbs_text_line.gif');
                      cols=74 rows=12 wrap=virtual><?php echo $content ?></textarea></td>
                            </tr>
                            <tr>
                                <td width=70 height=25 align=left>&nbsp;&nbsp;첨부파일</td>
                                <td><input style='font-size:8pt;border:1px solid' type='file'
                                           name='upfile' size=50 maxlength=100></td>
                            </tr>
                            <tr height=10> <td colspan=2></td> </tr>
                            <tr height=1 bgcolor=#5AB2C8><td colspan=2></td></tr>
                            <tr>
                                <td colspan=2 height=10 align=center valign=top
                                    bgcolor='FFFFFF'><br>

                                    <input type=image src='img/i_ok.gif'
                                           align=absmiddle border=0> &nbsp;<a href='list.php'>
                                        <img style='cursor:hand'src='img/i_list.gif'
                                             align=absmiddle border=0 ></a></td>
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