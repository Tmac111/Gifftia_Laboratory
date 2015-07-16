<?PHP
//用于私聊的窗口
//private.php
include "config.inc.php";
include "header.inc.php";
//私聊对象。from userlist.php;
$to=$_GET['to'];
//echo $to;
$mysql="select * from chat_users where username='$to'";
$result=mysql_query($mysql);
$num=mysql_num_rows($result);
if($num>0)
{//私聊对象存在
	//echo "私聊对象在呢";
	$rows=mysql_fetch_assoc($result);
	$current_name=$rows['username'];
	$current_id=$rows['id'];
	$current_time=$rows['time'];
}
else
{
	exit_message("私聊对象不存在你聊个啥嘛","");

}

?>
<table width="100%" height="100%" class="main_table" cellspacing="4">
<tr>
<td class="cell" colspan="3"><?PHP echo $_SESSION['username'] ?>和<?PHP echo $to ?>私聊
<!--嵌入聊天页面-->
<iframe src="chatboard.php?action=private&to=<?PHP echo $to?>" width="100%" height="90%" border="0" frameborder="0" 
name="msg" style="border 0px solid black" scrolling="yes">

</iframe>

</td>

</tr>
<tr >
<td height="60" width="100%" class="cell">
<!--嵌入发言页面-->
<iframe src="sendmessage.php?action=private&to=<?PHP echo $to?>" width="100%" height="90%" border="0" frameborder="0" 
name="msg" style="border 0px solid black" scrolling="no">

</iframe>
</td>
</tr>


</table>