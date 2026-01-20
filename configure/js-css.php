<?php

add_action('wp_enqueue_scripts', function () {
	$manifestPath = get_theme_file_path('assets/dist/.vite/manifest.json');

	// Check if the manifest file exists and is readable before using it
	if (file_exists($manifestPath)) {
		$manifest = json_decode(file_get_contents($manifestPath), true);

		// Check if the file is in the manifest before enqueuing
		if (isset($manifest['src/js/main.js'])) {
			wp_enqueue_script('theme', get_theme_file_uri('assets/dist/' . $manifest['src/js/main.js']['file']));
			// Enqueue the CSS file
			wp_enqueue_style('theme', get_theme_file_uri('assets/dist/' . $manifest['src/js/main.js']['css'][0]));
		}
	}
});
