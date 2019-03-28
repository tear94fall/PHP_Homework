<?php
session_start();
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

$subject = $_REQUEST['content'];
$content = $_REQUEST['subject'];

$num = $_REQUEST['num'];
$page = $_REQUEST['page'];


$save_dir = "data/";
$upfile = $_FILES["myFile"];
$upfile_name = $_FILES["upfile"]["name"];
$upfile_size = $_FILES["upfile"]["size"];
$tmp_file = $_FILES["upfile"]["tmp_name"];

$filesize = 0;

$dest = $save_dir . $_FILES["upfile"]["name"];


if(!$userid) {
    echo("<script>window.alert('로그인 후 사용하세요.'); history.go(-1)</script>");
    exit;
}

if(!$subject) {
    echo("<script>window.alert('제목을 입력하세요.'); history.go(-1)</script>");
    exit;
}

if(!$content) {
    echo("<script>window.alert('내용을 입력하세요.'); history.go(-1)</script>");
    exit;
}

include "../dbconn.php";

$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
$ip = $_SERVER["REMOTE_ADDR"];

if($upfile_name)
{
    if ( file_exists("data/$upfile_name") ){
        echo("<script>window.alert('선택한 파일과 동일한 이름이 존재합니다.');history.go(-1)</script>");
        exit;
    }

    if($upfile_size>200000) {
        echo("<script>window.alert('업로드 파일 사이즈가 지정된 용량(2M)을 초과합니다.');history.go(-1)</script>");
        exit;
    }

    if( strlen($upfile_size) < 7 ) {
        $filesize = sprintf("%0.2f KB", $upfile_size/1000);
    }
    else
    {
        $filesize = sprintf("%0.2f MB", $upfile_size/1000000);
    }

    //move_uploaded_file($upfile_name, "data/$upfile_name")
    //!copy($upfile, "data/$upfile_name");

    if(!move_uploaded_file($tmp_file, $dest))
    {
        echo("<script>window.alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.'); history.go(-1)</script>");
        exit;
    }
    /*
    if (!unlink($upfile)) {
        echo("<script>window.alert('임시파일을 삭제하는데 실패했습니다.');history.go(-1)</script>");
        exit;
    }
    */
}

if (!$num)
{
    $depth = 0;   // depth, ord 를 0으로 초기화
    $ord = 0;

    // 레코드 삽입 명령
    $sql = "insert into down_board (group_num, depth, ord, id, name, subject,";
    $sql .= "content, regist_day, hit, ip, filename, filesize) ";
    $sql .= "values(0, $depth, $ord, '$userid', '$username', 
                      '$subject',";
    $sql .= "'$content', '$regist_day', 0, '$ip', '$upfile_name', 
               '$filesize')";
    $result = $connect->query($sql) or die($this->_connect->error);

    // 최근 auto_increment 필드(num) 값 가져오기
    $sql = "select last_insert_id()";
    $result = $connect->query($sql) or die($this->_connect->error);
    $row = $result->fetch_array();
    $auto_num = $row[0];

    // group_num 값 업데이트
    $sql = "update down_board set group_num = $auto_num where num=$auto_num";
    $result = $connect->query($sql) or die($this->_connect->error);
}
else
{
    // 부모 글 가져오기
    $sql = "select * from down_board where num = $num";
    $result = $connect->query($sql) or die($this->_connect->error);
    $row = $result->fetch_array();

    // 부모 글로 부터 group_num, depth, ord 값 설정
    $group_num = $row[group_num];
    $depth = $row[depth] + 1;
    $ord = $row[ord] + 1;

    $sql = "update down_board set ord = ord + 1
             where group_num = $row[group_num] and ord > $row[ord]";
    $result = $connect->query($sql) or die($this->_connect->error);

    $sql = "insert into down_board(group_num, depth, ord, id, name,
              subject,";
    $sql .= "content, regist_day, hit, ip, filename, filesize) ";
    $sql .= "values($group_num, $depth, $ord, '$userid', '$username',
                      '$subject',";
    $sql .= "'$content', '$regist_day', 0, '$ip', '$upfile_name','$filesize')";

    $result = $connect->query($sql) or die($this->_connect->error);
}
$connect->close();               // DB 연결 끊기

Header("Location:list.php?page=$page");  // list.php 로 이동합니다.
?>