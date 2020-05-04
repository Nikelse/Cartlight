<?php
/* eShopCart - reservation controller
* seller / admin section
* author @NikelseDev */

require_once("webkit-reservation.class.php");
require_once( _SOURCES_ . "/reservation-manager.class.php" );

$RM = new ReservationManager();
$WEBKIT = new Webkit();

$WEBKIT->StartHTML();


$WEBKIT->EndHTML();

?>