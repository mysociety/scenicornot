<?php

//
// Global includes
//

include ROOT . '/config.php';
include ROOT . '/include/mysql.class.php';
include ROOT . '/include/sanitise.php';
include ROOT . '/include/functions.php';
include ROOT . '/include/pagefunctions.php';


//
// Connect to MySQL
//

$mySQL = new MySQL($config['mySQL']['server'], $config['mySQL']['username'], $config['mySQL']['password'], $config['mySQL']['database']); 


error_reporting(E_ALL);

session_set_cookie_params(60*60*24*365);
session_start();

?>
