<html>
  <head>
  <META http-equiv="Content-Type" content="text/html; charset=EUC-KR">

   <title>PASSWORD</title>
  <style type="text/css">
  td,p,div,input,th, select{ font-size:9pt;}
  .c1{BORDER-RIGHT:black 1px 
  solid;BORDER-TOP:black 1px solid;BORDER-LEFT:black 1px 
  solid;BORDER-BOTTOM:black 1px solid;}
  .hand{cursor:hand;}
  </style>
  </head>

  <body bgcolor="#FFFFFF" marginheight="0" topmargin="0" 
         OnLoad="javascript:pwform.passwd.focus()">
  <br>

     <script language=javascript>
         function go() {
   if (document.pwform.passwd.value == "") {
      alert("비밀번호를 입력해 주세요.");
      return false;
    }
       document.pwform.submit();
   }

         function clean() {
       document.pwform.passwd.value = "";
  }
    </script>

   <div align="center"> 

<?php
    $num = $_REQUEST['num'];
    $case = $_REQUEST['case'];
    $page = $_REQUEST['page'];
   if ($case == "modify")
   {
      echo "<form name=pwform method=post action='modify_form.php?num=$num&page=$page'>";
   }
   else
   {
      echo "<form name=pwform method=post action='delete.php?num=$num&page=$page'>";
   }
?>

    <table cellpadding="0" cellspacing="0" border="0" width="306">
        <tr height=1 bgcolor="#292E5F">
          <td></td>
        </tr>
        <tr height=18> 
          <td bgcolor="#CEE3F7"><img src="img/bbs_check.gif" >
            <font color=003366> <b>비밀번호를 입력하세요!</b></font>
          </td>
        </tr>
        <tr height=1 bgcolor="#292E5F">
          <td></td>
        </tr>
        <tr height=20 bgcolor="#f7f7f2">
          <td></td>
        </tr>
        <tr> 
          <td valign="top" align="center">
    <table cellpadding="0" cellspacing="5" border="0" width="100%" 
             bgcolor="#f7f7f2">
        <tr> 
          <td width="80" align="right"> 
            <font size="-1" face="돋움"> 비밀번호 </font>
          </td>
          <td width="170"> 
            <input class=c1 type="password" name="passwd" size="15" 
               maxlength="10">
          </td>
        </tr>
        <tr>
          <td colspan=2 align=center>      
            <img src="img/button_ok.gif" align=absmiddle class=hand 
                                       onclick="go()">
            <img src="img/button_rewrite.gif" align=absmiddle class=hand 
                      onclick="clean()">
            <img src="img/button_close.gif" align=absmiddle class=hand 
                      onclick="javascript:history.back()">
        </tr>
        </tr>
    </table>
          </td>
        </tr>
        <tr height=20 bgcolor="#f7f7f2">
          <td></td>
        </tr>
        <tr height=1 bgcolor="#292E5F">
          <td></td>
        </tr>
    </table>
     </form>
   </div>
  </body>
</html>