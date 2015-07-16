<script type="text/javascript">
function ajaxSubmit()
{
	
	var name=document.form[0].username.value;
	var toname=document.form[0].to.value;
	var message=document.form[0].message.value;
	//alert(name);
	var xmlhttp;
	try{
		xmlhttp=new XMLHttpRequest();
		
	}catch(e){
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		
	
	}
	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4){
			if(xmlhttp.states==200){
				alert("success");
			}
			esle
				alert("error");
			
		}
	}
	xmlhttp.open("post","sendmessage.php","true");
	xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencode');
	xmlhttp.send("$username="+name);
	
}


</script>
<?PHP
//用于发送信息
//sendmessage.php
include "config.inc.php";
include "header.inc.php";



/*1. $_REQUEST

php中$_REQUEST可以获取以POST方法和GET方法提交的数据，但是速度比较慢

2. $_GET

用来获取由浏览器通过GET方法提交的数据。GET方法他是通过把参数数据加在提交表单的action属性所指的URL中，值和表单内每个字段一一对应，然后在URL中可以看到，但是有如下缺点：

1. 安全性不好，在URL中可以看得到

2. 传送数据量较小，不能大于2KB。

3. $_POST

用来获取由浏览器通过POST方法提交的数据。POST方法他是通过HTTP POST机制，将表单的各个字段放置在HTTP HEADER内一起传送到action属性所指的URL地址中，用户看不到这个过程。他提交的大小一般来说不受限制，但是具体根据服务器的不同，还是略有不同。相对于_GET方式安全性略高

4. $_REQUEST、$_POST、$_GET 的区别和联系

$_REQUEST["参数"]具用$_POST["参数"] $_GET["参数"]的功能,但是$_REQUEST["参数"]比较慢。通过post和get方法提交的所有数据都可以通过$_REQUEST数组["参数"]获得
*/

$action=isset($_REQUEST['action'])?$_REQUEST['action']:'public';
//echo $action;
//私聊对象（如果是私聊的话）
$to=isset($_REQUEST['to'])?$_REQUEST['to']:'';
//echo $to;
//echo $_SESSION['username'];
//发言者
$username=isset($_SESSION['username'])?$_SESSION['username']:'';
//echo $username;
//发言信息
$message=isset($_POST['message'])?$_POST['message']:'';
	//echo $message;
if(!empty($message))
{
//检查用户是否存在

//echo  dddd;
	$mysql="select * from chat_users where username='$username'";
	$result=mysql_query($mysql);
	$num=mysql_num_rows($result);
	if($num>0)
	{//该用户名存在
		//第一部是更新该用户在在用户列表里面的时间
		$mysql="update chat_users set time=Now() where username='$username'";
		mysql_query($mysql);
		//第二步要判断是否是私聊，并且插入到相应的数据库中；
		if($action=='private')
		{//是私聊
			//echo "wo我在私聊";
			//echo $username;
			//echo $to;
			//echo Now();
			$mysql="insert into private_chatboard(time,fromname,toname,message) values (Now(),'$username','$to','$message')";
			if(mysql_query($mysql))
			{
				//echo "插入私聊nu成功";
			}
		}
		else
		{//公聊
			$mysql="insert into chatboard(time,username,message) values (Now(),'$username','$message')";
		
			mysql_query($mysql);

		
		
		}
	
	
	}
	

}
?>

<?PHP
if($action=='private')
{
//私聊界面
?>
<form action="sendmessage.php?to=<?PHP echo $to;?>&action='private',chatboard.php" method="post" name="submitchat" >
<input type="hidden" size='25' name='username' value="<?PHP echo htmlspecialchars($username); ?>" >
<input type="hidden" size='25' name='to' value="<?PHP echo htmlspecialchars($to); ?>" >
<input type='hidden' size='25' name="action" value="private">
<table align="center">
<tr>
<td>消息：</td>
<td><input type="text" size="100" name="message" ></td>
<td><input type="submit" name="submit" value="发送" class="button"></td>
</tr>
</table>
</form>
<?PHP
}
else
{//公聊
?>

<form action="sendmessage.php"  method="post" name="form" >
<input type="hidden" size='25' name='username' value="<?PHP echo $_SESSION['username']; ?>" >

<input type='hidden' size='25' name="action" value="public">
<table align="center">
<tr>
<td>消息：</td>
<td><input type="text" size="50" name="message" ></td>
<td><input type="submit" name="submit"  value="发送" class="button"></td>
</tr>
</table>
</form>

<?PHP
}
?>