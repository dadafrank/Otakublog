<?php
	require_once('connect.php');
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
	$pagess = ceil(mysql_num_rows($message_query)/10);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>大大Frank</title>
		<link rel="stylesheet" type="text/css" href="css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="css/header.css"/>
		<link rel="stylesheet" type="text/css" href="css/footer.css" />
		<link rel="stylesheet" type="text/css" href="css/article.css" />
		<link rel="stylesheet" type="text/css" href="css/page.css" />
		<link rel="icon" href="img/logo_fox.png" type="image/x-icon"/>
		<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<header class="header">
			<div class="header_position">
				<div class="header_h1">
					<h1>FRANK</h1>
					<p>人总要不断的进步嘛~&nbsp;&nbsp;&nbsp;对不对？</p>
				</div>
				<nav class="header_nav">
					<div class="icon" id="icon" onclick="iconchange()"></div>
					
					<ul class="nav_ul1" id="nav_ul1">
						<li class="nav_li1" style="border-radius: 2px;" onclick="changeurl(1)"><a id="zhuye" href="http://dadafrank.top">首页</a></li>
						<li class="nav_li1 nav_li1_s" onclick="changeurl(2)"><a>项目</a>
							<ul class="nav_ul2" id="nav_ul2" >
								<li class="nav_li2" onclick="changeurl(6)"><a href="http://www.baidu.com">百度</a></li>
								<li class="nav_li2" onclick="changeurl(7)"><a href="#">博客</a></li>
								<li class="nav_li2" onclick="changeurl(8)"><a href="#">音乐播放器</a></li>
							</ul>
						</li>
						<li class="nav_li1" onclick="changeurl(3)"><a href="#" style="color: skyblue;">留言</a></li>
						<li class="nav_li1" onclick="changeurl(4)"><a href="#">关于</a></li>
						<li class="nav_li1" onclick="changeurl(5)" style="border-radius: 2px;"><a href="#">帮助</a></li>
					</ul>
				</nav>
			</div>
		</header>
		<script>
			// 手机点击消失出现
			function iconchange() {
				var nav_ul1 =document.getElementById("nav_ul1")
				var nav_ul2 =document.getElementById("nav_ul2")
				if(nav_ul1.style.display=="none"){
					nav_ul1.style.display="block";
				}
				else {
					nav_ul1.style.display="none";
					nav_ul2.style.display="none";
				}
			}
			//跳转链接
			function changeurl(obj){
				var nav_ul2 =document.getElementById("nav_ul2")
				switch(obj){
					case 1:location.href="http://dadafrank.top";break;//首页
					case 2:if(nav_ul2.style.display=="none"){
								nav_ul2.style.display="block";
							}
							else {
								nav_ul2.style.display="none";
							};break;//项目
					case 3:location.href="#";break;//留言
					case 4:location.href="#";break;//关于
					case 5:location.href="#";break;//帮助
					case 6:location.href="http://www.baidu.com";break;//百度
					case 7:location.href="http://dadafrank.top";break;//博客
					default :location.href="http://dadafrank.top/Project/music/index.html";//音乐播放器
				}
			}
		</script>
		
		
		
		<?php
			if(empty($message_data)){
				echo "当前没有留言";
			}
			else{
				for($i=($pages-1)*10;$i<$pages*10&&$i<count($message_data);$i=$i+1){
					$value = $message_data[$i];
		?>
		<div class="read_mess" style="margin-top: 76px;">
			<div class="message_body">
				<h4><?php echo $value['author']?></h4>
				<p>•&nbsp;<?php echo $value['time']?></p>
				<pre><?php echo $value['content']?></pre>
			</div>
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
		
		<div class="white_mess">
			<form action="blog_mess.handle.php" method="post">
				<textarea style="resize:none" placeholder="评论内容" name="mess_content" class="mess_content"></textarea>
				<br />
				<input type="text" placeholder="昵称" name="mess_author" class="mess_name" />
				<br class="to_phone" />
				<input type="email" placeholder="邮箱" name="mess_email" class="mess_email" />
				<br class="to_phone" />
				<input type="submit" value="提交评论" class="mess_sub" />
			</form>
		</div>
		
		
		
		<footer class="blog_foot">
			<p class="blog_foot_body">
				<a href="admin/log_in.php">管理员</a>|
				<a href="https://www.uisdc.com/">优设</a>|
				<a href="http://www.ui.cn/">UI中国</a>|
				<a href="https://diygod.me/">DIYgod</a>
			</p>
			<p class="geyan">记住，生活再艰辛也要微笑面对，笑着面对总比苦着脸好看多了。</p>
			<p class="designer">&copy;designed by Frank</p>
		</footer>
		
		<div class="to_top" id="to_top" onclick="tohead()">
			TOP
		</div>
		<script>
			document.onscroll= function totop() {
				var to_top=document.getElementById("to_top");
				var height=parseInt(document.documentElement.scrollTop) ;
				if(height>0)
				{
					to_top.style.display="block";
				}
				else{
					to_top.style.display="none";
				}
			}
			
			function tohead(){
				var time=setInterval(function() {
					var height=parseInt(document.documentElement.scrollTop) ;
					if(height>0){
						document.documentElement.scrollTop=parseInt(height-10);
					}
					else {
						document.documentElement.scrollTop=0;
						clearInterval(time);
					}
				},1)
				
			}
		</script>
	</body>
</html>