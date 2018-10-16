<?php
	require_once('connect.php');
	$name=htmlspecialchars($_POST[mess_author]);
	$email=htmlspecialchars($_POST[mess_email]);
	$message=htmlspecialchars($_POST[mess_content]);
	$time=date("Y-m-d h:i:sa");
	if($name==""||$message==""){
		echo "<script>alert('评论或者姓名不能为空');window.location.href='blog_mess.php'</script>";
	}
	else if(!preg_match("/([a-zA-Z0-9])+/",$name)){
		echo "<script>alert('输入不合法');window.location.href='blog_mess.php'</script>";
	}
	else{
		$insertsql="insert into new_message(author,email,content,time)
		values('$name','$email','$message','$time')";
		if(mysql_query($insertsql)){
			echo "<script>alert('留言成功');window.location.href='blog_mess.php'</script>";
		}
		else {
			echo mysql_error();
	//		echo "<script>alert('评论失败');window.location.href='article.show.php?id=$id'</script>";
		}
	}
	
?>