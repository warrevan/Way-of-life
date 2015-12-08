<?php
ob_start();
session_start();

//set timezone
date_default_timezone_set('America/New_York');

//database credentials
define('DBHOST','localhost');
define('DBUSER','u536535282_evan7');
define('DBPASS','anaavcnM9t7');
define('DBNAME','u536535282_dbsql');

//application address
define('DIR','http://w-o-l.ml/');
define('SITEEMAIL','it@w-o-l.ml');

try {

	//create PDO connection
	$db = new PDO("mysql:host=".DBHOST.";port=8889;dbname=".DBNAME, DBUSER, DBPASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
	//show error
    echo '<p>'.$e->getMessage().'</p>';
    exit;
}

//include the user class, pass in the database connection
include('classes/user.php');
$user = new User($db);

?>
