<?php
	require_once('../connect.php');
	$article_sql = "select * from new_article order by time desc ";
	$article_query = mysql_query($article_sql);
	if($article_query&&mysql_num_rows($article_query)){
		while($article_row = mysql_fetch_assoc($article_query)){
			$article_data[]=$article_row;
		}
	}
	
	$love_sql = "select love from new_other";
	$love_query = mysql_query($love_sql);
	while($love_row = mysql_fetch_assoc($love_query)) {
		$love_data[] = $love_row;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>大大Frank</title>
		<link rel="icon" href="../img/logo_fox.png" type="image/x-icon"/>
		<link rel="stylesheet" type="text/css"href="../css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="../css/admin.header.css"/>
		<link rel="stylesheet" type="text/css" href="../css/admin.section.css"/>
		<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<header class="header">
			<div class="header_position">
				<h2>FRANK</h2>
				<nav class="header_nav">
					<div class="icon" id="icon" onclick="iconchange()"></div>
					<ul class="nav_ul1" id="nav_ul1">
						<li class="nav_li1" style="border-radius: 2px;" onclick="changeurl(1)"><a href="article_manage.html" style="color: rgb(52,152,219);">&nbsp;文章管理&nbsp;</a></li>
						<li class="nav_li1 nav_li1_s" onclick="changeurl(2)"><a href="article_add.php">&nbsp;文章发布&nbsp;</a></li>
						<li class="nav_li1" onclick="changeurl(3)"><a href="article_mess.html">&nbsp;留言管理&nbsp;</a></li>
						<li class="nav_li1" onclick="changeurl(4)"><a href="../index.html">&nbsp;返回主页&nbsp;</a></li>
					</ul>
				</nav>
			</div>
		</header>
		<script>
			// 手机点击消失出现
			function iconchange() {
				var nav_ul1 =document.getElementById("nav_ul1")
				if(nav_ul1.style.display=="none"){
					nav_ul1.style.display="block";
				}
				else {
					nav_ul1.style.display="none";
				}
			}
			//跳转链接
			function changeurl(obj){
				var nav_ul2 =document.getElementById("nav_ul2")
				switch(obj){
					case 1:location.href="article_manage.html";break;//文章管理
					case 2:location.href="article_add.html";break;
					case 3:location.href="article_mess.html";break;//留言
					default :location.href="../index.html";//主页
				}
			}
		</script>
		
		<section class="article_section">
			<div class="article_manage">
				<?php
					if(empty($article_data)){
						echo "当前没有文章";
					}
					else{
						foreach($article_data as $value){
				?>
				<div class="article_inf">
					<p class="article_name">评论功能上线啦</p>
					<div class="doit">
						<a href="#">修改</a>
						<a href="#">删除</a>
						<a href="#">评论管理</a>
					</div>
				</div>
				<?php
						}
					}
				?>
			</div>
			<div class="pv">
				<div class="pv_inf">
					<span class="pv_sp1">主页的总pv为:</span><span class="pv_sp2">&nbsp;<?php echo $love_data[0]['love']?></span>
				</div>
			</div>
		</section>
		
		<footer>
			
		</footer>
	</body>
</html>