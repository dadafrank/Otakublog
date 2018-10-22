<?php
	require_once('connect.php');
	$name=htmlspecialchars($_POST[mess_author]);
	$name=str_replace("'","\'",$name);
	$email=htmlspecialchars($_POST[mess_email]);
	$email=str_replace("'","\'",$email);
	$message=htmlspecialchars($_POST[mess_content]);
	$message=str_replace("'","\'",$message);
	$time=date("Y-m-d h:i:sa");
	if($name==""||$message==""){
		echo "<script>alert('评论或者姓名不能为空');window.location.href='article.php?id=$_POST[id]'</script>";
	}
	else{
		$insertsql="insert into new_art_mess(art_id,author,email,content,time)
		values($_POST[art_id],'$name','$email','$message','$time')";
		if(mysql_query($insertsql)){
			echo "<script>alert('评论成功');window.location.href='article.php?id=$_POST[art_id]'</script>";
		}
		else {
			echo mysql_error();
	//		echo "<script>alert('评论失败');window.location.href='article.php?id=$id'</script>";
		}
	}
	
?>