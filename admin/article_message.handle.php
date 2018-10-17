<?php
	require_once('../connect.php');
	$art_id=$_GET["art_id"];
	$id=$_GET["id"];
	$deletesql="delete from new_art_mess where id=$id";
	if(mysql_query($deletesql)){
		echo "<script>alert('删除评论成功');window.location.href='article_message.php?id=$art_id'</script>";
	}
	else {
		echo "<script>alert('删除评论失败');window.location.href='article_message.php?id=$art_id'</script>";
	}
?>