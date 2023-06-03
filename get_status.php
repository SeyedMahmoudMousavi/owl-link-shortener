<?php

session_start();

/**
 * Add IRON ELEPHANT library to project
 */
require_once __DIR__ . "/main.php";
require_once 'vendor/autoload.php';

use IronElephant\Connection;
use IronElephant\Security;



if (is_post()) {

	// Connect to database
	$db = new Connection(HOST_NAME, USER_NAME, USER_PASSWORD, DATABASE_NAME);

	// Get link from analyze.php file
	$link = $_POST['link'];

	// Testing link
	$link = Security::inputTest($link);
	$link = trim($link, "/");

	if (et($link)) {

		// If $link value is empty
		$_SESSION["error"] = "لینک مورد نظر را وارد کنید";
		analyze_finsish();
	}
	if (!Security::webAddressValidate($link) || strpos($link, WEB_ADDRESS) !== 0) {

		// Check $link value for wrong address
		$_SESSION["error"] = "لینک را اشتباه وارد کردید";
		analyze_finsish();
	}

	// Remove main web address from link
	$short_url = str_replace(WEB_ADDRESS, "", $link);
	$short_url = trim($short_url, '/');

	$link_status = $db->select(
		["long_url", "visit", "create_date", "last_visit_date"],
		"link",
		"short_url='$short_url'"
	);

	// If short url not founded 
	if (empty($link_status)) {

		$_SESSION["error"] = "لینک را اشتباه وارد کردید";
		analyze_finsish();
	}

	// Get data for user
	$_SESSION['long_url'] = urldecode($link_status[0]['long_url']);
	$_SESSION['short_url'] = $short_url;
	$_SESSION['visit'] = $link_status[0]['visit'];
	$_SESSION['last_visit_date'] = $link_status[0]['last_visit_date'];
	$_SESSION['create_date'] = $link_status[0]['create_date'];
	analyze_finsish();
}