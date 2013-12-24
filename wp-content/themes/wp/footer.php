<footer class="footer" id="page-footer">
	<div>
		<?php wp_reset_query(); if ( is_home()) { ?>
			<ul>
				<?php wp_list_bookmarks('title_li=&categorize=1&category=&orderby=id&show_images='); ?>
			</ul><!--//友情链接-->
		<?php } ?>
		<div class="footer_bottom">
			<p>Copyright <?php echo comicpress_copyright(); ?> <?php bloginfo('name'); ?>&nbsp;&nbsp;保留所有权利.
			&nbsp;&nbsp;Theme by <a target="_blank" href="http://www.qicheng.me">启程</a>
			<?php echo stripslashes(get_option('swt_track_code')); ?>
			Proudly powered by <a target="_blank" href="http://wordpress.org">WordPress</a></p>
			<?php if(get_option("z_tj")=="显示"):?>
			<p>日志：<?php $count_posts = wp_count_posts(); echo $published_posts = $count_posts->publish;?>篇 &nbsp;&nbsp;
			评论：<?php echo $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments");?>条&nbsp;&nbsp;
			分类：<?php echo $count_categories = wp_count_terms('category'); ?>个&nbsp;&nbsp;
			标签：<?php echo $count_tags = wp_count_terms('post_tag'); ?>个&nbsp;&nbsp;
			链接：<?php $link = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->links WHERE link_visible = 'Y'"); echo $link; ?>个&nbsp;&nbsp;
			网站运行：<?php echo floor((time()-strtotime(get_option('swt_builddate')))/86400); ?>天&nbsp;&nbsp;
			最后更新：<?php $last = $wpdb->get_results("SELECT MAX(post_modified) AS MAX_m FROM $wpdb->posts WHERE (post_type = 'post' OR post_type = 'page') AND (post_status = 'publish' OR post_status = 'private')");$last = date('Y年n月j日', strtotime($last[0]->MAX_m));echo $last; ?>
			<?php endif;?>
			<p>代码如诗</p>
		</div>
	</div>
</footer>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write(unescape('%3Cscript src="http://jquery.com/jquery-wp-content/themes/jquery/js/jquery-1.9.1.min.js"%3E%3C/script%3E'))</script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/bootstrap.min.js"></script>
<script>
$(function(){
	$('.readers a').tooltip();
	$('#head-nav>ul>li').hover(function(){
		$(this).children('ul').show();
	},function(){
		$(this).children('ul').hide();
	})
})	
</script>
</body>
</html>