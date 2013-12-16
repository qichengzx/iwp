<?php get_header(); ?>
	<div class="container-hx">
		<div class="row-fluid-wrap-hx">
			<div class="center-container-hx">
				<div class="clearfix row-fluid-hx">
					<div class="center-ctr-wrap">
						<div class="center-ctr-box">
							<div class="biaoqian idx-biaoqian">
								<?php wp_nav_menu( array( 'theme_location' => 'nav2-menu','container' => '','menu_class' => 'nav2-menu-list','before' => '','after' => '') ); ?>
							</div>
							<?php query_posts('meta_key=tuijian_value&meta_value=1&showposts=1');  ?>
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php
								$fmimg = get_post_meta($post->ID, "fmimg_value", true);
								$cti = catch_that_image();
								if($fmimg) {
									$showimg = $fmimg;
								} else {
									$showimg = $cti;
								};
							?>
							<div class="toutiao idx-toutiao">
								<h2>
									<a href="<?php the_permalink(); ?>" target="_blank">
										<?php the_title(); ?>
									</a>
								</h2>
								<?php the_excerpt(); ?>
								<div class="box-img">
									<a href="<?php the_permalink(); ?>" target="_blank">
										<img src="<?php echo $showimg; ?>">
									</a>
								</div>
								<div class="box-other">
									<span class="source-quote">
										<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" target="_blank">
											<?php the_author_meta('display_name'); ?>
										</a>
									</span>
									<time>
										<?php the_time('Y-m-d H:i'); ?>
									</time>
									<span class="comment-box">
										<i class="icon-comment">
										</i>
										<a href="<?php the_permalink(); ?>" target="_blank">
											<?php comments_number('0', '1', '%' );?>
										</a>
									</span>
									<?php the_tags('<span class="tags-box">',' ','</span>'); ?>
								</div>
							</div>
							<?php endwhile; endif; wp_reset_query(); ?>
							<div class="article-list idx-list">
								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
								<?php
								$views = getPostViews(get_the_ID());
								$fmimg = get_post_meta($post->ID, "fmimg_value", true);
								$cti = catch_that_image();
								if($fmimg) {
									$showimg = $fmimg;
								} else {
									$showimg = $cti;
								};
								?>
								<div class="clearfix article-box <?php if($views>500) { ?>idx-tuijian<?php } ?>">
									<a href="<?php the_permalink(); ?>" class="a-img" target="_blank">
										<img src="<?php echo $showimg; ?>" />
										<?php if($views>500) { ?>
										<i class="i-ico-re" title="热门文章">热门文章</i>
										<?php } ?>
									</a>
									<div class="article-box-ctt">
										<h4>
											<a href="<?php the_permalink(); ?>" target="_blank">
												<?php the_title(); ?>
											</a>
										</h4>
										<div class="box-other">
											<span class="source-quote">
												<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" target="_blank">
													<?php the_author_meta('display_name'); ?>
												</a>
											</span>
											<time>
												<?php the_time('Y-m-d H:i'); ?>
											</time>
										</div>
										<div class="article-summary">
											<?php the_excerpt(); ?>
										</div>
										<?php the_tags('<p class="tags-box">',' ','<i class="i-icon-bottom"></i></p>'); ?>
									</div>
									<div class="idx-hldj">
										<div class="article-icon">
											<span class="comment-box">
												<i class="icon-comment">
												</i>
												<a href="<?php the_permalink(); ?>#odby" target="_blank">
													<?php comments_number('0', '1', '%' );?>
												</a>
											</span>
										</div>
									</div>
								</div>
								<?php endwhile; endif; ?>
							</div>
							<div class="clearfix pages">
								<div class="pull-right pgs">
									<?php par_pagenavi(9); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="side-container-hx">
						<?php get_sidebar(); ?>
					</div>
				</div>
<?php get_footer(); ?>