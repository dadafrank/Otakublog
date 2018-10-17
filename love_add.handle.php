<?php
	require_once('connect.php');
	$num = $_GET[love_num];
	$num=$num+1;
	
	$love_sql = "update new_other set love= $num where id = 1";
	if(mysql_query($love_sql)) {
		echo $num;
	}
?>