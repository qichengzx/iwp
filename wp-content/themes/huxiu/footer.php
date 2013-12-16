 				<footer class="footer">
					<div class="about-links">
						<?php wp_nav_menu( array( 'theme_location' => 'nav3-menu','container' => '','menu_class' => 'nav3-menu-list','before' => '','after' => '') ); ?>
					</div>
					<div class="links">
						<h3>
							<a href="javascript:;" target="_blank">
								合作伙伴
							</a>
						</h3>
						<?php wp_nav_menu( array( 'theme_location' => 'nav3-menu','container' => '','menu_class' => 'inline','before' => '','after' => '') ); ?>
					</div>
					<div class="footer-copy">
						Copyright ©
						<a href="<?php bloginfo('url'); ?>/">
							<?php bloginfo('name'); ?>
						</a> <a href="http://www.moke8.com/wordpress/" target="_blank">wordpress主题</a>
						(
						<a href="http://www.miitbeian.gov.cn/" target="_blank">
							京ICP备12013432
						</a>
						)
						<a href="<?php bloginfo('url'); ?>/" class="footer-logo">
							<?php bloginfo('name'); ?>
						</a>
					</div>
					<!-- 返回顶部 -->
					<div class="go-top">
						<i class="pos-btn" onclick="window.scrollTo('0', '0')">
							^
						</i>
					</div>
					<!-- /返回顶部 -->
				</footer>
			</div>
		</div>
		<div class="side-menu-hx" id="navbar">
			<div class="side-menu-top">
				<h1 class="logo">
					<a href="<?php bloginfo('url'); ?>/" target="_blank">
						<img src="http://www.huxiu.com/static/img/logo.png">
					</a>
				</h1>
				<?php wp_nav_menu( array( 'theme_location' => 'nav-menu','container' => '','menu_class' => 'side-menu-list','before' => '','after' => '') ); ?>
			</div>
			<div class="search">
				<form action="<?php bloginfo('url'); ?>/" method="get" class="form-search">
					<button class="search-btn">
						<i class="icon-search">
						</i>
					</button>
					<input type="text" name='s' id='s' class="input-text" placeholder="搜索"
					value="" />
				</form>
			</div>
		</div>
	</div>
</body>
<?php wp_footer(); ?>
</html>


