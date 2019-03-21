<? 
       $str1 = substr ("abcdef", 1);    // "bcdef" 을 반환한다.
       $str2 = substr ("abcdef", 2, 3); // "cde" 을 반환한다.
       /* 만약 start가 음수라면, 반환되는 문자열은 string의 끝에서부터 
          start 번째 부터 시작하는 문자열이 된다. */

       $str3 = substr ("abcdef", -1); // "f" 를 반환
       $str4 = substr ("abcdef", -4); // "cdef" 를 반환
       $str5 = substr ("abcdef", -3, 1); // "d" 를 반환

       echo $str1." ".$str2." ".$str3." ".$str4." ".$str5."<br>";
  ?>
