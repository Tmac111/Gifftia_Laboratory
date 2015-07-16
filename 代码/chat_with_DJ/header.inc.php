<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>chat_with_DJ</title>

<style>
td,p,font,input{font-size 12px;}
body{background-color:#ffffff;font-color=#ffffff;}
.main_table{background-position:center top;font-color:#ffffff;background-color:#339966;border:0px solid color #0000ff;}
.cell{ background-position:center top;font-color:#ffffff; border: 1px solid #0000ff;vertical-align:top;}
.current_listing{ border :thin solid #999999;}
.row_title{font_weight:bold;color:#ffffff; background-color:#999999;text-align:left;vertical-align:top;}
/**/
.row1{color:#000000; background-color:#eeeeee; text-align:left; vertical-align:top;}
.row2{color:#000000; background-color:#ffffff; text-align:left; vertical-align:top;}

.message{font-size:15px;width:95%; padding:3px;color:#FF0000; text-align:left; background-color:#cecece; boder:1px solid #666666;}


//超链接
A:link,A:active{text-decoration:none;}
A:visited {text-decoration:none;}
A:hover{text-decoration:underline;}

</style>

</head>
<script language="javascript">
var popwin="";
//弹出新窗口

function openwin(URL,str_width,str_height)
{
	if(popwin="")
		popwin.close();//不了然
	left_str=(screen.width-str_width)/2;
	top_str=(screen.height-str_height)/2;
	window_parameters="toolbar=no,menubar=no,scrollbars=yes,statusbar=yes"+",height="+str_height+",width="+str_width+",left"+left_str+",top="+top_str+"";//最后为何加个空？？？？
	isDay=new Date();
	isID=isDay.getTime();
	popwin=window.open(URL,isID,window_parameters);
	
}

//确认对话框
function confirm_submit(text)
{
	var agree=confirm(text);
	return agree;
}

</script>

</html>
