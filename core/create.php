<?php

/**
 * Add IRON ELEPHANT library to project
 */
require_once __DIR__ . "/../main.php";
require_once '../vendor/autoload.php';

use IronElephant\Connection, IronElephant\Security;

session_start();

/**
 * Go to index.php file
 *
 * @return void
 */

// Connect to database
$db = new Connection(HOST_NAME, USER_NAME, USER_PASSWORD, DATABASE_NAME);

if (!isset($_REQUEST['long_url']) || !isset($_REQUEST['short_url'])) {
    finish('error');
}

$_SESSION['long_url'] = $_REQUEST['long_url'];
$_SESSION['short_url'] = $_REQUEST['short_url'];

// Testing long url 
$long_url = Security::inputTest($_REQUEST['long_url']);
$long_url = trim($long_url, '/');

// Check for null data
if (et($long_url)) {

    $_SESSION['error'] = 'You entered the wrong link';
    finish('error');
}

// Check $long_url for validating
if (!Security::webAddressValidate($long_url)) {

    $_SESSION['error'] = 'You entered the wrong link';
    finish('error');
}

// Check $long_url for string length
if (strlen($long_url) > 2000) {

    $_SESSION['error'] = 'Sorry you entered very long link';
    finish('error');
}

// Check short address
$short_url = Security::inputTest($_REQUEST['short_url']);

// Cehck empty $short_url and generate new string number
if (et($short_url)) {
    $short_url = randomatic("n", 10);
}

// Check $short_url for valid string
if (!Security::patternString($short_url, ALLCHARS)) {
    $_SESSION['error'] =
        'The desired name is not allowed';
    finish('error');
}

// Check $long_url for string length
if (strlen($short_url) > 255) {

    $_SESSION['error'] = 'Sorry you entered very long string';
    finish('error');
}

// Check $short_url for confilit and duplication
if ($short_url === $db->find("short_url", "link", "short_url='$short_url'")) {
    $_SESSION['error'] =
        'The desired name exists, please enter another name';
    finish('error');
}

$not_allowed_list = ['.htaccess', 'analyze.php', 'create.php', 'easy_shorten.php', 'get_status.php', 'index.php', 'redirect.php'];

foreach ($not_allowed_list as $value) {
    if ($short_url === $value) {
        $_SESSION['error'] =
            'The desired name is not allowed';
        finish('error');
    }
}

// dd("", __LINE__, __FILE__);
// Get time now
$date_now = date('Y-m-d H:i:s a');

// Insert new link to database
$long_url = urlencode($long_url);
$result =  $db->insert(
    "link",
    ['long_url', 'short_url', 'create_date'],
    [$long_url, $short_url, $date_now]
);

if ($result) {
    $_SESSION["new_short_link"] = $short_url;
}

finish('result');
