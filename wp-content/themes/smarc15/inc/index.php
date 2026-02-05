<?php

require_once 'comments.php';
require_once 'enqueue.php';
require_once 'yoast.php';

// Disable XML-RPC
add_filter('xmlrpc_enabled', '__return_false');