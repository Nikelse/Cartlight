<?php
/* eShopCart - reservation controller
* author @NikelseDev */

require_once("webkit-reservation.class.php");
require_once( _SOURCES_ . "/reservation.class.php" );

$RM = new ReservationManager();
$WEBKIT = new Webkit();
$OUTPUT = NULL;

$WEBKIT->StartHTML();
$WEBKIT->Content($OUTPUT);

$WEBKIT->EndHTML();

?>