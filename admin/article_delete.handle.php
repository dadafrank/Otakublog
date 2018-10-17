<?php
	require_once('../connect.php');
	$id=$_GET["id"];
	$deletesql="delete from new_article where id=$id";
	if(mysql_query($deletesql)){
		echo "<script>alert('删除文章成功');window.location.href='article_manage.php'</script>";
	}
	else {
		echo "<script>alert('删除文章失败');window.location.href='article_manage.php'</script>";
	}
?>