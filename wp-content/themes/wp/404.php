<? get_header(); ?>

<section id="page-index">
	<div class="warp">
		<div id="content">
			<?php if(is_404()){?>
			<p class="text-center">什么都木有</p>
			<?php } ?>
		</div>
	</div>
	<?php get_sidebar(); ?>
</section>
<? get_footer(); ?>