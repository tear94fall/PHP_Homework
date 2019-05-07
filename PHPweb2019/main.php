<?php
include "dbconn.php";
$connect = new mysqli($mysql_hostname, $mysql_username, $mysql_password, $mysql_database, $mysql_port);

//2. 문자셋 지정
if(! $connect->set_charset($mysql_charset))// (php >= 5.0.5)
{
    echo '[문자열변경실패] : '.$connect->connect_error;
}

$notice_query = 'select * from notice_board order by num desc limit 5';
$result_notice = $connect->query($notice_query) or die($this->_connect->error);

$free_query = 'select * from freeboard order by num desc limit 5';
$result_free = $connect->query($free_query) or die($this->_connect->error);

?>
<html>
<head>
    <title> :: PHP 프로그래밍 입문에 오신것을 환영합니다~~ :: </title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <script>
        function update()
        {
            var vote;
            var length = document.survey_form.singer.length;

            for (var i=0; i<length; i++)
            {
                if (document.survey_form.singer[i].checked == true)
                {
                    vote= document.survey_form.singer[i].value;
                    break;
                }
            }

            if (i == length)
            {
                alert("항목을 선택하세요!");
                return;
            }

            window.open("survey/update.php?singer="+vote , "",
                "left=200, top=200, width=180, height=250, status=no, scrollbars=no");
        }

        function result()
        {
            window.open("survey/result.php" , "",
                "left=200, top=200, width=180, height=250, status=no, scrollbars=no");
        }
    </script>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="776" align="center" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td>
            <table cellspacing="0" cellpadding="0" border="0">
                <!--상단제목그림-->
                <tr>
                    <td>
                        <table cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="center" valign="top" width="540" height="236">
                                    <!--공지사항 시작-->
                                    <table cellspacing="0" cellpadding="0" border="0">
                                        <tr height=10><td></td></tr>
                                        <tr>
                                            <td width="485">
                                                <img border="0" src="img/main_notice.gif" width="90"
                                                     height="25"></td>
                                        </tr>
                                        <tr height=10><td></td></tr>
                                        <?php
                                        while($row = $result_notice->fetch_array())
                                        {
                                            echo "<tr><td height='26' valign='center'>&nbsp;<img src='img/point.gif' width='5' height='9' border='0'style='cursor:hand'> <a href='notice/view.php?num=$row[num]'>&nbsp;$row[name] - $row[subject] </a></td></tr><tr><td bgcolor='#CAC9C9' height='1'></td></tr>";
                                        }
                                        ?>
                                        <tr>
                                            <td align="right"><a href="notice/list.php"><font color="#D6851B"
                                                                                              style='cursor:hand'>more...</font></td></a>
                                        </tr>
                                    </table>
                                    <!--공지사항 끝 -->

                                    <!--자유게시판 시작-->
                                    <table cellspacing="0" cellpadding="0" border="0">
                                        <tr>
                                            <td width="485">
                                                <img border="0" src="img/main_free.gif" width="108" height="25"></td>

                                        <tr height=10><td></td></tr>
                                        <?php
                                        while($row = $result_free->fetch_array())
                                        {
                                            echo "<tr><td height='26' valign='center'>&nbsp;<img src='img/point.gif' width='5' height='9' border='0'style='cursor:hand'><a href='freeboard/view.php?num=$row[num]'>&nbsp;$row[name] - $row[subject] </a></td></tr><tr><td bgcolor='#CAC9C9' height='1'></td></tr>";
                                        }
                                        ?>
                                        <tr>
                                            <td align="right"><a href="freeboard/list.php"><font color="#D6851B"
                                                                                                 style='cursor:hand'>more...</font></td></a>
                                        </tr>
                                    </table>
                                    <!--자유게시판 끝 -->
                                </td>
                                <td align="center" width="250" >
                                    <table align="center" cellspacing="0" cellpadding="0" border="0">
                                        <tr>
                                            <td bgcolor="#CAC9C9" height="188" width="1"></td>
                                            <td width="230" align="center">
                                                <form name=survey_form method=post >
                                                    <table border=0 cellspacing=0 cellpdding=0 width='170' align='center'>
                                                        <tr>
                                                            <td><img src="img/bbs_poll.gif"></td>
                                                        </tr>
                                                        <tr height=1 bgcolor=#5AB2C8><td></td></tr>
                                                        <tr>
                                                            <td><br> ♬ 제일 좋아하는 가수는?</td></tr>
                                                        <tr height=7><td> </td></tr>
                                                        <tr><td>
                                                                <input type=radio name='singer' value='ans1' >1.레드벨벳</td></tr>
                                                        <tr height=5><td> </td></tr>
                                                        <tr><td>
                                                                <input type=radio name='singer' value='ans2' >2.볼빨간 사춘기</td></tr>
                                                        <tr height=5><td> </td></tr>
                                                        <tr><td>
                                                                <input type=radio name='singer' value='ans3' >3.블랙핑크</td></tr>
                                                        <tr height=5><td> </td></tr>
                                                        <tr><td>
                                                                <input type=radio name='singer' value='ans4' >4.트와이스</td></tr>
                                                        <tr height=10><td> </td></tr>
                                                        <tr height=1 bgcolor=#5AB2C8><td></td></tr>
                                                        <tr>
                                                        <tr height=10><td></td></tr>
                                                        <tr>
                                                            <td align=middle><img src="img/b_vote.gif" border="0"
                                                                                  style='cursor:hand' onclick=update()>
                                                                <img src="img/b_result.gif" border="0"
                                                                     style='cursor:hand' onclick=result()>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </form>
                                            </td>
                                            <td bgcolor="#CAC9C9" height="188" width="1"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
