<?php get_header(); ?>

<section id="page-404" class="sec-page">
	<div class="warp">
		<div id="content">
			<?php if(is_404()){?>
			<iframe scrolling='no' frameborder='0' src='http://yibo.iyiyun.com/js/yibo404/key/1' width='640' height='462' style='display:block;margin:0 auto;'></iframe>
			<!-- <p class="text-center">什么都木有</p> -->
			<?php } ?>
		</div>
	</div>
	<?php get_sidebar(); ?>
</section>
<?php get_footer(); ?>