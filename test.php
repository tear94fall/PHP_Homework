<?php
/**
 * mysqli 클래스 방식
 * 샘플예제 입니다. 대충 어떻게 동작되는지 공부하시기에 좋게 정리해놓았습니다.
 * 각각의 값을 변경하고 연결테스트 하기에도 좋습니다.
 */

//0. 설정
$mysql_hostname = 'localhost';
$mysql_username = 'root';
$mysql_password = 'root1234';
$mysql_database = 'test';
$mysql_port = '3306';
$mysql_charset = 'utf8';


//1. DB 연결
$connect = new mysqli($mysql_hostname, $mysql_username, $mysql_password, $mysql_database, $mysql_port);

if($connect->connect_errno){
    echo '[mysql 연결실패] : '.$connect->connect_error.'';
} else {
    echo '[mysql 연결성공]'."<br>";
}

//2. 문자셋 지정
if(! $connect->set_charset($mysql_charset))// (php >= 5.0.5)
{
    echo '[문자열변경실패] : '.$connect->connect_error;
}
$number = 2;

//3. 쿼리 생성
$sql = "select * from students where number = '$number'";

//4. 쿼리 실행
$result = $connect->query($sql) or die($this->_connect->error);
$row = $result->fetch_array();

//5. 결과 처리
while($row = $result->fetch_array())
{
    echo $row['number']."<br>";
}

//6. 연결 종료
$connect->close();


//post 방식으로 값 넘겨 받을때
// $num = $_REQUEST['num'];


// 세션에 값 등록
//         $_SESSION['userid'] = $userid;
//        $_SESSION['useername'] = $username;



// 세션값 변수에 등록
//  $userid = $_SESSION['userid'];


// 방문자의 IP 주소를 저장합니다.
//$ip = $_SERVER["REMOTE_ADDR"];
?>