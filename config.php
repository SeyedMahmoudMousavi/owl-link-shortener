<?php

date_default_timezone_set("asia/tehran");

/**
 * @var string WEB_ADDRESS Create const web address
 */
if ($_SERVER['SERVER_PORT'] === 443) {
	define(
		'WEB_ADDRESS',
		'https://' . $_SERVER["HTTP_HOST"]
	);
}
else{
	define(
		'WEB_ADDRESS',
		'http://' . $_SERVER["HTTP_HOST"]
	);
}

/**
 * @var string LOWERCHARS Define const lower char free to use
 */
define("LOWERCHARS", "abcdefghijklmnopqrstuvwxyz");
/**
 * @var string UPPERCHARS Define const upper char free to use
 */
define("UPPERCHARS", "ABCDEFGHIJKLMNOPQRSTUVWXYZ");
/**
 * @var string NUMBERCHARS Define const number char free to use
 */
define("NUMBERCHARS", "0123456789");
/**
 * @var string OTHERCHARS Define const other char free to use
 */
define("OTHERCHARS", " .-_");
/**
 * @var string BASICCHARS Define const basic char free to use
 */
define("BASICCHARS", LOWERCHARS . UPPERCHARS . NUMBERCHARS);
/**
 * @var string ALLCHARS Define const all char free to use
 */
define("ALLCHARS", BASICCHARS . OTHERCHARS);

/**
 * Database config variable
 * @var string HOST_NAME Database server(host) name
 */
define("HOST_NAME", 'localhost');
/**
 * Database config variable
 * @var string USER_NAME User name
 */
define("USER_NAME", 'root');
/**
 * Database config variable
 * @var string USER_PASSWORD User pass
 * 
 */
define("USER_PASSWORD", '');
/**
 * Database config variable
 * @var string DB_NAME Database name
 */
define("DATABASE_NAME", 'ols');
