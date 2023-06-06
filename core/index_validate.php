<?php

require_once __DIR__ . "/../main.php";
require_once '../vendor/autoload.php';

use IronElephant\Connection;
use IronElephant\Security;

if (is_post()) {

    $db = new Connection(HOST_NAME, USER_NAME, USER_PASSWORD, DATABASE_NAME);

    $short_url = $_POST['ajax'];
    $short_url = Security::inputTest($short_url);

    if (!et($short_url) && Security::patternString($short_url, ALLCHARS)) {

        if ($db->find('short_url', 'link', "short_url='$short_url'") === $short_url) {
            echo "This short name has already been taken, please select another name";
        } else {
            echo "Congratulations, you can use this short name.";
        }
    } else {
        echo "Short name must be [a-z|A-Z|0-9|.-_] ";
    }
}
