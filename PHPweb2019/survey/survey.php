<html>
<head>
    <title> :: PHP 프로그래밍 입문에 오신것을 환영합니다~~ :: </title>
    <link rel="stylesheet" href="../style.css" type="text/css">
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

            window.open("update.php?singer="+vote , "",
                "left=200, top=200, width=180, height=250, status=no, scrollbars=no");
        }

        function result()
        {
            window.open("result.php" , "",
                "left=200, top=200, width=180, height=250, status=no, scrollbars=no");
        }
    </script>

</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<form name=survey_form method=post >
    <table border=0 cellspacing=0 cellpdding=0 width='300' align='center'>
        <input type=hidden name=kkk value=100>
        <tr>
            <td><img src="img/bbs_poll.gif"></td>
        </tr>
        <tr height=1 bgcolor=#5AB2C8><td></td></tr>
        <tr height=7><td></td></tr>
        <tr><td><b> ♬ 제일 좋아하는 가수는?</b></td></tr>
        <tr><td><input type=radio name='singer' value='ans1' >1.레드벨벳</td></tr>
        <tr height=5><td></td></tr>
        <tr><td><input type=radio name='singer' value='ans2' >2.볼빨간 사춘기</td></tr>
        <tr height=5><td></td></tr>
        <tr><td><input type=radio name='singer' value='ans3' >3.블랙핑크</td></tr>
        <tr height=5><td></td></tr>
        <tr><td><input type=radio name='singer' value='ans4' >4.트와이스</td></tr>
        <tr height=7><td></td></tr>
        <tr height=1 bgcolor=#5AB2C8><td></td></tr>
        <tr>
        <tr height=7><td></td></tr>
        <tr>
            <td align=middle><img src="img/b_vote.gif" border="0"  style='cursor:hand'
                                  onclick=update()></a>
                <img src="img/b_result.gif" border="0"  style='cursor:hand'
                     onclick=result()></a></td></tr>
    </table>
</form>
</body>
</html>
