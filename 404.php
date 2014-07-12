<?php get_header(); ?>

<section id="page-404" class="sec-page clearfix">
	<div class="warp">
		<div id="content">
			<?php if(is_404()){?>
			<p class="text-center">什么都木有</p>
			<?php } ?>
		</div>
	</div>
	<?php get_sidebar(); ?>
</section>
<?php get_footer(); ?>
