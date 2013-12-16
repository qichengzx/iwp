<?php
/*
Template Name: 文章归档
*/
?>
<?php get_header(); ?>
<nav id="breadcrumb">
	<?php seobreadcrumbs();?>
</nav>
<section id="s-archives">
	<div class="warp clearfix">
		<!-- <div class="archives-aside">
			<h3><strong>时间</strong></h3>
			<dl>
				<dt>2013</dt>
				<dd>2013.12</dd>
				<dd>2013.11</dd>
				<dd>2013.10</dd>
				<dd>2013.9</dd>
				<dd>2013.8</dd>
				<dd>2013.7</dd>
				<dd>2013.6</dd>
				<dd>2013.5</dd>
				<dd>2013.4</dd>
				<dd>2013.3</dd>
				<dd>2013.2</dd>
				<dd>2013.1</dd>
			</dl>
			<dl>
				<dt>2012</dt>
				<dd>2012.12</dd>
				<dd>2012.11</dd>
				<dd>2012.10</dd>
				<dd>2012.9</dd>
				<dd>2012.8</dd>
				<dd>2012.7</dd>
				<dd>2012.6</dd>
				<dd>2012.5</dd>
				<dd>2012.4</dd>
				<dd>2012.3</dd>
				<dd>2012.2</dd>
				<dd>2012.1</dd>
			</dl>
		</div> -->
		<div id="content" class="c-archives">
			<h2>文章存档11111</h2>
			<?php archives_list_SHe(); ?>
			<!-- <dl>
				<dt>2013.12</dt>
				<dd><a href="">兔女郎陪上网！”近日，一组照片在网上流</a></dd>
				<dd><a href="">标题</a></dd>
				<dd><a href="">标题</a></dd>
				<dd><a href="">女郎陪上网！”近日，一组照片在网上</a></dd>
				<dd><a href="">标题</a></dd>
				<dd><a href="">标题</a></dd>
			</dl>-->
		</div> 

	</div>
<?php get_sidebar(); ?>
</section>
<? get_footer(); ?>