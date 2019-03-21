<html>
 <head>
  <title>:: PHP 프로그래밍 입문에 오신 것을 환영합니다~~ ::</title>
 <link rel="stylesheet" href="../style.css" type="text/css">	
 </head>
 <body leftmargin="0" topmargin="0" marginwidth="0" 
     marginheight="0">

    <table width=776 align=center border=0 cellspacing=0 
               cellpadding=0>
       <form name="writeform" action="insert.php" method="post">
        <tr><td colspan="6" height=25>
              <img src="img/freeboard_title.gif">
            </td></tr>
        <tr><td background="img/bbs_bg.gif">
              <img border="0" src="img/blank.gif" 
                    width="1" height="3"></td></tr>
        <tr><td height=10></td></tr>


          <td align=center colspan=2>
    <table width=776 border=0 cellspacing=0 cellpadding=0 
           class="txt"bgcolor=#F7F7F2>
        <tr height=1 bgcolor=#5AB2C8><td></td></tr>
        <tr bgcolor="#D2EAF0" height=20>
          <td width="100%">&nbsp;&nbsp;
            <b>이름, 전자우편주소, 비밀번호</b></td>
        </tr>
        <tr height=1 bgcolor=#5AB2C8><td></td></tr>
        <tr>
          <td>
    <table width="100%" border=0 cellspacing=0 cellpadding=0 
           class="txt">
        <tr height=25>
          <td align=right width=100>이름&nbsp;</td>
          <td align=left>
            <input style='font-size:9pt;border:1px solid' 
                    type=text name="name" 
                    size=25 maxlength=16></td>
        </tr>

        <tr height=25>
          <td align=right>비밀번호&nbsp;</td>
          <td align=left>
            <input style='font-size:9pt;border:1px solid' 
                    type="password" name="passwd" size=25 
               maxlength=16>
          </td>
        </tr>

    </table>
          </td>
        </tr>
        <tr height=1 bgcolor=#5AB2C8><td colspan=2></td></tr>
        <tr bgcolor="#D2EAF0" height=20>
          <td colspan=2>&nbsp;&nbsp;<b>하고 싶은 말을 남기세요.</b>
          </td>
        </tr>        
        <tr height=1 bgcolor=#5AB2C8><td colspan=5></td></tr>  
        <tr>
          <td colspan=2>
    <table width="100%" border=0 cellspacing=0 cellpadding=0 
           class="txt">
        <tr> 
          <td height=25>&nbsp;&nbsp;제목&nbsp;&nbsp;&nbsp;
            <input style='font-size:9pt;border:1px solid' 
                    type='text'name="subject" size=50 maxlength=100>
          </td>
        </tr>
     
        <tr valign=top>
          <td align="center" >
             <p align="left">&nbsp; 내용&nbsp;&nbsp;&nbsp;
                 <textarea style='font-size:9pt;border:1px solid' name="content"style=background-image:url('img/bbs_text_line.gif');
                 cols=74 rows=14 wrap=virtual></textarea>
          </td>
        </tr>
        <tr height=20>
          <td></td>
        </tr>
        <tr height=1 bgcolor=#5AB2C8><td></td></tr>
        <tr>
          <td height=30 align=center valign=top bgcolor="FFFFFF">
          <br>

            <input type=image src="img/i_write.gif" align=absmiddle 
                 border=0> &nbsp;<a href='list.php'>
                      <img style='cursor:hand'src="img/i_list.gif" 
                           align=absmiddle border=0 ></a></td>

        </tr>
    </table>
          </td>
        </tr> 
    </table>
          </td>
        </tr>
       </form>
    </table>
  </body>
</html>