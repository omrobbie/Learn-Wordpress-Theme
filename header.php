<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php echo bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title('|', true, 'right'); ?></title>
	<link rel="pingback" href="<?php echo bloginfo('pingback_url'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('stylesheet_url'); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header role="banner">
		<div class="container">
			<div class="row header">
				<div class="col-md-12">
					<a href="<?php echo esc_url(home_url('/')); ?>">
						<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/logo.png" alt="wordpress theme" class="title-image">
						<!-- data dari bloginfo di ganti dengan gambar logo.png
						<h1>
							<?php echo bloginfo('name'); ?><br>
							<small><?php echo bloginfo('description'); ?></small>
						</h1>
						-->
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<nav id="site-navigation" class="navbar navbar-inverse" role="navigation">
						<div class="navbar-header">
							<button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menuku">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div id="menuku" class="collapse navbar-collapse">
							<?php
								wp_nav_menu(array(
									'theme_location'	=> 'primary',
									'menu_class'		=> 'nav navbar-nav',
									'menu_id'			=> 'primary-menu'
								));
							?>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</header>