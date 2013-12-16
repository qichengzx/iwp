						<div class="login-box">
						</div>
						<hr class="line" />
						<div class="app-ad">
							<a href="#" class="a-rss" target="_blank">
								rss
							</a>
							<a href="#" class="a-email">
								email
							</a>
							<a href="#" class="a-weibo" target="_blank">
								weibo
							</a>
							<a href="#" class="a-txwb" target="_blank">
								腾讯微博
							</a>
							<img src="<?php bloginfo('template_directory'); ?>/img/adv_idx_top.jpg">
						</div>
						<hr class="line" />
						<div class="hot-view">
							<h3 class="t-h2">
								<em>
									热门文章
								</em>
							</h3>
							<div class="view-list idx-view">
								<?php if (have_posts()) : ?>
								<?php 
								// Create a new filtering function that will add our where clause to the query
								function filter_where( $where = '' ) {
									// posts in the last 30 days
									$where .= " AND post_date > '" . date('Y-m-d', strtotime('-370 days')) . "'";
									return $where;
								};
								$args=array(
									'orderby' => 'meta_value_num','meta_key'=> 'post_views_count','order' => 'DESC','showposts'=>'5','caller_get_posts' => 1
								);
								add_filter( 'posts_where', 'filter_where' );
								$my_query=new WP_Query(
									$args
								);
								remove_filter( 'posts_where', 'filter_where' );
								while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate = $post->ID;
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
								<div class="clearfix view-box">
									<div class="pull-left img-box">
										<p>
											<a href="<?php the_permalink(); ?>" target="_blank">
												<img src="<?php echo $showimg; ?>" />
											</a>
										</p>
									</div>
									<div class="view-box-ctt">
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
											<p>
												<time>
													<?php the_time('Y-m-d H:i'); ?>
												</time>
												<span class="comment-box">
													<i class="icon-comment">
													</i>
													<a href="<?php the_permalink(); ?>#comment" target="_blank">
														<?php comments_number('0', '1', '%' );?>
													</a>
												</span>
											</p>
										</div>
									</div>
								</div>
								<?php endwhile;?><?php endif;wp_reset_query(); ?>
							</div>
						</div>
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('side') ) : ?><?php endif; ?>