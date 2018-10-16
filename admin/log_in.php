<?php
	require_once('../connect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>大大Frank</title>
		<link rel="icon" href="../img/logo_fox.png" type="image/x-icon"/>
		<link rel="stylesheet" type="text/css" href="../css/reset.css" />
		<link rel="stylesheet" type="text/css" href="../css/logn_in.css" />
		<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<div class="logn">
			<form action="#" method="post" class="form">
				<input type="text" placeholder="用户名" class="logn_name" />
				<br />
				<input type="password" placeholder="密码" class="logn_pass" />
				<br />
				<input type="submit" value="　登录" class="logn_sub" />
			</form>
		</div>
	</body>
</html>