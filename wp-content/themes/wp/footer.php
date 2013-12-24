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