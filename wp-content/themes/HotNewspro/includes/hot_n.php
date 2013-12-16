<div id="hot_n">
	<div id="hot_tag">热 点 推 荐</div>
		<?php
			$args = array(
				'posts_per_page' => 5,
				'post__in'  => get_option('sticky_posts'),
				'caller_get_posts' => 10
			);
			query_posts($args);
			?>
		<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>
		<ul>
			<li><a href="<?php the_permalink() ?>" rel="bookmark" title="详细阅读<?php the_title(); ?>"><?php echo mb_strimwidth(get_the_title(), 0, 38, '');?></a></li>
		</ul>
		<?php endwhile; ?>
		<?php endif; ?>	
	<i class="lt"></i>
	<i class="rt"></i>
	<i class="lb"></i>
	<i class="rb"></i>
</div>