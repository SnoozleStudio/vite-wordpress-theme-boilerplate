<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<div id="page" class="site">

		<?php bloginfo('name'); ?>

		<?php
		if (has_nav_menu('primary')) {
			wp_nav_menu(array(
				// 'menu_id' => 'menu-primary',
				// 'menu_class' => "",
				// 'container'			=> false,
				'theme_location' => 'primary',
				// 'list_item_class'  => '',
				// 'link_class'   => ''
			));
		}
		?>

		<div id="content" class="site-content">