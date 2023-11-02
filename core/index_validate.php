<?php

require_once '../alternative_func.php';

use Codecrafted\IronElephant\DB;
use Codecrafted\IronElephant\Validate;

if (is_post()) {

    $db = new DB(HOST_NAME, USER_NAME, USER_PASSWORD, DATABASE_NAME);

    $short_url = post('ajax');
    $short_url = Validate::inputTest($short_url);

    if (!et($short_url) && Validate::patternString($short_url, ALLCHARS)) {

        if ($db->find('short_url', 'link', "short_url='$short_url'") === $short_url) {
            echo "This short name has already been taken, please select another name";
        } else {
            echo "Congratulations, you can use this short name.";
        }
    } else {
        echo "Short name must be [a-z|A-Z|0-9|.-_] ";
    }
}
