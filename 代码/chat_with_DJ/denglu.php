<?PHP
include "config.inc.php";
include "header.inc.php";
?>
<html>
<!--s设计表单登录-->

<form action="main.php" method="post" name="登录">
<table>
<tr>
<td colspan="2">欢迎进入铖哥会所</td><br>
</tr>
<tr>
<td>请填写以下登录信息</td>
</tr>
<tr>
<td>用户名：</td><td><input name="username" id="user" type="text" size="20" value=""></td>
</tr>
<tr>
<td>密码：</td><td><input name="password" id="password" type="password" size="20" value=""></td>

</tr>

<td><input type="submit" name ="submit" value="登录" class="buttons"></td>
</tr>
<tr>
<td colspan='2'><a href="zhuce.php">注册新用户</a></td>
</tr>
<tr>
<td height="20" class="cell" colspan="2"><font size="4" ><b> 铖哥网络会所欢迎您 </b></font></td>
</tr>
</table>
</form>

</html>
