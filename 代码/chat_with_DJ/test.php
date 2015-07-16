<?PHP
include "conndb.php";
//mysql_query("create database php_chat");
mysql_query("use php_chat");
/*$mysql="create table chat_users
(
	id int(10) not null auto_increment,
	time datetime not null default '0000-00-00',
	username varchar(40) not null,
	ip varchar(50) not null,
	password varchar(40) not null,
	isadmin tinyint(1) not null default 0,
	primary key (id),
	unique key (username)

)";*/
$mysql="create table private_chatboard
(
	id int(10) not null auto_increment,
	time datetime not null default '0000-00-00',
	fromname varchar(40) not null,
	toname varchar(40) not null,
	delfrom int(10) not null default 0,
	delto int(10) not null default 0,
	message text not null,
	primary key (id)
	

)";




mysql_query($mysql)or die("建表失败".mysql_error());


?>