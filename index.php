<?php get_header(); ?>
<section id="page-index" class="clearfix">
	<div class="warp">
		<div id="content">
		<?php
			if(!is_mobile() ):
				wp_reset_query();if(have_posts()) : ?>
				<h2>最新文章</h2>
				<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'loop', get_post_format() ); ?>
				<?php endwhile; ?>
			<?php endif;endif; ?>
			<div id="page" class="navigation"><?php kriesi_pagination($query_string) ?></div>
		</div>
	</div>
	<?php get_sidebar(); ?>
</section>
<?php get_footer(); ?>