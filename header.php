<?php
 /*
 *
 * @since Wp 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="author" content="启程">
<meta name="application-name" content="qicheng.me">
<?php include('seo.php'); ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/assets/css/bootstrap.min.css">
<?php if(!wp_is_mobile()):?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/assets/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/assets/css/buttons.min.css">
<?php endif?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
<!--[if lt IE 9]>
<script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
<![endif]-->
</head>
<body>
<header class="header" id="header">
	<div class="clearfix">
		<h1 id="logo" class="pull-left" rel="home">
			<?php if(get_option("z_logo")){?>
				<a href="<?php echo bloginfo('url'); ?>" title="首页"><img src="<?php echo bloginfo('stylesheet_directory').'/'.get_option('z_logo') ?>" height="50"/></a>
			<?php }else{ ?>
				<a href="<?php echo bloginfo('url'); ?>" title="首页">
			<?php bloginfo( 'name' ); ?>
				</a>
			<?php } ?>
		</h1>
		
		<nav id="head-nav" class="pull-left" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'header-menu','container'=>'ul','container_id'=>'container1', 'menu_class' => 'nav-menu clearfix') ); ?>
		</nav>
		<div class="head-tool pull-right">
			<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
				<input id="searchsubmit" type="submit" value="搜索" class="button glow button-flat-primary pull-right"/>
				<input type="text" name="s" id="search" placeholder="请输入搜索内容" class="swap_value form-control pull-right" x-webkit-speech/>
			</form>
		</div>
	</div>
</header>
