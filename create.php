<?php

/**
 * Add IRON ELEPHANT library to project
 */
require_once __DIR__ . "/main.php";
require_once 'vendor/autoload.php';

use IronElephant\Connection, IronElephant\Security;

session_start();

/**
 * Go to index.php file
 *
 * @return void
 */

// Connect to database
$db = new Connection(HOST_NAME, USER_NAME, USER_PASSWORD, DATABASE_NAME);

// Testing long url 
$long_url = Security::inputTest($_REQUEST['long_url']);
$long_url = trim($long_url, '/');
$_SESSION['long_url'] = $long_url;

// Check for null data
if (et($long_url)) {

    $_SESSION['error'] = 'لینک مورد نظر را وارد کنید';
    finsish();
}

// Check $long_url for validating
if (!Security::webAddressValidate($long_url)) {

    $_SESSION['error'] = 'لینک را اشتباه وارد کردید';
    finsish();
}

// Check short address
$short_url = Security::inputTest($_REQUEST['short_address']);
$_SESSION['short_url'] = $short_url;

// Cehck empty $short_url and generate new string number
if (et($short_url)) {
    $short_url = randomatic("n", 10);
    $_SESSION['short_url'] = $short_url;
}

// Check $short_url for valid string
if (!Security::patternString($short_url, ALLCHARS)) {
    $_SESSION['error'] =
        'نام مورد نظر غیر مجاز میباشد';
    finsish();
}

// Check $short_url for confilit and duplication
if ($short_url === $db->find("short_url", "link", "short_url='$short_url'")) {
    $_SESSION['error'] =
        'نام مورد نظر وجود دارد, لطفا نام دیگری وارد کنید';
    finsish();
}

// Get time now
$date_now = date('Y-m-d H:i:s a');

// Insert new link to database
$long_url = urlencode($long_url);
$db->insert(
    "link",
    ['long_url', 'short_url', 'create_date'],
    [$long_url, $short_url, $date_now]
);

finsish();
