<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<!--评论-->
<div class="a-comments">
	<?php comment_form(
		array(
			'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label> <textarea id="comment" class="form-control" placeholder="留下足迹..." name="comment" cols="45" rows="4" aria-required="true"></textarea></p>'
		))
	?>
	
</div>
<!--评论列表-->
<div class="comments-list comments-area" id="comments">
	<!-- <ul class="clearfix">
		<li>
			<img src="assets/images/e05ca614504b018303c130ce72abf10d.png" class="avatar">
			<div>
				<h4>于江水&nbsp;&nbsp;2013-11-13 10:55&nbsp;&nbsp;<a href="javascript:void(0)" data-reto="" rel="nofollow">回复</a></h4>
				<p>这写的什么乱七八糟的，看不懂</p>
			</div>
		</li>
		<li class="has-reply">
			<img src="assets/images/e05ca614504b018303c130ce72abf10d.png" class="avatar">
			<div>
				<h4>于江水&nbsp;&nbsp;2013-11-13 10:55&nbsp;&nbsp;<a href="javascript:void(0)" data-reto="" rel="nofollow">回复</a></h4>
				<p>这写的什么乱七八糟的，看不懂</p>
			</div>
			<ul class="clearfix">
				<li>
					<img src="assets/images/e05ca614504b018303c130ce72abf10d.png" class="avatar">
					<div>
						<h4>于江水&nbsp;&nbsp;2013-11-13 10:55&nbsp;&nbsp;<a href="javascript:void(0)" data-reto="" rel="nofollow">回复</a></h4>
						<p>这写的什么乱七八糟的，看不懂</p>
					</div>
				</li>
				<li>
					<img src="assets/images/e05ca614504b018303c130ce72abf10d.png" class="avatar">
					<div>
						<h4>于江水&nbsp;&nbsp;2013-11-13 10:55&nbsp;&nbsp;<a href="javascript:void(0)" data-reto="" rel="nofollow">回复</a></h4>
						<p>这写的什么乱七八糟的，看不懂</p>
					</div>
				</li>
			</ul>
		</li>
		<li>
			<img src="assets/images/e05ca614504b018303c130ce72abf10d.png" class="avatar">
			<div>
				<h4>于江水&nbsp;&nbsp;2013-11-13 10:55&nbsp;&nbsp;<a href="javascript:void(0)" data-reto="" rel="nofollow">回复</a></h4>
				<p>这写的什么乱七八糟的，看不懂</p>
			</div>
		</li>
	</ul> -->
	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">本文评论(<?php printf(get_comments_number());?>)</h3>
		<ul class="comment-list clearfix">
			<?php
				wp_list_comments( array(
					'style'       => 'ul',
					'short_ping'  => true,
					'avatar_size' => 36,
				) );
			?>
		</ul><!-- .comment-list -->

		<?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', '' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', '' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', '' ) ); ?></div>
		</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.' , '' ); ?></p>
		<?php endif; ?>
	<?php endif; ?>
	

</div><!-- #comments -->