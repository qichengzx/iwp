<?php get_header(); ?>
<nav id="breadcrumb">
	<?php seobreadcrumbs();?>
</nav>
<section id="page-single" class="clearfix">
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
				<?php if(the_tags()){?>
				<div>
					<?php the_tags('<span>标签: ', ', ', '</span>'); ?>
				</div>
				<?php }?>
				<div class="a-share clearfix">
					<span class="pull-left">赶快分享：</span>
					<div class="bdsharebuttonbox">
						<a href="#" class="bds_more" data-cmd="more"></a>
						<a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a>
						<a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a>
						<a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a>
						<a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren"></a>
						<a title="分享到QQ好友" href="#" class="bds_sqq" data-cmd="sqq"></a>
						<a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a>
						<a title="分享到复制网址" href="#" class="bds_copy" data-cmd="copy"></a>
					</div>

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
<?php get_footer(); ?>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=86835285.js?cdnversion='+~(-new Date()/36e5)];</script>