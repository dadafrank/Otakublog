<?php
	if($_COOKIE["user"]!="frank") {
		echo "<script>alert('请返回登录');window.location.href='log_in.php'</script>";
	}
	else {
		require_once('../connect.php');
		$id=$_GET["id"];
		$deletesql="delete from new_message where id=$id";
		if(mysql_query($deletesql)){
			echo "<script>alert('删除留言成功');window.location.href='message.php'</script>";
		}
		else {
			echo "<script>alert('删除留言失败');window.location.href='message.php'</script>";
		}
	}
	
?>