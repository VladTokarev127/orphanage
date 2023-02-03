<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo('charset'); ?>">

	<title><?php echo wp_get_document_title(); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<meta property="og:image" content="path/to/image.jpg">
	<link rel="shortcut icon" href="<?php the_field('favicon', 'options'); ?>" type="image/x-icon">
	<meta name="format-detection" content="telephone=no">
	<meta http-equiv="x-rim-auto-match" content="none">

	<!-- Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="#000">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="#000">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#000">

	<style>body { opacity: 0; overflow-x: hidden; } html { background-color: #fff; }</style>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="wrapper">

	<header class="header">
		<div class="container">

			<div class="header__logo">
				<a href="/"><img src="<?php echo esc_url(get_field('logo', 'options')['url']); ?>" alt="<?php echo get_field('logo', 'options')['alt']; ?>"></a>
			</div>
			<div class="header__info">
				<nav class="header__nav">
					<?php 
						wp_nav_menu([
							'menu'            => 'menu',
							'container'       => '',
						]);
					?>
				</nav>
				<div class="header__help">
					<a href="/helps" class="btn">Как помочь</a>
				</div>
				<div class="header__social">
					<?php while( the_repeater_field('socials', 'options') ): ?>
						<a href="<?php the_sub_field('link'); ?>"><img src="<?php echo esc_url(get_sub_field('img')['url']); ?>" alt="<?php echo get_sub_field('img')['alt']; ?>"></a>
					<?php endwhile; ?>
				</div>
			</div>

			<button class="header__menu"><span></span></button>

		</div>
	</header>

	<main class="main">