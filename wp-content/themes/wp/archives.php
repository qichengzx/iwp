<?php
/*
Template Name: 文章归档
*/
?>
<?php get_header(); ?>
<nav id="breadcrumb">
	<?php seobreadcrumbs();?>
</nav>
<section id="page-archives" class="sec-page clearfix">
	<div class="warp clearfix">
		<div id="content" class="c-archives">
			<h2>文章存档</h2>
			<?php archives_list_SHe(); ?>
		</div> 

	</div>
<?php get_sidebar(); ?>
</section>
<?php get_footer(); ?>