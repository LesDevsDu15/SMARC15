<?php

require_once "remove-menu.php";
require_once "hook-role.php";




add_filter('admin_footer_text', function () {
	$title = get_option('blogname');
	$slogan = get_option('blogdescription');
	echo '© ' . date('Y') . ' ' . $title . ' - ' . $slogan;
});
