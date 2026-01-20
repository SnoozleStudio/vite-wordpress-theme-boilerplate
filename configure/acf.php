<?php

/**
 * File: acf.php
 * Relative Path: configure/acf.php
 */

// ACF functions here

// Define the path to the theme's directory
if (!defined('MY_THEME_DIR_PATH')) {
	define('MY_THEME_DIR_PATH', untrailingslashit(get_template_directory()));
}

// Filter to set the save path for ACF JSON file
add_filter('acf/settings/save_json', 'ss_acf_json_save_point');
function ss_acf_json_save_point($path)
{
	// Update the save path to a folder within the theme
	$path = MY_THEME_DIR_PATH . '/acf-json';
	return $path;
}

// Filter to set the load paths for ACF JSON file
add_filter('acf/settings/load_json', 'snoozle_wordpress_vite_acf_json_load_point');
function snoozle_wordpress_vite_acf_json_load_point($path)
{
	// Remove the default ACF JSON path
	unset($path[0]);
	// Add our custom path
	$paths[] = MY_THEME_DIR_PATH . '/acf-json';
	return $paths;
}
