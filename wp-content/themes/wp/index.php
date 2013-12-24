<?php get_header(); ?>

<section id="page-index" class="clearfix">
	<div class="warp">
		<div id="content">
			<?php
				$args = array(
					'posts_per_page' => 5,
					'post__in'  => get_option('sticky_posts'),
					'caller_get_posts' => 10
				);
				query_posts($args);
			?>
			<?php
				$fmimg = get_post_meta($post->ID, "fmimg_value", true);
				$cti = catch_that_image();
				if($fmimg) {
					$showimg = $fmimg;
				} else {
					$showimg = $cti;
				};
			?>
			<?php if (have_posts()) : ?>
			<h2>本站推荐</h2>
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<?php while (have_posts()) : the_post(); $i;$i++;?>
					<li data-target="#carousel-example-generic" data-slide-to="<?php echo $i-1; ?>" <?php if($i==1){ ?>class="active"<?php } ?>></li>
					<?php endwhile; ?>
				</ol>
			  	<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<?php while (have_posts()) : the_post(); $j;$j++;?>
						<div <?php if($j==1){ ?>class="item active"<?php }else{ ?> class="item" <?php } ?>>
							<?php if ( get_post_meta($post->ID, 'show', true) ) : ?>
								<?php $image = get_post_meta($post->ID, 'show', true); ?>
									<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><img src="<?php echo $image; ?>"width="830" height="250" alt="<?php the_title(); ?>"/></a>
								<?php else: ?>
									<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php if (has_post_thumbnail()) { the_post_thumbnail('show'); }
								else { ?>
									<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><img class="home-thumb" src="<?php echo catch_that_image() ?>" width="830" height="250" alt="<?php the_title(); ?>"/>
								<?php } ?></a>
							<?php endif; ?>
							<div class="carousel-caption">
								<h3><a href="<?php the_permalink() ?>" title="详细阅读<?php the_title(); ?>"><?php echo mb_strimwidth(get_the_title(), 0, 38, '');?></a></h3>
								<?php the_excerpt(); ?>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
			<?php endif; ?>	
			<?php wp_reset_query();if(have_posts()) : ?>
				<h2>最新文章</h2>
				<?php while ( have_posts() ) : the_post(); ?>
				<?php echo get_post_format();?>
				<?php get_template_part( 'loop', get_post_format() ); ?>
				<?php endwhile; ?>
			<?php endif; ?>
			<div id="page" class="navigation"><?php kriesi_pagination($query_string) ?></div>
		</div>
	</div>
	<?php get_sidebar(); ?>
</section>
<?php get_footer(); ?>