<?PHP
include "config.inc.php";
include "header.inc.php";
$name= isset($_GET['name'])?$_GET['name']:'11';
//echo($name);
?>
<script type="text/javascript">
function ajaxSubmit()
{
	//alert("0");
	
	var name=document.form.username.value;
	//var toname=document.form[0].to.value;
	var message=document.form.message.value;
	//alert(name);
	//alert(message);
	var xmlhttp;
	try{
		xmlhttp=new XMLHttpRequest();
		
	}catch(e){
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		
	
	}
	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4){
				//alert(xmlhttp.status);
				if(xmlhttp.status==200)
				{
					//alert("aadf");
					alert(xmlhttp.responseText);
				}
				else 
				{
					alert("页面不正常");
				}
		}
	}
	xmlhttp.open("post","testt.php",true);
	//xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencode");
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("name="+name+"&message="+message);
	
}


</script>


<html>
<>
<form method="post" value="dd" name="form" >
<input type="hidden" size='25' name='username' value="tmac" ?>" >

<input type='hidden' size='25' name="action" value="public">
<table align="center">
<tr>
<td>消息：</td>
<td><input type="text" size="50" name="message" ></td>
<td><input type="button" name="submit" onclick="ajaxSubmit()" value="发送" class="button"></td>
</tr>
</table>
</form>

</html>