<?php

for($i =0;$i<5;$i++){
    for($j=0;$j<$i+1;$j++){
        echo"*";
    }echo"<br>";
}


$i = 0;
while($i<5){
    echo($i++)."<br>";
}

$k=0;
$s=0;

while($k>5){
    echo"변수 k의 값은 ".(++$k)."입니다.<br>";
}

do{
    echo"변수 s의 값은".(++$s)."입니다<br>";
}while($s>5);

for($i=0;$i<5;$i++){
    echo"{$i}<br>";
}


$arr = array(1,2,3,4,5);
foreach($arr as $value){
    echo"변수 \$value의 혀재 값은 {$value}입니다.<br>";
}
?>