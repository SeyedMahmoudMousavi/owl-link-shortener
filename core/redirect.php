<?php
session_start();

/**
 * Add IRON ELEPHANT library to project
 */
require_once __DIR__ . "/../main.php";
require_once '../vendor/autoload.php';

use IronElephant\Connection;
use IronElephant\Security;

// Connect to database
$db = new Connection(HOST_NAME, USER_NAME, USER_PASSWORD, DATABASE_NAME);

// Check and sanitize sufix uri 
$uri = $_SERVER['REQUEST_URI'];
$uri = Security::inputTest($uri);
$uri = trim($_SERVER['REQUEST_URI'], "/");

// If short suffix uri is empty return to home
if (et($uri)) {
	finish();
}

// Get long url from database
$long_url = $db->find("long_url", "link", "short_url='$uri'");
$long_url = urldecode($long_url);

// If long url is not found this addres is wrong
if (et($long_url)) {
	$_SESSION["error"] = "There is no address";
	finish();
} else {

	// Get count of visited link from data
	$visit = (int) $db->find("visit", "link", "short_url='$uri'");
	// Increase one visited value
	$visit++;

	// Get data now
	$date_now = date("Y-m-d H:i:s a");

	// Updata visit value and last visit time in database
	$db->update(
		"link",
		[
			'visit' 			=> $visit,
			'last_visit_date' 	=> $date_now,
		],
		"short_url='$uri'"
	);

	// Redirect to original link
	change_url($long_url);
	die;
}
