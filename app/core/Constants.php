<?php
//dev settings
define('SIGNATURE', parse_ini_file('/etc/config/config.ini')['key']);
define('PREFIX', parse_ini_file('/etc/config/config.ini')['prefix']);
define('DNS', parse_ini_file('/etc/config/config.ini')['DNS']);
define('AUTOLOAD', '/var/www/vhost/lib/autoload.php');

define('DB_HOST', '127.0.0.1');
define('DB_USER', 'admin');
define('DB_PASS', 'Klamka22k!');
define('DB_NAME', 'MM_CORE');