<html>
<head>
    <title>:: PHP 프로그래밍 입문에 오신것을 환영합니다~~ ::</title>
    <link rel="stylesheet" href="../style.css" type="text/css">
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table border=0 cellspacing=0 cellpdding=0 width='776' align='center'>
    <tr>
        <td colspan="5" height=25>
            <img src="img/guestbook_title.gif"></td>
    </tr>
    <tr>
        <td background="img/bbs_bg.gif">
            <img border="0" src="img/blank.gif" width="1" height="3"></td>
    </tr>
</table>
<tr>
    <td background="img/bbs_bg.gif">
        <img border="0" src="img/blank.gif" width="1" height="1"></td>
</tr>
<table border=0 cellspacing=5 cellpdding=0 width='776' align='center'>
    <form action="insert.php">
        <tr>
            <td>* 방문자명 : <input type=text style='font-size:9pt;border:1px solid' name=name size=10>
                <br>* 비밀번호 : <input type=password style='font-size:9pt;border:1px solid' name=passwd size=10>
            </td>
        </tr>
        <tr><td>방명록 내용<br><textarea placeholder="내용을 입력해주세요." style='font-size:9pt;border:1px solid'
                          name="content"style=background-image:url('img/bbs_text_line.gif'); cols=50 rows=3
                          wrap=virtual></textarea>&nbsp;&nbsp;<input type=image src=img/regist.gif></td></tr>
    </form>
</table>
<table width=776 border=0 cellspacing=0 cellpadding=0 align=center>
    <tr height=5><td colspan=2> </td></tr>
    <tr height=1 bgcolor=#5AB2C8><td colspan=2></td></tr>
    <?php
    $scale = 5;   // 한 화면에 표시되는 글 수

    include "../dbconn.php";
    $page = $_REQUEST['page'];

    $sql = "select * from guestbook order by num desc";
    $result = $connect->query($sql) or die($this->_connect->error);

    $total_record = mysqli_num_rows($result); // 전체 글 수

    // 전체 페이지 수($total_page) 계산
    if ($total_record % $scale == 0)
        $total_page = floor($total_record/$scale);
    else
        $total_page = floor($total_record/$scale) + 1;

    if (!$page)                 // 페이지번호($page)가 0 일 때
        $page = 1;              // 페이지 번호를 1로 초기화

    // 표시할 페이지($page)에 따라 $start 계산
    $start = ($page - 1) * $scale;

    for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
    {
        mysqli_data_seek($result, $i);    // 레코드 포인터 이동
        $row = mysqli_fetch_array($result);   // 레코드 가져오기

        $content = str_replace("\n", "<br>", $row[content]);
        $day = $row[regist_day];

        echo "<tr height=25><td>글번호 : $row[num] &nbsp;&nbsp; 작성자 : $row[name] &nbsp;&nbsp;날짜 : $day </td><td align=left><a href='passwd_form.php?num=$row[num]'>삭제</a></td></tr><tr height=1 bgcolor=#5AB2C8><td colspan=2></td></tr><tr><td colspan=2></td></tr><tr><td colspan=2>$content<br></td></tr><tr><td colspan=2 align=right>IP 주소 : $row[ip]</td></tr><tr height=1 bgcolor=#5AB2C8><td colspan=2></td></tr> ";
    }
    ?>
    <tr><td colspan=2>&nbsp;</td></tr>
    <tr><td colspan=2 align=center>
            <?php
            // 게시판 목록 하단에 페이지 링크 번호 출력
            for ($i=1; $i<=$total_page; $i++)
            {
                if ($page == $i)
                {
                    echo "<font color='4C5317'><b>[$i]</b></font>";
                }
                else
                {
                    echo "<a href='guestbook.php?page=$i'><font color='4C5317'>[$i]</font></a>";
                }
            }
            ?>
        </td>
    </tr>
</table>
</td>
</tr>
</table>
<br><br><br>
</body>
</html>