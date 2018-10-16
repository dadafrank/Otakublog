<?php
	require('config.php');
	//链接数据库
	$connect = mysql_connect(HOST,USERNAME,PASSWORD);
	if(!$connect){
		echo mysql_error();
	}
	
	//选择数据库
	if(mysql_select_db('qdm161153417_db')){
		echo mysql_error();
	}
	
	//字符集
	if(mysql_query('set names utf8')){
		echo mysql_error();
	}
	
?>