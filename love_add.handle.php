<?php
	require_once('connect.php');
	$one = 0;
	$num = $_GET[num];
	$one = $num + 1;
	
	$love_sql = "update new_other set love= $one where id = 1";
	if(mysql_query($love_sql)) {
		echo $one;
	}
	else  {
		echo "出错了";
	}
?>