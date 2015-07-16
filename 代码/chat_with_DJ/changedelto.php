<?php
include "config.inc.php";
include "header.inc.php";
echo "fsf";
$id=$_POST['id'];

$mysql="UPDATE private_chatboard SET delto=1 WHERE id='$id' ";
//UPDATE tbl_name SET col_name1=value1, col_name2=value2, бн WHERE conditions
if(mysql_query($mysql))
	echo "ok";
?>
