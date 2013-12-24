<?php
/*
Template Name: 热门标签
*/
?>
<?php get_header(); ?>
<section id="page-tags" class="sec-page">
	<div class="warp">
		<div id="content">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php wp_tag_cloud('smallest=13&largest=13&orderby=count&unit=px&number=&order=RAND&exclude&include=');?>
			</article><!-- #post -->
		</div>
	</div>
	<?php get_sidebar(); ?>
</section>
<?php get_footer(); ?>