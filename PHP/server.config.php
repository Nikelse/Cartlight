<?php

/* CLIENT CONFIG FILE LOADING
* php config vars setup application
------------------------------------------------------------ */
require_once( _CONFIG_ . "/config.inc.php");
$GLOBALS["CONFIG"] = $CONFIG;
$GLOBALS["PRODUCT"] = $PRODUCT;

date_default_timezone_set ( $CONFIG['TimeZone'] );

ini_set( 'default_charset', $CONFIG['Charset'] );
mb_internal_encoding( $CONFIG['Charset'] );
mb_http_output( $CONFIG['Charset'] );

setlocale(LC_ALL, $CONFIG['Langage'] );

ini_set('display_errors', $CONFIG['Error_Report'] );
ini_set('display_startup_errors', $CONFIG['Error_Report']);
ini_set('log_errors', !$CONFIG['Error_Report']);
if ($CONFIG['Error_Report']) error_reporting(E_ALL);

?>