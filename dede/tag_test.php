<?
require_once(dirname(__FILE__)."/config.php");
CheckPurview('temp_Other');
require_once(dirname(__FILE__)."/../include/inc_typelink.php");
$dsql = new DedeSql(false);
$row  = $dsql->GetOne("Select * From #@__homepageset");
$dsql->Close();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>��ҳ������</title>
<link href="base.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" media="all" href="../include/calendar/calendar-win2k-1.css" title="win2k-1" />
<script type="text/javascript" src="../include/calendar/calendar.js"></script>
<script type="text/javascript" src="../include/calendar/calendar-cn.js"></script>
<script language="javascript">
function SelectTemplets(fname)
{
   var posLeft = window.event.clientY-200;
   var posTop = window.event.clientX-300;
   window.open("../include/select_templets.php?f="+fname, "poptempWin", "scrollbars=yes,resizable=yes,statebar=no,width=600,height=400,left="+posLeft+", top="+posTop);
}
</script>
</head>
<body background='img/allbg.gif' leftmargin='8' topmargin='8'>
<table width="98%" border="0" cellpadding="3" cellspacing="1" bgcolor="#666666" align="center">
  <form name="form1" action="tag_test_action.php" target="stafrm" method="post">
    <input type="hidden" name="dopost" value="make">
    <tr> 
      <td height="20" colspan="2" background='img/tbg.gif'> <table width="98%" border="0" cellpadding="0" cellspacing="0">
          <tr> 
            <td width="30%" height="18"><strong>ȫ�ֱ�ǲ��ԣ�</strong></td>
            <td width="70%" align="right">&nbsp;</td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td colspan="2" valign="top" bgcolor="#FFFFFF">
      	����ȫ�ֱ��ָ����Ӧ������վ��ҳ������ҳ�桢Ƶ������ʹ�õĵ�����ģ���ǣ����б�������ģ���У�һ��ֻ��������channel��arclist��ǣ�hotart��coolart��imglist�ȶ�����������������ı�ǣ������ǻ��������޶�Ϊ���»��б����ڵ���Ŀ�������Ҫ���Եı�������б���������ʹ�ã���ָ��������������Ŀ�ɣģ���<br/>
        ��������ǵľ��庬�����;������<a href="help_templet.php" target="_blank"><u>ģ���ǲο�</u></a>һ�²��ġ�
      </td>
    </tr>
    <tr> 
      <td colspan="2" valign="top" bgcolor="#FFFFFF">����Ҫ���Եľֲ����룺 </td>
    </tr>
    <tr> 
      <td height="62" colspan="2" bgcolor="#FFFFFF">
	  <textarea name="partcode" id="partcode" style="width:100%;height:120"></textarea>
	  </td>
    </tr>
    <tr> 
      <td width="103" height="20" valign="top" bgcolor="#FFFFFF">����������</td>
      <td width="865" height="20" valign="top" bgcolor="#FFFFFF">&nbsp;
      	<?
       if(empty($cid)) $cid="0";
       $tl = new TypeLink($cid);
       $typeOptions = $tl->GetOptionArray($cid,$cuserLogin->getUserChannel(),0);
       echo "<select name='typeid' style='width:300'>\r\n";
       if($cid=="0") echo "<option value='0' selected>��ʹ�û���ID...</option>\r\n";
       echo $typeOptions;
       echo "</select>";
			 $tl->Close();
		  ?>
      </td>
    </tr>
    <tr> 
      <td height="31" colspan="2" bgcolor="#FAFAF1" align="center">
      	<input type="submit" name="Submit" value="�ύ����"> 
      </td>
    </tr>
  </form>
  <tr bgcolor="#E6F3CD"> 
    <td height="20" colspan="2"><table width="100%">
        <tr> 
          <td width="74%">����״̬�� </td>
          <td width="26%" align="right"> <script language='javascript'>
            	function ResizeDiv(obj,ty)
            	{
            		if(ty=="+") document.all[obj].style.pixelHeight += 50;
            		else if(document.all[obj].style.pixelHeight>80) document.all[obj].style.pixelHeight = document.all[obj].style.pixelHeight + 50;
            	}
            	</script>
            [<a href='#' onClick="ResizeDiv('mdv','+');">����</a>] [<a href='#' onClick="ResizeDiv('mdv','-');">��С</a>] 
          </td>
        </tr>
      </table></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td colspan="2" id="mtd">
    	<div id='mdv' style='width:100%;height:300;'> 
        <iframe name="stafrm" frameborder="0" id="stafrm" width="100%" height="100%"></iframe>
      </div>
    </td>
  </tr>
</table>
</body>
</html>