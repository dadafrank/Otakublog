<?php
	$user = $_POST[user];
	$password = $_POST[password];
	if($user == "frank"&&$password =="1314520ccc"){
		setcookie("user",$user);
		echo "<script>window.location.href='article_manage.php'</script>";
	}
	else {
		echo "<script>alert('账号或者密码错误');window.location.href='article_manage.php'</script>";
	}
?>