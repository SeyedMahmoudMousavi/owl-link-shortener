<?php

session_start();

/**
 * Add IRON ELEPHANT library to project
 */
require_once '../alternative_func.php';

use Codecrafted\IronElephant\DB;
use Codecrafted\IronElephant\Validate;



if (is_post()) {

	// Connect to database
	$db = new DB(HOST_NAME, USER_NAME, USER_PASSWORD, DATABASE_NAME);

	if (is_null(post('link'))) {
		analyze_finish('error');
	}

	session('link', post('link'));

	// Get link from analyze.php file
	$link = post('link');

	// Testing link
	$link = Validate::inputTest($link);
	$link = trim($link, "/");

	if (et($link)) {

		// If $link value is empty
		error("Enter the desired link");
		analyze_finish('error');
	}
	if (!Validate::webAddressValidate($link) || strpos($link, WEB_ADDRESS) !== 0) {

		// Check $link value for wrong address
		error("You entered the wrong link");
		analyze_finish('error');
	}

	// Remove main web address from link
	$short_url = str_replace(WEB_ADDRESS, "", $link);
	$short_url = trim($short_url, '/');

	$link_status = $db->select(
		["long_url", "visit", "create_date", "last_visit_date"],
		"link",
		"short_url='$short_url'"
	);

	// If short url not found
	if (empty($link_status)) {

		error("You entered the wrong link");
		analyze_finish('error');
	}

	// Get data for user
	$_SESSION['long_url'] = urldecode($link_status[0]['long_url']);
	$_SESSION['short_url'] = $short_url;
	$_SESSION['visit'] = $link_status[0]['visit'];
	$_SESSION['last_visit_date'] = $link_status[0]['last_visit_date'];
	$_SESSION['create_date'] = $link_status[0]['create_date'];
	analyze_finish('result');
}
