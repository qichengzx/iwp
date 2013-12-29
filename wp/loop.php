<article class="list" id="post-<?php the_ID(); ?>">
	<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
		<div class="thumb entry-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php endif; ?>
	<header class="a-header entry-header">
		<h2 class="entry-title"><small class="cate-name"><?php entry_cate(); ?></small><a href="<?php the_permalink(); ?>"><?php the_title(); if(is_sticky()){echo "<span>置顶</span>";} ?></a></h2>
		<div class="info"><?php entry_author(); ?><span><a href="<?php the_permalink(); ?>#comments"><?php comments_number('0', '1', '%' );?>条评论</a></span><?php entry_date(); ?><?php edit_post_link( __( '编辑', '' ), '<span class="edit-link">', '</span>' ); ?></div>
	</header>
	<div class="entry-summary">
		<?php if ( post_password_required() ): ?>
			<p>这是一篇受密码保护的文章，您需要提供访问密码</p>
		<?php else: ?>
		<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0,300,"...","utf-8"); ?>
		<?php endif;?>
	</div><!-- .entry-summary -->
</article>