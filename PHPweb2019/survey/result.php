<?php
include "../dbconn.php";

$query ="select * from survey";
$result = $connect->query($query) or die($this->_connect->error);

$row = $result->fetch_array();

$ans1_percent = 0;
$ans2_percent = 0;
$ans3_percent = 0;
$ans4_percent = 0;

$total = (int)$row['ans1'] + (int)$row['ans2'] + (int)$row['ans3'] + (int)$row['ans4'];

if((int)$total!=0){
    $ans1_percent = (int)$row['ans1']/(int)$total * 100;
    $ans2_percent = (int)$row['ans2']/(int)$total * 100;
    $ans3_percent = (int)$row['ans3']/(int)$total * 100;
    $ans4_percent = (int)$row['ans4']/(int)(int)$total * 100;
    
    $ans1_percent = floor($ans1_percent);
    $ans2_percent = floor($ans2_percent);
    $ans3_percent = floor($ans3_percent);
    $ans4_percent = floor($ans4_percent);
}
?>

<html>
<head>
    <title> :: PHP 프로그래밍 입문에 오신것을 환영합니다~~ :: </title>
    <link rel="stylesheet" href="../style.css" type="text/css">
</head>
<body bgcolor=#ffffff leftmargin=0 topmargin=0 marginwidth=0 marginheight=0>

<table width=180 height=250 border='0' cellspacing='0' cellpadding='0'>
    <tr>
        <td width=180 height=1 colspan=5 bgcolor=#ffffff></td>
    </tr>
    <tr>
        <td width=1 height=35 bgcolor='#ffffff'></td>
        <td width=9 bgcolor='#ffffff'></td>
        <td width=150  align=center bgcolor='#ffffff'><b>
                총 투표수 : <?php echo $total ?> &nbsp;명 </b></td>
        <td width=9 bgcolor='#ffffff'></td>
        <td width=1 bgcolor='#ffffff'></td>
    </tr>
    <tr>
        <td height=29 bgcolor='#ffffff'></td>
        <td></td>
        <td valign=middle><b>♬ 제일 좋아하는 가수는?</b></td>
        <td></td>
        <td bgcolor='#ffffff'></td>
    </tr>
    <tr>
        <td height=20 bgcolor='#ffffff'></td>
        <td></td>
        <td> 레드벨벳 (<b><?php echo $ans1_percent ?></b> %)
            <font color=purple><b><?php echo $row['ans1'] ?></b></font> 명</td>
        <td></td>
        <td bgcolor='#ffffff'></td>
    </tr>
    <tr>
        <td height=3 bgcolor='#ffffff'></td>
        <td></td>
        <td>
            <table width=100 border=0 height=3 cellspacing=0 cellpadding=0>
                <tr>
                    <?php
                    $rest = 100 - $ans1_percent;

                    echo "
        <td width='$ans1_percent%' bgcolor=purple></td>
        <td width='$rest%' bgcolor='#dddddd' height=5></td>
               ";
                    ?>
                </tr>
            </table>
        </td>
        <td></td>
        <td bgcolor='#ffffff'></td>
    </tr>
    <tr>
        <td height=20 bgcolor='#ffffff'></td>
        <td></td>
        <td> 볼빨간 사춘기 (<b><?php echo $ans2_percent ?></b> %)
            <font color=blue><b><?php echo $row['ans2'] ?></b></font> 명</td>
        <td></td>
        <td bgcolor='#ffffff'></td>
    </tr>
    <tr>
        <td height=3 bgcolor='#ffffff'></td>
        <td></td>
        <td>
            <table width=100 border=0 height=3 cellspacing=0 cellpadding=0>
                <tr>
                    <?php
                    $rest = 100 - $ans2_percent;

                    echo "
        <td width='$ans2_percent%' bgcolor=blue></td>
        <td width='$rest%' bgcolor='#dddddd' height=5></td>
               ";
                    ?>
                </tr>
            </table>
        </td>
        <td></td>
        <td bgcolor='#ffffff'></td>
    </tr>
    <tr>
        <td height=20 bgcolor='#ffffff'></td>
        <td></td>
        <td> 블랙핑크 (<b><?php echo $ans3_percent ?></b> %)
            <font color=green><b><?php echo $row['ans3'] ?></b></font> 명</td>
        <td></td>
        <td bgcolor='#ffffff'></td>
    </tr>
    <tr>
        <td height=3 bgcolor='#ffffff'></td>
        <td></td>
        <td>
            <table width=100 border=0 height=3 cellspacing=0 cellpadding=0>
                <tr>
                    <?php
                    $rest = 100 - $ans3_percent;

                    echo "
          <td width='$ans3_percent%' bgcolor=green></td>
          <td width='$rest%' bgcolor='#dddddd' height=5></td>
               ";
                    ?>
                </tr>
            </table>
        </td>
        <td></td>
        <td bgcolor='#ffffff'></td>
    </tr>

    <tr>
        <td height=20 bgcolor='#ffffff'></td>
        <td></td>
        <td> 트와이스 (<b><?php echo $ans4_percent ?></b> %)
            <font color=skyblue><b><?php echo $row['ans4'] ?></b></font> 명</td>
        <td></td>
        <td bgcolor='#ffffff'></td>
    </tr>
    <tr>
        <td height=3 bgcolor='#ffffff'></td>
        <td></td>
        <td>
            <table width=100 border=0 height=3 cellspacing=0 cellpadding=0>
                <tr>
                    <?php
                    $rest = 100 - $ans4_percent;

                    echo "
          <td width='$ans4_percent%' bgcolor=skyblue></td>
          <td width='$rest%' bgcolor='#dddddd' height=5></td>
               ";
                    ?>
                </tr>
            </table>
        </td>
        <td></td>
        <td bgcolor='#ffffff'></td>
    </tr>
    <tr>
        <td height=40 bgcolor='#ffffff'></td>
        <td></td>
        <td align=center valign=middle>
            <input type='image' style='cursor:hand' src='img/close.gif' border=0
                   onfocus=this.blur() onclick="window.close()"></td>
        <td></td>
        <td bgcolor='#ffffff'></td>
    </tr>
    <tr>
        <td height=1 colspan=5 bgcolor=#ffffff></td>
    </tr>
</table>
</body>
</html>

