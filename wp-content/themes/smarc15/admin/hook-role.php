<?php

////Show all role
//add_action('wp_loaded', function () {
//	global $wp_roles;
//	dump($wp_roles);
//}, 10000);

// Supprimer le rôle "author"
add_action('init', function () {
	remove_role("translator");
	remove_role("translator");
	remove_role("contributor");
	remove_role("subscriber");
	remove_role("wpseo_manager");
	remove_role("shop_manager");
});

// Modifier le rôle "customer" par "Particuler"
add_action('init', function () {
	global $wp_roles;
	if ( ! isset( $wp_roles ) ) $wp_roles = new WP_Roles();
	// Changer le nom d'affichage pour le rôle "customer"
	if ( isset( $wp_roles->roles['customer'] ) ) {
		$wp_roles->roles['customer']['name'] = 'Client';
	}
});
