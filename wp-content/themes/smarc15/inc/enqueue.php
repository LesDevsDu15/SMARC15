<?php
/**
 * Twenty Twenty-Five Child - functions
 */
add_action('wp_enqueue_scripts', function () {
	// Parent style (handle may differ depending on the theme, but this works reliably)
	wp_enqueue_style(
		'twentytwentyfive-parent',
		get_template_directory_uri() . '/style.css',
		[],
		wp_get_theme('twentytwentyfive')->get('Version')
	);

	// Child style
	wp_enqueue_style(
		'twentytwentyfive-child',
		get_stylesheet_uri(),
		['twentytwentyfive-parent'],
		wp_get_theme()->get('Version')
	);
});