<?php
/*
* The template for displaying all pages
*/
?>
<? get_header(); ?>

<section id="page-index">
	<div class="warp">
		<div id="content">
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentythirteen' ), get_search_query() ); ?></h1>
			</header>
			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'loop', get_post_format() ); ?>
			<?php endwhile; ?>


		<?php else : ?>
			<?php get_template_part( 'loop', 'none' ); ?>
		<?php endif; ?>
		</div><!-- #content -->
	</div>
	<?php get_sidebar(); ?>
</section>
<? get_footer(); ?>