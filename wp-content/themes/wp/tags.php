<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>标签</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/buttons.css">
<link href="style.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
<![endif]-->
</head>
<body id="tags" data-page="tags">
<header class="header" id="header">
	<div class="clearfix">
	<h1 id="logo" class="pull-left">logo</h1>
	<nav id="head-nav" class="pull-left">
		<ul>
			<li><a href="">1</a></li>
			<li><a href="">2</a></li>
			<li><a href="">3</a></li>
			<li><a href="">4</a></li>
			<li><a href="">5</a></li>
		</ul>
	</nav>
	<div class="head-tool">
	<form>
		<button type="button" class="button glow button-flat-primary pull-right" id="search-btn">搜索</button>
		<input type="text" class="form-control pull-right" placeholder="请输入搜索内容" id="search"  x-webkit-speech>
	</form>
	</div>
	</div>
</header>
<nav id="breadcrumb">
	<ol class="breadcrumb clearfix nobdr">
		<li><a href="#">Home</a></li>
		<li><a href="#">Library</a></li>
		<li class="active">Data</li>
	</ol>
</nav>
<section id="s-tags">
	<div class="warp clearfix">
		<div id="content" class="c-tags">
			<h2>标签</h2>
			<div id="tags-list">
				<dl class="post">
					<dt>标签1</dt>
					<dd><a href="#">Library</a></dd>
					<dd><a href="#">Library</a></dd>
					<dd><a href="#">Library</a></dd>
					<dd><a href="#">Library</a></dd>
				</dl>
				<dl class="post">
					<dt>标签2</dt>
					<dd><a href="#">Library</a></dd>
					<dd><a href="#">Library</a></dd>
					<dd><a href="#">Library</a></dd>
					<dd><a href="#">Library</a></dd>
					<dd><a href="#">Library</a></dd>
					<dd><a href="#">Library</a></dd>
					<dd><a href="#">Library</a></dd>
				</dl>
				<dl class="post">
					<dt>标签3</dt>
					<dd><a href="#">Library</a></dd>
				</dl>
				<dl class="post">
					<dt>标签1</dt>
					<dd><a href="#">Library</a></dd>
					<dd><a href="#">Library</a></dd>
					<dd><a href="#">Library</a></dd>
					<dd><a href="#">Library</a></dd>
				</dl>
				<dl class="post">
					<dt>标签3</dt>
					<dd><a href="#">Library</a></dd>
				</dl>
			</div>
		</div>

	</div>
	
</section>

<footer class="footer" id="page-footer">
	底部
</footer>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write(unescape('%3Cscript src="http://jquery.com/jquery-wp-content/themes/jquery/js/jquery-1.9.1.min.js"%3E%3C/script%3E'))</script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.masonry.min.js"></script>
<script>
var flag = true;
$(function(){			
	var $container = $('#tags-list');    
	$container.masonry({
		singleMode: true,
		animate: true,
		itemSelector: '.post'
	});		
	//¹ö¶¯Ìõ¹ö¶¯µ½Àëµ×²¿¾àÀë50µÄÊ±ºò´¥·¢
	$(window).scroll(function(){
		// µ±¹ö¶¯µ½×îµ×²¿ÒÔÉÏ100ÏñËØÊ±£¬ ¼ÓÔØÐÂÄÚÈÝ
		if ($(document).height() - $(this).scrollTop() - $(this).height()<50){	
			if (flag){
				var $boxes = $(getList());	 
				$container.append($boxes).masonry('appended',$boxes);
			}
		}
	});	
});	
</script>
</body>
</html>