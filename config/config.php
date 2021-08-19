<?php

$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';
$url = $protocol . $_SERVER['HTTP_HOST'] . '/testmenu';

define('BASE_URL', $url);

define('DB_HOST', 'localhost');
define('DB_NAME', 'menutest');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_CHARSET', 'UTF8');

?>