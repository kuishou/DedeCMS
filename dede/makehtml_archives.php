<?
require_once(dirname(__FILE__)."/config.php");
require_once(dirname(__FILE__)."/../include/inc_typelink.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>����HTML</title>
<link href="base.css" rel="stylesheet" type="text/css">
</head>
<body background='img/allbg.gif' leftmargin='8' topmargin='8'>
<table width="98%" border="0" cellpadding="3" cellspacing="1" bgcolor="#666666" align="center">
  <form name='form2' action='content_list.php' method="get" target='stafrm'>
   <input type='hidden' name='nullfield' value='ok'>
  </form>
  <form name="form1" action="makehtml_archives_action.php" method="get" target='stafrm'>
  <tr> 
    <td height="20" colspan="2" background='img/tbg.gif'>
    	<table width="98%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="30%" height="18"><strong>�����ĵ�HTML��</strong></td>
          <td width="70%" align="right">&nbsp; </td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td width="108" valign="top" bgcolor="#FFFFFF">ѡ����Ŀ��</td>
    <td width="377" valign="top" bgcolor="#FFFFFF">
    <?
       if(empty($cid)) $cid="0";
       $tl = new TypeLink($cid);
       $typeOptions = $tl->GetOptionArray($cid,$cuserLogin->getUserChannel(),0);
       echo "<select name='typeid' style='width:300'>\r\n";
       if($cid=="0") echo "<option value='0' selected>���������ĵ�...</option>\r\n";
       echo $typeOptions;
       echo "</select>";
			 $tl->Close();
		?>
   </td>
  </tr>
  <tr>
    <td height="20" valign="top" bgcolor="#FFFFFF">��ʼID��</td>
    <td height="20" valign="top" bgcolor="#FFFFFF"><input name="startid" type="text" id="startid" size="10">
      ���ջ�0��ʾ��ͷ��ʼ��</td>
  </tr>
  <tr> 
    <td height="20" valign="top" bgcolor="#FFFFFF">����ID��</td>
    <td height="20" valign="top" bgcolor="#FFFFFF"><input name="endid" type="text" id="endid" size="10">
      ���ջ�0��ʾֱ������ID�� </td>
  </tr>
    <tr> 
      <td height="20" bgcolor="#FFFFFF">ÿҳ���ɣ�</td>
      <td height="20" bgcolor="#FFFFFF"> <input name="pagesize" type="text" id="pagesize" value="20" size="8">
        ���ļ�</td>
    </tr>
    <tr> 
      <td height="20" colspan="2" bgcolor="#FAFAF1" align="center">
      	<input name="b112" type="button" class="np2" value="��ʼ����HTML" onClick="document.form1.submit();" style="width:100">
        &nbsp;
        <input type="button" name="b113" value="�鿴�����ĵ�" class="np2" onClick="document.form2.submit();" style="width:100"> 
      </td>
    </tr>
  </form>
  <tr bgcolor="#E6F3CD"> 
    <td height="20" colspan="2"> <table width="100%">
        <tr> 
          <td width="74%">����״̬�� </td>
          <td width="26%" align="right">
          	<script language='javascript'>
            	function ResizeDiv(obj,ty)
            	{
            		if(ty=="+") document.all[obj].style.pixelHeight += 50;
            		else if(document.all[obj].style.pixelHeight>80) document.all[obj].style.pixelHeight = document.all[obj].style.pixelHeight - 50;
            	}
            	</script>
            [<a href='#' onClick="ResizeDiv('mdv','+');">����</a>] [<a href='#' onClick="ResizeDiv('mdv','-');">��С</a>] 
          </td>
        </tr>
      </table></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td colspan="2" id="mtd"> <div id='mdv' style='width:100%;height:100;'> 
        <iframe name="stafrm" frameborder="0" id="stafrm" width="100%" height="100%"></iframe>
      </div>
      <script language="JavaScript">
	  document.all.mdv.style.pixelHeight = screen.height - 360;
	  </script> </td>
  </tr>
</table>
</body>
</html>