<?php
	require_once('../connect.php');
	$pages  = 1;
	if($_GET[pages]) {
		$pages = intval($_GET[pages]);
	}
	else {
		$pages = 1;
	}
	$message_sql = "select * from new_message order by time desc";
	$message_query = mysql_query($message_sql);
	if($message_query&&mysql_num_rows($message_query)){
		while($message_row = mysql_fetch_assoc($message_query)){
			$message_data[] = $message_row;
		}
	}
	$pagess = ceil(mysql_num_rows($message_query)/50);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>大大Frank</title>
		<link rel="icon" href="../img/logo_fox.png" type="image/x-icon"/>
		<link rel="stylesheet" type="text/css"href="../css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="../css/admin.header.css"/>
		<link rel="stylesheet" type="text/css" href="../css/admin_mess.css"/>
		<link rel="stylesheet" type="text/css" href="../css/page.css"/>
		<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<header class="header">
			<div class="header_position">
				<h2>FRANK</h2>
				<nav class="header_nav">
					<div class="icon" id="icon" onclick="iconchange()"></div>
					<ul class="nav_ul1" id="nav_ul1">
						<li class="nav_li1" style="border-radius: 2px;" onclick="changeurl(1)"><a href="article_manage.php">&nbsp;文章管理&nbsp;</a></li>
						<li class="nav_li1 nav_li1_s" onclick="changeurl(2)"><a href="article_add.php">&nbsp;文章发布&nbsp;</a></li>
						<li class="nav_li1" onclick="changeurl(3)"><a href="message.php" style="color: rgb(52,152,219);">&nbsp;留言管理&nbsp;</a></li>
						<li class="nav_li1" onclick="changeurl(4)"><a href="../index.php">&nbsp;返回主页&nbsp;</a></li>
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
					case 1:location.href="article_manage.php";break;//文章管理
					case 2:location.href="article_add.php";break;
					case 3:location.href="message.php";break;//留言
					default :location.href="../index.php";//主页
				}
			}
		</script>
		
		<section class="mess_body">
			<div class="total">留言数：<?php echo mysql_num_rows($message_query) ?></div>
			<?php
				if(empty($message_data)){
					echo "当前没有留言";
				}
				else{
					for($i=($pages-1)*50;$i<$pages*50&&$i<count($message_data);$i=$i+1){
						$value = $message_data[$i];
			?>
			<div class="mess_body_inf">
				<textarea readonly="readonly"><?php echo $value['content']?></textarea>
				<p class="p1"><?php echo $value['author']?></p>
				<p class="p2"><?php echo $value['email']?></p>
				<p class="p3"><?php echo $value['time']?></p>
				<p class="p4"><a href="message.handle.php?id=<?php echo $value['id']?>">删除</a></p>
			</div>
			<?php
					}
				}
			?>
			<div id="mess_container">
				<div class="page" >
					<div class="page_num">共<?php echo $pagess ?>页</div>
					<?php 
						if($pagess == 1) {
							echo "<style> #page_add,#page_cut {display:none} </style>";
						}
						else {
							if($pages<=1) {
								echo "<style> #page_cut {display:none} </style>";
							}
							if($pages>=$pagess) {
								echo "<style> #page_add {display:none} </style>";
							}
						}
					?>
					<a  class="page_add" id="page_add" href="blog_mess.php?pages=<?php echo $pagess=$pages+1 ?>">+1</a>
					<a  class="page_cut" id="page_cut" href="blog_mess.php?pages=<?php echo $pagess=$pages-1 ?>">-1</a>
				</div>
			</div>
		</section>
		
	</body>
</html>