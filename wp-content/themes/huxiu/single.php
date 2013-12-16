<?php get_header(); ?>
	<div class="container-hx">
		<div class="row-fluid-wrap-hx">
			<div class="center-container-hx">
				<div class="clearfix row-fluid-hx">
					<div class="center-ctr-wrap">
						<div class="center-ctr-box"><?php //echo '开始'; ?>
               <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
               <?php setPostViews(get_the_ID()); ?>
               <?php
					$fmimg = get_post_meta($post->ID, "fmimg_value", true);
				?>
                        <div class="clearfix neirong">
                        
                <h1><?php the_title(); ?></h1>
                <div class="subtitle-h1"></div>
                <div class="neirong-other">
                    <span class="recommenders">
	                    <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" target="_blank">
											<?php the_author_meta('display_name'); ?>
										</a>
                    </span>
                    <time><?php the_time('Y-m-d H:i'); ?></time>
                    <a href="#odby" class="pinglun-num"><i class="icon-comment"></i><em class="pl-num"><?php comments_number('0', '1', '%' );?></em></a>
                    <?php the_tags('<span class="tags-box">',' ','</span>'); ?>
                </div>
                                <!--文章备注信息-->

                <div class="neirong-box" id="neirong_box" style="font-size: 14px; line-height: 24px;">
                    <table>
                        <tbody><tr>
                            <td>
                                <?php if($fmimg) { ?>
                                <span class="span-img"><img src="<?php echo $fmimg; ?>" alt="<?php the_title(); ?>"></span>
                                <?php } ?>
                                <div>
                                	<?php the_content(); ?>
                                </div>
                            </td>
                        </tr>
                    </tbody></table>
                </div>
            </div>
            
            <div class="related-list"><h3 class="t-h2"><em>您可能感兴趣的文章</em></h3><ul>
            <?php
			global $post;
			$cats = wp_get_post_categories($post->ID);
			if ($cats) {
			$args = array(
			        'category__in' => array( $cats[0] ),
			        'post__not_in' => array( $post->ID ),
			        'showposts' => 10,
			        'caller_get_posts' => 1
			    );
			query_posts($args);
			
			if (have_posts()) : 
			    while (have_posts()) : the_post(); update_post_caches($posts); ?>
            <li><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a></li>
            <?php endwhile; endif; wp_reset_query(); } ?>
            </ul><div id="interest" style="display: none;"></div></div>            <!-- 评论 -->
            <div class="pinglun" id="pinglun">
            <!-- 评论框框架 -->
        <div id="comment"><?php comments_template(); ?></div>
    </div>
            <!-- 评论/ -->
        </div>
        			<?php endwhile;?><?php endif; ?>
					<?php //echo '结束'; ?></div>
					<div class="side-container-hx">
						<?php get_sidebar(); ?>
					</div>
				</div>
<?php get_footer(); ?>