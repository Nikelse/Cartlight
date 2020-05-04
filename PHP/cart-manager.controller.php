<?php
/* eShopCart - cart manager controller */

require_once("webkit-manager.class.php");
require_once( _SOURCES_ . "/cart-manager.class.php" );

$CM = new CartManager();
$WEBKIT = new Webkit();

$OUTPUT = NULL;

/* delete item from cart */
if ( isset($_GET['delpdt']) && is_numeric($_GET['delpdt'])
&& array_key_exists($_GET['delpdt'], $_SESSION['CART']) ) {

    $CM->DeleteCartProduct( $_GET['delpdt'] );
    $OUTPUT = $WEBKIT->MsgItemDeleted();

  }
/* cart reservation options */
else if (isset($_GET['placeorder']) && sizeof($_SESSION['CART'])) {
  if ($GLOBALS['CONFIG']['ExportOrder']) {

    $ticket = $CM->ExportCartData();
    $CM->ResetCart();
    if ($GLOBALS['CONFIG']['ExportCookie']) $CM->CookieSave($ticket['full']);
    $OUTPUT = $WEBKIT->MsgOrderValidated($ticket['number']);

    }
  }

$WEBKIT->StartHTML();
$WEBKIT->Content($OUTPUT);
$WEBKIT->ShowCartDetails( $DATAS, $_SESSION['CART'] );
$WEBKIT->EndHTML();

?>