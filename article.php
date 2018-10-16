<?php
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>大大Frank</title>
		<link rel="stylesheet" type="text/css" href="css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="css/header.css"/>
		<link rel="stylesheet" type="text/css" href="css/footer.css" />
		<link rel="stylesheet" type="text/css" href="css/article.css"/>
		
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
					case 5:location.href="#";break;//资助
					case 6:location.href="http://www.baidu.com";break;//百度
					case 7:location.href="http://dadafrank.top";break;//博客
					default :location.href="http://dadafrank.top/Project/music/index.html";//音乐播放器
				}
			}
		</script>
		
		
		<div class="page_artilce">
			<h2>评论功能上线啦</h2>
			<p>•&nbsp;&nbsp;2018-04-18&nbsp;&nbsp;15:04:32&nbsp;&nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;大大Frank&nbsp;&nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;3次评论</p>
			<pre>这几天一直在尝试各种方法让文章显示空格和换行。
    之前在后台发布文章和修改文章的时候，空格都可以读取出来，但是一到前台查看文章的时候空格就不见了，而且一个空格也没有，然后我就去数据库看了一下，空格和换行都在，但就是前台读取不出来。
    然后我就百度，看到一个htmlspecialchars()函数，这个函数可以把一些符号如"&"变成"&-amp(因为读取出来就变成前面的符号了，所以我多加了一个字符)"，但是我不确定能不能吧空格变成"&-nbsp"，然后我就做了实验，发现数据库没看到空格的符号，前台也读取不出来。
    然后我就想为什么后台文章修改的时候可以看到空格和换行，用的是"input"标签，所以我就想有没有类似的标签，突然想到前段时间看到的一个"pre"标签，"pre"标签是可以把所以的空格和换行都读取出来的标签，然后我就改了前台的标签，发现可以了。
    所以这就是那个小技巧了，就是用"pre"标签来装文章的内容，这样就可以读取出来啦。
    
    但是，我又发现了一个问题，当单行文字过多时，pre是不会自动换行的，给了固定的宽度也还是不会换行，会出现一个滚动条，显得特别的丑，所以，我又去百度了一下，看到有个word-space属性，但是不太会用，所以我先直接把代码考下来直接用试试看，发现可以用的，但是代码下面申明说IE6不能兼容，因为我电脑没有IE6，所以不做考虑了（现在应该没多少人用了吧= =）。
    
    直接上代码吧。
    "white-space: pre-wrap;white-space: -moz-pre-wrap;white-space: -pre-wrap;white-space: -o-pre-wrap;word-wrap: break-word;"</pre>
		</div>
		
		
		<div class="read_mess">
			<div class="message_body">
				<h4>大大Frank</h4>
				<p>•&nbsp;2018-04-16&nbsp;&nbsp;•&nbsp;20:15:56</p>
				<pre>哇，这个博客真漂亮啊    你不觉得吗？</pre>
			</div>
		</div>
		
		<div class="white_mess">
			<form action="#" method="post">
				<textarea placeholder="评论内容" class="mess_content"></textarea>
				<br />
				<input type="text" placeholder="昵称" class="mess_name" />
				<br class="to_phone" />
				<input type="email" placeholder="邮箱" class="mess_email" />
				<br class="to_phone" />
				<input type="submit" value="提交评论" class="mess_sub" />
			</form>
		</div>
		
		
		
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