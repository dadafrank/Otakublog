<?php
	require_once('connect.php');
	
	$love_sql = "select love from new_other";
	$love_query = mysql_query($love_sql);
	while($love_row = mysql_fetch_assoc($love_query)) {
		$love_data[] = $love_row;
	}
	
	$one = 0;
	$one = $love_data[0]['love'] + 1;
	
	$love_sql = "update new_other set love= $one where id = 1";
	if(mysql_query($love_sql)) {
		echo $one;
	}
	else  {
		echo "出错了";
	}
?>