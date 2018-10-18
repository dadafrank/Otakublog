<?php
	if($_COOKIE["user"]!="frank") {
		echo "<script>alert('请返回登录');window.location.href='log_in.php'</script>";
	}
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