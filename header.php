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
						<h1>
							<?php echo bloginfo('name'); ?><br>
							<small><?php echo bloginfo('description'); ?></small>
						</h1>
					</a>
				</div>
			</div>
		</div>
	</header>