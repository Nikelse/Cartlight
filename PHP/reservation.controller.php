<?php
/* eShopCart - reservation controller
* author @NikelseDev */

require_once("webkit-reservation.class.php");
require_once( _SOURCES_ . "/reservation.class.php" );

$RM = new ReservationManager();
$WEBKIT = new Webkit();
$OUTPUT = NULL;

if ( isset($_GET['placeorder']) && !empty($_GET['placeorder']) ) {

  $path = $GLOBALS['CONFIG']['Export_Path'].$GLOBALS['CONFIG']['ExportOrderName'].strval($_GET['placeorder']).$GLOBALS['CONFIG']['ExportOrderExt'];
  if (file_exists( $path )) {

    $OUTPUT = $WEBKIT->DataCartDetails( $DATAS, Fonctions::ReadReservationDatas( $path ) );

  }
}

$OUTPUT .= $WEBKIT->ShowListOrder($RM->ORDERS);

$WEBKIT->StartHTML(sizeof($RM->ORDERS));
$WEBKIT->Content($OUTPUT);
$WEBKIT->EndHTML();

?>