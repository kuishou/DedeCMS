<?
require(dirname(__FILE__)."/config.php");
CheckPurview('temp_Other');
require_once(dirname(__FILE__)."/../include/inc_typelink.php");
if(empty($dopost)) $dopost = "";
//////////////////////////////////////////
if($dopost=="save")
{
	$tagname = trim($tagname);
	$dsql = new DedeSql(false);
	$row = $dsql->GetOne("Select typeid From #@__mytag where typeid='$typeid' And tagname like '$tagname'");
	if(is_array($row)){
		$dsql->Close();
		ShowMsg("����ͬ��Ŀ���Ѿ�����ͬ���ı�ǣ�","-1");
		exit();
	}
	$starttime = GetMkTime($starttime);
	$endtime = GetMkTime($endtime);
	$inQuery = "
	 Insert Into #@__mytag(typeid,tagname,timeset,starttime,endtime,normbody,expbody)
	 Values('$typeid','$tagname','$timeset','$starttime','$endtime','$normbody','$expbody');
	";
	$dsql->SetQuery($inQuery);
	$dsql->ExecuteNoneQuery();
	$dsql->Close();
	ShowMsg("�ɹ�����һ���Զ����ǣ�","mytag_main.php");
	exit();
}
$startDay = mytime();
$endDay = AddDay($startDay,30);
$startDay = GetDateTimeMk($startDay);
$endDay = GetDateTimeMk($endDay);
?>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=gb2312'>
<title>�����Զ�����</title>
<link href='base.css' rel='stylesheet' type='text/css'>
<script language="javascript">
function checkSubmit()
{
	if(document.form1.tagname.value=="")
	{
		alert("������Ʋ���Ϊ�գ�");
		document.form1.tagname.focus();
		return false;
	}
}
</script>
</head>
<body background='img/allbg.gif' leftmargin='8' topmargin='8'>
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#666666">
<tr>
  <td height="19" background="img/tbg.gif"><b><a href="mytag_main.php"><u>�Զ����ǹ���</u></a></b>&gt;&gt;�����±��</td>
</tr>
<tr>
    <td height="200" bgcolor="#FFFFFF" valign="top">
	<table width="100%" border="0" cellspacing="4" cellpadding="4">
        <form action="mytag_add.php" method="post" enctype="multipart/form-data" name="form1" onSubmit="return checkSubmit()">
          <input type='hidden' name='dopost' value='save'>
          <tr> 
            <td height="25" colspan="3">�Զ����ǵĵ��÷�����<br/>
              {dede:mytag name='�������' ismake='�Ƿ񺬰����루yes �� no��' typeid='��ĿID'/} 
              <br/>
              1��name ������ƣ������Ǳ�������ԣ����� 2��3�ǿ�ѡ���ԣ�<br/>
              2��ismake Ĭ���� no ��ʾ�趨�Ĵ�HTML���룬 yes ��ʾ������ǵĴ��룻<br/>
              3��typeid ��ʾ������Ŀ��ID��Ĭ��Ϊ 0 ����ʾ������Ŀͨ�õ���ʾ���ݣ����б����ĵ�ģ���У�typeidĬ��������б����ĵ���������Ŀ�ɣġ�</td>
          </tr>
          <tr> 
            <td width="15%" height="25" align="center">������Ŀ��</td>
            <td colspan="2"> 
              <?
           	$tl = new TypeLink(0);
           	$typeOptions = $tl->GetOptionArray(0,0,0);
            echo "<select name='typeid' style='width:300'>\r\n";
            echo "<option value='0' selected>��ʾ��û�м̳б���ǵ�������Ŀ</option>\r\n";
            echo $typeOptions;
            echo "</select>";
			$tl->Close();
			?>
            </td>
          </tr>
          <tr> 
            <td height="25" align="center">������ƣ�</td>
            <td colspan="2"><input name="tagname" type="text" id="tagname"></td>
          </tr>
          <tr> 
            <td height="25" align="center">ʱ�����ƣ�</td>
            <td colspan="2"><input name="timeset" type="radio" value="0" checked>
              �������� 
              <input type="radio" name="timeset" value="1">
              ������ʱ������Ч</td>
          </tr>
          <tr> 
            <td height="25" align="center">��ʼʱ�䣺</td>
            <td colspan="2"><input name="starttime" type="text" id="starttime" value="<?=$startDay?>"></td>
          </tr>
          <tr> 
            <td height="25" align="center">����ʱ�䣺</td>
            <td colspan="2"><input name="endtime" type="text" id="endtime" value="<?=$endDay?>"></td>
          </tr>
          <tr> 
            <td height="80" align="center">������ʾ���ݣ�</td>
            <td width="76%"> <textarea name="normbody" id="normbody" style="width:80%;height:100"></textarea>
            </td>
            <td width="9%">&nbsp;</td>
          </tr>
          <tr> 
            <td height="80" align="center">������ʾ���ݣ�</td>
            <td> <textarea name="expbody" id="expbody" style="width:80%;height:100"></textarea>
            </td>
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td height="53" align="center">&nbsp;</td>
            <td colspan="2"><input name="imageField" type="image" src="img/button_ok.gif" width="60" height="22" border="0"></td>
          </tr>
        </form>
      </table>
	 </td>
</tr>
</table>
</body>
</html> 
"