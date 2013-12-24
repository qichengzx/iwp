<?php get_header(); ?>

<section id="page-archive" class="sec-page clearfix">
	<div class="warp">
		<div id="content">
			<?php if (have_posts()) : ?> <h2 class="Archives-nav">
			<?php $post = $posts[0]; ?>
			<?php if (is_category()) { ?>所有属于<span><?php single_cat_title(); ?></span>分类文章
			<?php } elseif( is_tag() ) { ?>所有关于<span><?php single_tag_title(); ?></span>的文章
			<?php } elseif (is_day()) { ?><span><?php the_time('Y年m月'); ?></span>发表的文章
			<?php } elseif (is_month()) { ?>所有<span><?php the_time('Y年m月'); ?></span>文章	
			<?php } elseif (is_year()) { ?>Archive for <span><?php the_time('Y'); ?></span>
			<?php } elseif (is_author()) { ?><span><?php wp_title( '');?></span>发表的所有文章
			<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h2>Blog Archives</h2>
			<?php } ?><?php endif; ?></h2>
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