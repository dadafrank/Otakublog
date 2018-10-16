<?php
	// require_once('connect.php');
	$num = $_GET[love_num];
// 	$love_sql = "select love from new_other";
// 	$love_query = mysql_query($love_sql);
// 	while($love_row = mysql_fetch_assoc($love_query)) {
// 		$love_data[] = $love_row;
// 	}
// 	$num = 0;
// 	$num = $love_data[0]['love']+1;
// 	$love_sql2 = "update new_other set love = '$num' where id = 1"; 
	echo "<script>alert('获得'".$num.")</script>";
?>