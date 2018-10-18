<?php
	if($_COOKIE["user"]!="frank") {
		echo "<script>alert('请返回登录');window.location.href='log_in.php'</script>";
	}
	else {
		require_once('../connect.php');
			$id = $_POST["art_id"];
			$url = $_POST["img_url"];
			$title = $_POST['article_title'];
			$author = $_POST['article_author'];
			$disc = $_POST['article_disc'];
			$content = $_POST['article_content'];
			// 用来图片的名字
			$num ="";
			$num = htmlspecialchars(date("Ymdhisa"));
			
			if(move_uploaded_file($_FILES["article_img"]["tmp_name"],"../upload/".$num.$_FILES["article_img"]["name"])) {
				unlink("../".$url);
				$url = htmlspecialchars("upload/".$num.$_FILES["article_img"]["name"]);
			}
			$sql = "update new_article set title='$title',author='$author',disc='$disc',content='$content',url='$url' where id = $id";
		
			if(mysql_query($sql)){
				echo "<script>alert('修改成功');window.location.href='article_manage.php'</script>";
			}
			else {
				echo "<script>alert('修改失败');window.location.href='article_manage.php'</script>";
			}
	}
	
	
?>