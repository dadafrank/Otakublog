<?php
	require_once('connect.php');
	$pages  = 1;
	if($_GET[pages]) {
		$pages = intval($_GET[pages]);
	}
	else {
		$pages = 1;
	}
	$article_sql = "select * from new_article order by time desc ";
	$article_query = mysql_query($article_sql);
	if($article_query&&mysql_num_rows($article_query)){
		while($article_row = mysql_fetch_assoc($article_query)){
			$article_data[]=$article_row;
		}
	}
	
	$pagess = ceil(mysql_num_rows($article_query)/5);
	
	$message_sql = "select * from new_message order by time desc limit 10";
	$message_query = mysql_query($message_sql);
	if($message_query&&mysql_num_rows($message_query)){
		while($message_row = mysql_fetch_assoc($message_query)){
			$message_data[] = $message_row;
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
		<link rel="stylesheet" type="text/css" href="css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="css/header.css"/>
		<link rel="stylesheet" type="text/css" href="css/section.css"/>
		<link rel="stylesheet" type="text/css" href="css/footer.css" />
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
						<li class="nav_li1" style="border-radius: 2px;" onclick="changeurl(1)"><a style="color: skyblue;" id="zhuye" href="http://dadafrank.top">首页</a></li>
						<li class="nav_li1 nav_li1_s" onclick="changeurl(2)"><a>项目</a>
							<ul class="nav_ul2" id="nav_ul2" >
								<li class="nav_li2" onclick="changeurl(6)"><a href="http://www.baidu.com">百度</a></li>
								<li class="nav_li2" onclick="changeurl(7)"><a href="#">博客</a></li>
								<li class="nav_li2" onclick="changeurl(8)"><a href="#">音乐播放器</a></li>
							</ul>
						</li>
						<li class="nav_li1" onclick="changeurl(3)"><a href="#">留言</a></li>
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
		
		
		
		
		
		<section class="section">
			<div class="section_body">
				<div class="article">
					
					<?php
						if(empty($article_data)){
							echo "当前没有文章";
						}
						else{
							for($i=($pages-1)*5;$i<$pages*5&&$i<count($article_data);$i=$i+1){
								$value = $article_data[$i];
							// foreach($article_data as $value){
								
							
					?>
					<div class="article_body">
						<div class="art_body_img" style="background-image:url(<?php echo $value['url'] ?>)"></div>
						<div class="art_body_inf">
							<h3><?php echo $value['title'] ?></h3>
							<p>•&nbsp;&nbsp;<?php echo $value['author']?>&nbsp;&nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;<?php echo $value['time']?>&nbsp;&nbsp;&nbsp;&nbsp;</p>
							<pre><?php echo $value['disc'] ?></pre>
						</div>
					</div>
					<?php
							}
						}
					?>
					
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
						<a  class="page_add" id="page_add" href="index.php?pages=<?php echo $pagess=$pages+1 ?>">+1</a>
						<a  class="page_cut" id="page_cut" href="index.php?pages=<?php echo $pagess=$pages-1 ?>">-1</a>
					</div>
					
				</div>
				<div class="other">
					<form class="search" id="search_form">
						<input type="text" name="key" id="search_input" placeholder="请输入您想要搜索的文章标题关键字" />
					</form>
					<div class="about_me">
						<div class="about_me_img"></div>
						<h2>Frank</h2>
						<p>励志成为一名优秀的前端工程师，喜欢code，喜欢设计，喜欢看书，喜欢轮滑，喜欢LOL。</p>
					</div>
					<div class="like_me">
						<p>Do you like me?</p>
						<div id="like_me_heart" class="like_me_heart" onclick="addlove()"></div>
						<p id="love_num" class="like_me_num"><?php echo $love_data[0]['love']?></p>
					</div>
					<script>
						window.onload = function heartchange() {
							if(love.getItem("num")!=null) {
								var love_pic = document.getElementById("like_me_heart");
								love_pic.style.backgroundImage="url(img/heartred.png)";
							}
						}
						var love_pic = document.getElementById("like_me_heart");
						var love = window.localStorage;
						function addlove () {
							var xmlhttp;
							if (window.XMLHttpRequest)
							  {// code for IE7+, Firefox, Chrome, Opera, Safari
							  xmlhttp=new XMLHttpRequest();
							  }
							else
							  {// code for IE6, IE5
							  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
							  }
							xmlhttp.onreadystatechange=function()
							  {
							  if (xmlhttp.readyState==4 && xmlhttp.status==200)
							    {
							    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
							    }
							  }
							var love_num = document.getElementById("love_num").innerHTML;
							if(love.getItem("num")==null) {
								//设置有值
								love.setItem("num",1)
								// 设置图片
								love_pic.style.backgroundImage="url(img/heartred.png)";
								// 设置数据库
								xmlhttp.open("GET","test.txt",true);
								xmlhttp.send();
							}
							else {
								alert("知道你喜欢我了~不要再点了");
							}
						}
// 						
					</script>
					<div class="message">
						<?php
							if(empty($message_data)){
								echo "当前没有留言";
							}
							else{	
								foreach($message_data as $value){
									
								
						?>
						<div class="message_body">
							<h4><?php echo $value['author']?></h4>
							<p>•&nbsp;<?php echo $value['time']?>&nbsp;&nbsp;•&nbsp;20:15:56</p>
							<pre><?php echo $value['content']?></pre>
							
						</div>
						<?php
								}
							}
						?>
						<p>以上为最近留言</p>
					</div>
				</div>
			</div>
		</section>
		<script>
			var input_search=document.getElementById("search_input");
			var form=document.getElementById("search_form");
			input_search.onkeydown=function search(e) {
				var e = window.event||e;
				var key = e.keyCode||e.which;
				if(key==13){
					if(input_search.value=='')
					{
						alert("搜索内容不能为空");
						form.action="index.php";
					}
					else {
						form.action="search_page.php";
					}
				}
			}
		</script>
		
		
		
		<footer class="blog_foot">
			<p class="blog_foot_body">
				<a href="#">管理员</a>|
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
