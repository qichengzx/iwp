<? get_header(); ?>
<nav id="breadcrumb">
	<!-- <ol class="breadcrumb clearfix nobdr">
		<li><a href="#">Home</a></li>
		<li><a href="#">Library</a></li>
		<li class="active">Data</li>
	</ol> -->
	<?php seobreadcrumbs();?>
</nav>
<section>
	<div class="warp">
		<div id="content" class="article-content">
			<?php while ( have_posts() ) : the_post(); ?>
			<!--详情头部-->
			<header class="a-header">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); if(is_sticky()){echo "<span>置顶</span>";}?></a></h2>
				<div class="info"><?php entry_author(); ?><?php entry_date(); ?><!-- <span>200次浏览</span> --><span><a href="<?php the_permalink(); ?>#comments"><?php comments_number('0', '1', '%' );?>条评论</a></span><span><?php entry_cate(); ?></span></div>
			</header>
			<!--详情内容-->
			<article class="a-article">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', '' ) ); ?>
			</article>
			<!--详情底部-->
			<footer class="a-footer">
				<div class="a-cate">
					<span>所属分类：<?php entry_cate(); ?></span>
				</div>
				<div>
					<?php the_tags('<span>标签: ', ', ', '</span>'); ?>
				</div>
				<div class="a-share">
					<span>赶快分享：<a href="">XXX</a></span>
				</div>
				<div class="a-nav clearfix">
					<div><?php previous_post_link('上一篇 &gt;：%link') ?></div>
					<div><?php next_post_link('下一篇 &gt;：%link') ?></div>
				</div>
				<div class="a-relates">
					<h3>与本文相关的文章</h3>
					<ul>
						
					<?php
						$post_num = 10; 
						global $post;
						$tmp_post = $post;
						$tags = ''; $i = 0;
						if ( get_the_tags( $post->ID ) ) {
						foreach ( get_the_tags( $post->ID ) as $tag ) $tags .= $tag->name . ',';
							$tags = strtr(rtrim($tags, ','), ' ', '-');
							$myposts = get_posts('numberposts='.$post_num.'&tag='.$tags.'&exclude='.$post->ID);
						foreach($myposts as $post) {
							setup_postdata($post);
						?>
						<li><a href="<?php the_permalink(); ?>"><?php echo cut_str($post->post_title,54); ?></a></li>
						<?php
							$i += 1;
							}
						}
						if ( $i < $post_num ) {
							$post = $tmp_post; setup_postdata($post);
							$cats = ''; $post_num -= $i;
							foreach ( get_the_category( $post->ID ) as $cat ) $cats .= $cat->cat_ID . ',';
								$cats = strtr(rtrim($cats, ','), ' ', '-');
								$myposts = get_posts('numberposts='.$post_num.'&category='.$cats.'&exclude='.$post->ID);
							foreach($myposts as $post) {
								setup_postdata($post);
						?>
						<li><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></li>
						<?php
							}
							}
							$post = $tmp_post; setup_postdata($post);
						?>
					</ul>
				</div>
			</footer>
			<?php endwhile; ?>
			<?php comments_template(); ?>
			<!--  -->
		</div>
	</div>
	<?php get_sidebar(); ?>
</section>
<? get_footer(); ?>