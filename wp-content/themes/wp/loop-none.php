<?php
/**
 * The template for displaying a "No posts found" message
 *
 * @package WordPress
 * @subpackage wp
 * @since wp 1.0
 */
?>


<article class="search-list">
	<header class="a-header entry-header">
		<h2 class="entry-title text-center"><?php _e( '神马也木有找到', 'wp' ); ?></h2>
	</header>
	<div class="entry-summary text-center">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
		<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'wp' ), admin_url( 'post-new.php' ) ); ?></p>
	<?php elseif ( is_search() ) : ?>
	<p><?php _e( '暂无结果，换个词试试吧', 'wp' ); ?></p>
	<?php get_search_form(); ?>
	<?php else : ?>
	<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'wp' ); ?></p>
	<?php get_search_form(); ?>
	<?php endif; ?>
	</div>
</article><!-- .page-content -->
