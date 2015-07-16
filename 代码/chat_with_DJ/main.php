<?PHP
//聊天主页面

include "config.inc.php";
include "header.inc.php";
?>

<?PHP
$username=$_POST['username'];
$password=$_POST['password'];
$mysql="select * from chat_users where username='$username'";
$result=mysql_query($mysql);
   
$num=mysql_num_rows($result);
if($num==0)
	exit_message("不存在此用户名，请注册后再登录","zhuce.php");
else
{
	if($rows=mysql_fetch_assoc($result))
		{
			$true_password=$rows['password'];
		}
	if($true_password!=$password)
	{
		exit_message("输入密码错误，请重新输入","index.html");
	}
	else
	{
		$ip=get_ip();
		//更新用户的ip,登录时间
		$mysql="update chat_users set time=Now(),ip='$ip' where username='$username'";
		mysql_query($mysql);
		$_SESSION['username']=$username;
		
	
	}
}



?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
</head>
<body>
<table width="100%" height="100%" class="main_table" cellpadding="4" cellspacing="3">
<tr>
<td height="20" class="cell" colspan="2"><font size="4" ><b> 欢迎进入聊天室　 </b></font></td>
</tr>
<tr>
<td class="cell">
<!--用帧来嵌入聊天室发言页面-->
<iframe src="chatboard.php?action=public" width="100%" height="100%" border="0" name="chatboard" frameborder="0" style="boder:0px solid black ">

</iframe>
 </td>
 <td class="cell" width="200">
<!--用帧来嵌入用户显示页面-->
<iframe src="userlist.php" width="100%" height="70%" border="0" name="userlist" frameborder="0" style="boder:0px solid black ">

</iframe>
<!--用帧来嵌入用户功能显示页面-->
<iframe src="action.php" width="100%" height="30%" border="0" name="action" frameborder="0" style="boder:0px solid black ">

</iframe>
 </td>
</tr>
<tr>
<td height="40"  class="cell" colspan="2" valign="middle">
<!--嵌入发言功能的页面-->
<iframe src="sendmessage.php" width="100%"> 
</iframe>
</td>
</tr>
</table>
</body>

</html>