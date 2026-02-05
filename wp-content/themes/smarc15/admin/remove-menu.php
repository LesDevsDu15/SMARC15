<?php

$IS_LIMITED = user_can( get_current_user_id(), 'administrator' );

//block network_admin for all user exepted ocsalis users
add_action( 'admin_init', function() use ($IS_LIMITED) {
	if ( is_network_admin() && $IS_LIMITED) {
		wp_redirect( home_url() );
		exit;
	}
});

//Apply limitation if admin is not OCSALIS user
if ($IS_LIMITED) UserLimitations();

//Remove product-reviews and product_attributes for all product
add_action( 'admin_init', function (){
//	global $submenu, $menu, $pagenow;
//	dump($submenu, $menu, $pagenow);
	remove_submenu_page("edit.php?post_type=product", 'product-reviews');
//	remove_submenu_page("edit.php?post_type=product", 'product_attributes');
});

//limitations for admin
function UserLimitations(){

	//Remove admin notice
	add_action('admin_init', function () {
		//Remove admin notice exerpt for ocsalis_pdf_notice
		add_action('admin_init', function () {
			global $wp_filter;
			if (!isset($wp_filter['admin_notices'])) {
				return;
			}
			$callbacks = $wp_filter['admin_notices']->callbacks;
			foreach ($callbacks as $priority => $group) {
				foreach ($group as $key => $callback) {
					if ($callback['function'] === 'ocsalis_pdf_notice') {
						continue;
					}
					remove_action('admin_notices', $callback['function'], $priority);
				}
			}
		});
//		remove_action('admin_notices', 'update_nag', 3);
//		remove_action('network_admin_notices', 'update_nag', 3);
//		remove_action('admin_notices', 'network_update_nag', 3);
	});

	add_filter('admin_body_class', function ($classes) {
		$classes .= ' user-limitation-admin ';
		return $classes;
	});

	//Remove acf
	add_filter('acf/settings/show_admin', '__return_false');

	//Remove from admin bar
	add_action('admin_bar_menu', function ($wp_admin_bar){
		//dump($wp_admin_bar);
		//$wp_admin_bar->remove_node('network-admin');
		$wp_admin_bar->remove_node('new-content');
		$wp_admin_bar->remove_node('wp-mail-smtp-menu');
		$wp_admin_bar->remove_node('updates');
		$wp_admin_bar->remove_node('comments');
		$wp_admin_bar->remove_node('languages');
		$wp_admin_bar->remove_node('wpseo-menu');
	},999);



	//Remove from menu bar
	add_action( 'admin_init', function (){
		/////////////
		// Plugins //
		/////////////

//		global $submenu, $menu, $pagenow;
//		dump($submenu, $menu, $pagenow);

		remove_menu_page('wpcf7'); // contact form
		remove_menu_page('members'); // wp members
		remove_menu_page('options-general.php'); // Options-general
		remove_menu_page('tools.php'); // Tools
		remove_menu_page('plugins.php'); // Plugins
		remove_menu_page('edit.php?post_type=acf-field-group'); //Acf field;
		remove_menu_page('wp-mail-smtp'); //wp-mail
		remove_menu_page( 'activity_log_page' ); // activity_log_page

		//PLugin d'import/export
		remove_menu_page('wt_import_export_for_woo_basic_export');
//		remove_menu_page('pmxi-admin-home');
//		remove_menu_page('pmxe-admin-home');
	});

	//Remove links
	add_action( 'admin_init', function () {
		$whitelist = [1];
		$restrictions = array(
			//plugins
			'/wp/wp-admin/plugins.php?plugin_status=all',
			'/wp/wp-admin/plugins.php',
			'/wp/wp-admin/plugins.php?plugin_status=active',
			'/wp/wp-admin/plugins.php?plugin_status=inactive',
			'/wp/wp-admin/plugins.php?plugin_status=mustuse',

			//ACF
			'/wp/wp-admin/edit.php?post_type=acf-field-group',
			'/wp/wp-admin/post-new.php?post_type=acf-field-group',
			'/wp/wp-admin/edit.php?post_type=acf-field-group&page=acf-tools',

			//PLugin d'import/export
//			'/wp/wp-admin/admin.php?page=pmxe-admin-export',
//			'/wp/wp-admin/admin.php?page=pmxi-admin-import',
			'/wp/wp-admin/admin.php?page=wt_import_export_for_woo_basic_export',

//			//Settings
//			'/wp/wp-admin/options-general.php',
//			'/wp/wp-admin/options-writing.php',
//			'/wp/wp-admin/options-reading.php',
//			'/wp/wp-admin/options-discussion.php',
//			'/wp/wp-admin/options-media.php',
//			'/wp/wp-admin/options-permalink.php',
//			'/wp/wp-admin/options-privacy.php',
//			'/wp/wp-admin/options-general.php?page=bp-components',

			//Accounts/users
//			'/wp/wp-admin/users.php',
//			'/wp/wp-admin/user-new.php',
//			'/wp/wp-admin/users.php?page=bp-signups',
//			'/wp/wp-admin/edit-tags.php?taxonomy=bp_member_type',
//			'/wp/wp-admin/users.php?page=bp-notices',

			//wp mail
			'/wp/wp-admin/admin.php?page=wp-mail-smtp',
			'/wp/wp-admin/admin.php?page=wp-mail-smtp&tab=logs',
			'/wp/wp-admin/admin.php?page=wp-mail-smtp-reports',
			'/wp/wp-admin/admin.php?page=wp-mail-smtp-tools',
			'/wp/wp-admin/admin.php?page=wp-mail-smtp-about',

			//woocommerce
			'/wp/wp-admin/admin.php?page=wc-addons'
		);
		foreach ( $restrictions as $restriction ) {
			if ( $_SERVER['REQUEST_URI'] == $restriction ) {
				wp_redirect( admin_url() );
				exit;
			}

		}
	} );
}
