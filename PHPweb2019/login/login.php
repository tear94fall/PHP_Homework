<?php

include "../dbconn.php";

$id = $_REQUEST['id'];
$passwd = $_REQUEST['passwd'];

// 이전화면에서 이름이 입력되지 않았으면 "이름을 입력하세요"
// 메시지 출력
if(!$id) {
    echo("<script>window.alert('아이디를 입력하세요.'); history.go(-1)</script>");
    exit;
}

if(!$passwd) {
    echo("<script>window.alert('비밀번호를 입력하세요.'); history.go(-1)</script>");
    exit;
}

$sql = "select * from member where id= '$id'";
$result = $connect->query($sql) or die($this->_connect->error);

$num_match = mysqli_num_rows($result);

if(!$num_match)
{
    echo("<script>window.alert('등록되지 않은 아이디입니다.'); history.go(-1)</script>");
}
else
{
    $row = $result->fetch_array();
    $db_passwd = $row['passwd'];

    if($passwd != $db_passwd)
    {
        echo("<script>window.alert('비밀번호가 틀립니다.'); history.go(-1)</script>");

        exit;
    }
    else
    {
        $userid = $row['id'];
        $username = $row['name'];

        session_start();
        $_SESSION['userid'] = $userid;
        $_SESSION['useername'] = $username;
        //session_register(userid);
        //session_register(username);

        // 새로 추가
        echo("<script>window.alert('로그인에 성공하셨습니다.'); history.go(-1)</script>");

        echo("<script>top.location.href = '../index.php';</script>");
    }
}

?>
