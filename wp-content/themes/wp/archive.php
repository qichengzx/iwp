<?php get_header(); ?>

<section id="page-index">
	<div class="warp">
		<div id="content">
			<?php if (have_posts()) : ?> 
			<?php $post = $posts[0]; ?>
			<?php if (is_category()) { ?>所有属于<?php single_cat_title(); ?>分类文章
			<?php } elseif( is_tag() ) { ?>所有关于<?php single_tag_title(); ?>的文章
			<?php } elseif (is_day()) { ?><?php the_time('Y年m月'); ?>发表的文章
			<?php } elseif (is_month()) { ?>所有<?php the_time('Y年m月'); ?>文章
			<?php } elseif (is_year()) { ?>Archive for <?php the_time('Y'); ?>
			<?php } elseif (is_author()) { ?><?php wp_title( '');?>发表的所有文章
			<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h1>Blog Archives</h1>
			<?php } ?><?php endif; ?>
			<?php if(have_posts()) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'loop', get_post_format() ); ?>
				<?php endwhile; ?>
			<?php endif; ?>
			
			<div  id="page" class="navigation"><?php kriesi_pagination($query_string) ?></div>
		</div>

	</div>
	<?php get_sidebar(); ?>
</section>
<? get_footer(); ?>