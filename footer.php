<footer class="footer" id="page-footer">
	<div>
		<?php wp_reset_query(); if ( is_home() && !is_mobile() ) { ?>
			<ul>
				<?php wp_list_bookmarks('title_li=&categorize=1&category=&orderby=id&show_images='); ?>
			</ul><!--//友情链接-->
		<?php } ?>
		<div class="footer_bottom">
			<p>Copyright <?php echo comicpress_copyright(); ?> <?php bloginfo('name'); ?>&nbsp;&nbsp;保留所有权利.
			&nbsp;&nbsp;Theme by <a target="_blank" href="http://www.qicheng.me">启程</a>
			<?php echo stripslashes(get_option('swt_track_code')); ?>
			Proudly powered by <a target="_blank" href="http://wordpress.org">WordPress</a></p>
			<?php if(get_option("z_tj")=="显示" && !is_mobile()):?>
			<p>日志：<?php $count_posts = wp_count_posts(); echo $published_posts = $count_posts->publish;?>篇 &nbsp;&nbsp;
			评论：<?php echo $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments");?>条&nbsp;&nbsp;
			分类：<?php echo $count_categories = wp_count_terms('category'); ?>个&nbsp;&nbsp;
			标签：<?php echo $count_tags = wp_count_terms('post_tag'); ?>个&nbsp;&nbsp;
			链接：<?php $link = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->links WHERE link_visible = 'Y'"); echo $link; ?>个&nbsp;&nbsp;
			<?php if(get_option('z_time')){?>
			网站运行：<?php echo floor((time()-strtotime(get_option('z_time')))/86400); ?>天&nbsp;&nbsp;
			<?php }?>
			最后更新：<?php $last = $wpdb->get_results("SELECT MAX(post_modified) AS MAX_m FROM $wpdb->posts WHERE (post_type = 'post' OR post_type = 'page') AND (post_status = 'publish' OR post_status = 'private')");$last = date('Y年n月j日', strtotime($last[0]->MAX_m));echo $last; ?>
			<?php endif;?>
			<p>代码如诗</p>
		</div>
	</div>
</footer>
<a href="<?php echo bloginfo('url'); ?>" title="返回顶部" id="gotop" class="glyphicon glyphicon-arrow-up"></a>
<?php if(!is_mobile()):?>
<<<<<<< HEAD
<script src="//libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>	
=======
<script src="//libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
>>>>>>> 104c10c21949b4d501a242e474a07ba5298952a7
<script src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/bootstrap.min.js"></script>
<script>
$(function(){
	$(window).scroll(function () {
        if ($(window).scrollTop() > 100) {
            $("#gotop").fadeIn(1500);
        }
        else {
            $("#gotop").fadeOut(1500);
        }
    });
	$('#gotop').click(function(event) {
		$('html').animate( {scrollTop: 0 }, 100);
		return false;
	});
	$('.readers a').tooltip();
	$('#head-nav>ul>li').hover(function(){
		$(this).children('ul').show();
	},function(){
		$(this).children('ul').hide();
	})
})	
</script>
<?php endif;?>
</body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> 104c10c21949b4d501a242e474a07ba5298952a7
