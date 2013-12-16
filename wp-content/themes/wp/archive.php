<?php get_header(); ?>

<section id="page-index">
	<div class="warp">
		<div id="content">
			<?php echo get_category_parents( get_query_var('cat') , true , ' &gt; ' ); ?>文章
			<?php if(have_posts()) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'loop', get_post_format() ); ?>
				<?php endwhile; ?>
			<?php endif; ?>
			
			<div  id="page" class="navigation"><?php kriesi_pagination($query_string) ?></div>
			<!-- <div>
				<a href="">上一页</a>
				<span>1</span>
				<a href="">2</a>
				<a href="">3</a>
				<a href="">4</a>
				<a href="">5</a>
				<a href="">6</a>
				<a href="">7</a>
				<span>...</span>
				<a href="">下一页</a>
				<a href="">最后一页</a>
			</div> -->
		</div>

	</div>
	<?php get_sidebar(); ?>
</section>
<? get_footer(); ?>