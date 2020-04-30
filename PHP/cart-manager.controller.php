<?php
/* eShopCart - cart manager controler */

require_once("webkit-manager.class.php");
require_once( _SOURCES_ . "/cart-manager.class.php" );

$CM = new CartManager();
$WEBKIT = new WebkitManager();

$WEBKIT->StartHTML();

if ( isset($_GET['delpdt']) && is_numeric($_GET['delpdt'])
&& array_key_exists($_GET['delpdt'], $_SESSION['CART']) ) {
    $CM->DeleteCartProduct( $_GET['delpdt'] );
    $WEBKIT->MsgItemDeleted();
  }
else if (isset($_GET['placeorder']) && sizeof($_SESSION['CART'])) {
  if ($GLOBALS['CONFIG']['ExportOrder']) {
    $ticket = $CM->ExportCartData();
    $CM->ResetCart();
    $WEBKIT->MsgOrderValidated($ticket);
    }
  }

$WEBKIT->ShowCartDetails( $DATAS, $_SESSION['CART'] );
$WEBKIT->EndHTML();

?>