<?php
/*
 * PIP v0.5.3
 */

//Start the Session
session_start();


// Defines
define('ROOT_DIR', realpath(dirname(__FILE__)) .'/');
define('APP_DIR', ROOT_DIR .'core/');

define("HOST", "localhost"); 			// The host you want to connect to.
define("USER", "root"); 			// The database username.
define("PASSWORD", "A9zh6p3d"); 	// The database password.
define("DATABASE", "ping_db");             // The database name.

define("CAN_REGISTER", "any");
define("DEFAULT_ROLE", "member");

/**
 * Is this a secure connection?  The default is FALSE, but the use of an
 * HTTPS connection for logging in is recommended.
 *
 * If you are using an HTTPS connection, change this to TRUE
 */
define("SECURE", FALSE);    // For development purposes only!!!!



// Define base URL
global $config;
define('BASE_URL', $config['base_url']);
define('BASE_DIR', $config['base_dir']);

// Includes
require(ROOT_DIR .'system/delta.php');


/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but production will hide them.
 */

define('ENVIRONMENT', 'development');

if (defined('ENVIRONMENT')) {
    switch (ENVIRONMENT) {
        case 'development':
            error_reporting(E_ALL);
            ini_set("display_errors", 1);
            break;
        case 'production':
            error_reporting(0);
            break;
        default:
            exit('The application environment is not set correctly.');
    }
}


?>
