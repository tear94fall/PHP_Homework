<? 
       $str1 = substr ("abcdef", 1);    // "bcdef" �� ��ȯ�Ѵ�.
       $str2 = substr ("abcdef", 2, 3); // "cde" �� ��ȯ�Ѵ�.
       /* ���� start�� �������, ��ȯ�Ǵ� ���ڿ��� string�� ���������� 
          start ��° ���� �����ϴ� ���ڿ��� �ȴ�. */

       $str3 = substr ("abcdef", -1); // "f" �� ��ȯ
       $str4 = substr ("abcdef", -4); // "cdef" �� ��ȯ
       $str5 = substr ("abcdef", -3, 1); // "d" �� ��ȯ

       echo $str1." ".$str2." ".$str3." ".$str4." ".$str5."<br>";
  ?>
