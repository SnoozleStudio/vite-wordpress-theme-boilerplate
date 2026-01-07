<?php

/**
 * SnoozleWordPressVite's functions and definitions
 *
 * @package SnoozleWordPressVite
 * @since SnoozleWordPressVite 1.0
 */

/**
 * First, let's set the maximum content width based on the theme's
 * design and stylesheet.
 * This will limit the width of all uploaded images and embeds.
 */
if (! isset($content_width)) {
	$content_width = 800; /* pixels */
}


if (! function_exists('snoozle_wordpress_vite_setup')) :
	/**
	 * Sets up theme defaults and registers support for various
	 * WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme
	 * hook, which runs before the init hook. The init hook is too late
	 * for some features, such as indicating support post thumbnails.
	 */
	function snoozle_wordpress_vite_setup()
	{
		/**
		 * Make theme available for translation.
		 * Translations can be placed in the /languages/ directory.
		 */
		load_theme_textdomain('snoozle-wordpress-vite', get_template_directory() . '/languages');

		/**
		 * Add default posts and comments RSS feed links to <head>.
		 */
		add_theme_support('automatic-feed-links');

		/**
		 * Enable support for post thumbnails and featured images.
		 */
		add_theme_support('post-thumbnails');

		add_theme_support("title-tag");

		/**
		 * Add support for two custom navigation menus.
		 */
		register_nav_menus(array(
			'primary'   => __('Primary Menu', 'snoozle-wordpress-vite'),
			'secondary' => __('Secondary Menu', 'snoozle-wordpress-vite'),
		));

		/**
		 * Enable support for the following post formats:
		 * aside, gallery, quote, image, and video
		 */
		add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video'));
	}
endif; // snoozle_wordpress_vite_setup
add_action('after_setup_theme', 'snoozle_wordpress_vite_setup');

add_action('wp_enqueue_scripts', function () {
	$manifestPath = get_theme_file_path('dist/.vite/manifest.json');

	// Check if the manifest file exists and is readable before using it
	if (file_exists($manifestPath)) {
		$manifest = json_decode(file_get_contents($manifestPath), true);

		// Check if the file is in the manifest before enqueuing
		if (isset($manifest['src/scripts/main.js'])) {
			wp_enqueue_script('theme', get_theme_file_uri('dist/' . $manifest['src/scripts/main.js']['file']));
			// Enqueue the CSS file
			wp_enqueue_style('theme', get_theme_file_uri('dist/' . $manifest['src/scripts/main.js']['css'][0]));
		}
	}
});
