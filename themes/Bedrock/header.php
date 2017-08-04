<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="theme-color" content="#ffffff">

		<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>

		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen">
		<link href="https://fonts.googleapis.com/css?family=Roboto+Slab|Roboto:400,700" rel="stylesheet">

		<link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon">
		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon">

		<?php wp_head(); ?>
	</head>
	<body>

		<div class="spacer"></div>

		<header>
			<div class="screen-overlay"></div>
			<div class="container">
				<div class="open-menu-btn"><span></span></div>
					<div class="logo">
						<a href="/"><img class="img-responsive" src="<?= get_field('logo', 'contacts'); ?>"></a>
					</div>
					<nav><?php wp_nav_menu( array( 'theme_location' => 'main') ); ?></nav>
				</div>
			</div>
		</header>