 <?php

$file = fopen("config.php","w");
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$name = trim($url["path"], "/");
$user = trim($url["user"]);
$pass = trim($url["pass"]);
$host = trim($url["host"]);

echo fwrite($file,"
	<?php

	class Config {
    // ------------------------------------------------------------------------
    // GENERAL SETTINGS
    // ------------------------------------------------------------------------

    const BASE_URL      = 'http://easy-appoints.herokuapp.com/easyappointments';
    const LANGUAGE      = 'english';
    const DEBUG_MODE    = TRUE;

    // ------------------------------------------------------------------------
    // DATABASE SETTINGS
    // ------------------------------------------------------------------------

    const DB_HOST       = '".$host."';
    const DB_NAME       = '".$name."';
    const DB_USERNAME   = '".$user."';
    const DB_PASSWORD   = '".$pass."';

    // ------------------------------------------------------------------------
    // GOOGLE CALENDAR SYNC
    // ------------------------------------------------------------------------

    const GOOGLE_SYNC_FEATURE   = FALSE; // Enter TRUE or FALSE
    const GOOGLE_PRODUCT_NAME   = '';
    const GOOGLE_CLIENT_ID      = '';
    const GOOGLE_CLIENT_SECRET  = '';
    const GOOGLE_API_KEY        = '';
	}
	");
fclose($file);
?> 
