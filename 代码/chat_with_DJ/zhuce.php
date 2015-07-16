<?PHP
include "config.inc.php";
include "header.inc.php";
//echo "ddf";
if(isset($_POST['username']))

{

	if(!$_POST['username']||!$_POST['password']||!$_POST['password2'])
		exit_message("所有注册信息必须填写完整","");
	else
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		$password2=$_POST['password2'];
		$mysql="select * from chat_users where username='$username'";
		$result=mysql_query($mysql);
		$num=mysql_num_rows($result);
		if($num==0)
		{
			//数据库中无此用户名，可以注册
			if($password==$password2)
			{	
				$ip=get_ip();
				$mysql="insert into chat_users (username,ip,password) values('$username','$ip','$password')";
				$result=mysql_query($mysql);
				$affect_num=mysql_affected_rows();
				if($affect_num>0)
				{
					exit_message("注册成功,请登录","index.html");
				}
				else
				{
					exit_message("注册失败","zhuce.php");
					
				}
			}
			else
				exit_message("两次输入密码不相同，请重新输入密码","");
				
		}
		else//用户已经存在
			exit_message("已经存在该用户名，请重新输入","zhuce.php");
	}

}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <meta name="keywords" content="Flat Dark Web Login Form Responsive Templates, Iphone Widget Template, Smartphone login forms,Login form, Widget Template, Responsive Templates, a Ipad 404 Templates, Flat Responsive Templates" />

    <link href="css/style.css" rel='stylesheet' type='text/css' />

    <script type="text/javascript" src="js/jquery.min.js"></script>

</head>
<body>

</script>

<h1>注册表单</h1>
<div class="login-form">

<div class="head-info">

</div>
<div class="clear"> </div>
<div class="avtar"><img src="images/avtar.png" /></div>
<form action="zhuce.php" method="post">
    <input type="text" class="text" name="username" value="username" onFocus="this.value = '';"onBlur="if (this.value == '') {this.value = 'Username';}" >
    <div class="key"><input type="password" name="password" value="password" onFocus="this.value = '';"onBlur="if (this.value == '') {this.value = 'Password';}"></div>
    <div class="key"><input type="password" name="password2" value="password" onFocus="this.value = '';"onBlur="if (this.value == '') {this.value = 'Password';}"></div>
    <div class="signin"><input type="submit" value="Signup" ></div>
</form>

</div>

</body>
</html>