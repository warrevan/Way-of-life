<?php
ob_start();
session_start();

//set timezone
date_default_timezone_set('America/New_York');

//database credentials
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';
$dbname = 'members';

//application address
define('DIR','http://w-o-l.ml/');
define('SITEEMAIL','it@w-o-l.ml');

$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname, 8889);

?>
