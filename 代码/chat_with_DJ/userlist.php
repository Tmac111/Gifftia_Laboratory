<?PHP
//显示在线用户
//userlist.php
include "config.inc.php";
include "header.inc.php";
?>
<script language="javascript">

    setTimeout("countdown()",2000);
    function countdown()
    {
        window.location.reload(true);
    }
function openotherwin(id)
{
	alert ("<?PHP
		$id=id;
		echo $id;
	/*echo "进入";
	$mysql="select * from private_chatboard where id=id";
	$result=mysql_query($mysql);
	while($rows=mysql_fetch_assoc($result))
	{
		$rows['delto']=1;
	}*/
	?>")

}




 </script>
 <font size="2" face="宋体">
 <b>用户列表</b><br>
 <?PHP
 //当前用户
 $username=$_SESSION['username']; 
 //查询时间
 $last_time=strtotime("-$session_time seconds");
// echo $last_time;
//将服务器时区设为当地时间
date_default_timezone_set("Asia/Shanghai");
 $nowtime=date('Y-m-d H:i;s');
 //echo $nowtime;
 $check_time=date('Y-m-d H:i:s',$last_time);
 //获取用户列表
// echo $check_time;
 $mysql="select * from chat_users where time>='$check_time' order by username";
 $result=mysql_query($mysql);
 while($rows=mysql_fetch_assoc($result))
 {
	
	$current_id=$rows['id'];
	$current_name=$rows['username'];
	$current_time=$rows['time'];
	//对当前用户，直接显示
	if($current_name==$_SESSION['username'])
		echo $current_name."<br>";
	else{
		//不是当前用户，显示链接，用于私聊
		//这两个函数的功能都是转换字符为HTML字符编码，特别是url和代码字符串。防止字符标记被浏览器执行。使用中文时没什么区别,
		//但htmlentities会格式化中文字符使得中文输入是乱码htmlentities转换所有的html标记,htmlspecialchars只格式化& ' " < 和 > 这几个特殊符号
		//urlencode函数便于将字符串编码并将其用于 URL 的请求部分，同时它还便于将变量传递给下一页。
		$url_username=$current_name;//
		
 ?>	
	 <a href="#" onclick="openwin('private.php?to=<?PHP echo $url_username ?>',1000,500);openotherwin(<?PHP echo $current_id?>)"><?PHP echo $current_name?></a><br>
<?PHP
	}
 }
?> 
 

 
 
 
 
 
 
 
 
 
 