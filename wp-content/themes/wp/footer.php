<footer class="footer" id="page-footer">
	<div>
		<p>
		<?php 
			get_links(-1, '', '', '', 0, 'rand', 0, 0, 30);timer_stop(1);
		?>
		</p><!--//友情链接-->
	</div>
</footer>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write(unescape('%3Cscript src="http://jquery.com/jquery-wp-content/themes/jquery/js/jquery-1.9.1.min.js"%3E%3C/script%3E'))</script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/bootstrap.min.js"></script>
<script>
$(function(){
	$('.readers a').tooltip();
})	
</script>
</body>
</html>