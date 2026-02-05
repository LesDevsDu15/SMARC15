<?php

////How to Hide the "Yoast SEO" Meta Box
//add_action('add_meta_boxes', function () {
//	$screen = get_current_screen();
//	if ( !$screen ) {
//		return;
//	}
//	//Hide the "Yoast SEO" meta box.
//	remove_meta_box('wpseo_meta', $screen->id, 'normal');
//}, 20);

//How to Hide the "Yoast SEO Posts Overview" Dashboard Widget
add_action('wp_dashboard_setup', function() {
	$screen = get_current_screen();
	if ( !$screen ) {
		return;
	}
	//Remove the "Yoast SEO Posts Overview" widget.
	remove_meta_box('wpseo-dashboard-overview', 'dashboard', 'normal');
}, 20);

//remove yoast dashboard widget
add_action('wp_dashboard_setup', function (){
	remove_meta_box( 'wpseo-dashboard-overview', 'dashboard', 'side' );
});

add_filter( 'wpseo_sitemap_exclude_author', function () {
	return false;
} );