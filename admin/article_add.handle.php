<?php
	if($_COOKIE["user"]!="frank") {
		echo "<script>alert('请返回登录');window.location.href='log_in.php'</script>";
	}
	else {
		require_once('../connect.php');
		$title=$_POST[article_title];
		$author = $_POST[article_author];
		$disc= $_POST[article_disc];
		$content = htmlspecialchars($_POST[article_content]);
		$time=date("Y-m-d h:i:sa");
		$num ="";
		$num = htmlspecialchars(date("Ymdhisa"));
		$url = htmlspecialchars("upload/".$num.$_FILES["article_img"]["name"]);
		if(move_uploaded_file($_FILES["article_img"]["tmp_name"],"../upload/".$num.$_FILES["article_img"]["name"])) {
			$insertsql="insert into new_article(title,author,disc,content,time,url)
				values('$title','$author','$disc','$content','$time','$url')";
			
				if(mysql_query($insertsql)){
					echo "<script>alert('发布成功');window.location.href='article_add.php'</script>";
				}
				else {
					echo mysql_error();
				}
		}
		else {
			echo "<script>alert('图片上传失败');window.location.href='article_add.php';</script>";
		}
	}
	
?>