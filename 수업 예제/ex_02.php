<?php

$exceptNum = 4;
for($i=0;$i<10;$i++){
    if($i%$exceptNum==0){
        continue;
    }
    echo"{$i}<br>";
}


echo"-------------------------------------"."<br>";

$num = 0;
$startNum=1;
$endNum=100;

$i=$startNum;

while(true){
    $num+=$i;
    if($i==$endNum){
        break;
    }
    $i++;
}
echo "{$startNum}에서 부터 {$endNum}까지 더한 값은 {$sum}입니다"."<br>";

$arr = array("바나나", "토마토","사과");
for($i=0;$i<count($arr);$i++){
    echo$arr[$i]."<br>";
}


?>