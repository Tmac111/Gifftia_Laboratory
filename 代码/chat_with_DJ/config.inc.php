<?PHP
 //x系统参数设置
 //链接数据库定义
  
error_reporting(E_ALL ^ E_DEPRECATED);
 define('DB_USER',"root");
 define('DB_PASSWORD',"kangxinlong2011");
 define('DB_HOST',"localhost");
 define('DB_NAME',"php_chat");
//聊天室发言内容显示行数
$chat_rows="40";
//yon用户超时允许的最大分钟
$session_time="100";
//页面刷新时间(秒)
$refresh_time="5";
//是否使用表情控制
$use_smilies=true;
//biao表情数组


//颜色
$bgrow=1;


//gong公共函数

//qu取得用户的IP地址
function get_ip()
{
	if(getenv("HTTP_CLIENT_IP"))//客户端iP
		$ip=getenv("HTTP_CLIENT_IP");
	elseif(getenv("HTTP_X_FORWARDED_FOR"))//网关ip
		$ip=getenv("HTTP_X_FORWARDED_FOR");
	elseif(getenv("REMOTE_ADDR"))//服务端ip
		$ip=getenv("REMOTE_ADDR");
	else
		$ip=$_SERVER['REMOTE_ADDR'];
	return $ip;
}
//功能：显示错误信息和返回的链接地址。并且终止程序
//
function exit_message($message,$url)
{
	echo '<p class="message">';
	echo $message.'<br>';
	if($url)
		echo '<a href="'.$url.'">返回</a>';//注意这样写URL可能有问题滴？？》》》!!!!!
	else
		echo '<a href="#" onclick="window.history.go(-1);">返回</a>';
		
	echo '</p>';
	exit;
}

//初始化程序

//开启session
session_start();
//链接数据库

mysql_pconnect(DB_HOST,DB_USER,DB_PASSWORD)or die("链接数据库服务器失败");
//mysql_query("USE DB_NAME")or die ("链接数据库失败");
mysql_query("use php_chat")or die ("链接数据库失败");

?>