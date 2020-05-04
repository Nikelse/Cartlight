<?php
/* eShopCart - Package root module loading
* author @NikelseDev */

namespace eShopCart;
use eShopCart as eSC;

session_start();

define( "_CONFIG_" ,"CONFIG");
define( "_SOURCES_" , "PHP");
define( "_FILES_" , "FILES");

/* CLIENT CONFIG FILE LOADING
* php config vars setup application
------------------------------------------------------------ */
require_once( _CONFIG_ . "/config.inc.php" );
$GLOBALS["CONFIG"] = $CONFIG;
$GLOBALS["PRODUCT"] = $PRODUCT;

require_once( _SOURCES_ . "/server.config.php" );

/* DEPENDENCIES
------------------------------------------------------------ */
require_once( _SOURCES_ . "/fonctions.static.php" );
$DATAS = \Fonctions::ReadObjectDatas( _CONFIG_ . "/" . $PRODUCT['File_Product'] );

/* empty cart at start */
if ( !isset($_SESSION['CART']) ) { $_SESSION['CART'] = array(); }

/* ajax injection in the cart session */
if (isset($_GET['cart-module'])) {
  require_once( _SOURCES_ . "/cart-module.ajax.php" );
  }
/* manager controller */
else if (isset($_GET['cart-manager'])) {
  require_once( _SOURCES_ . "/cart-manager.controller.php" );
  }
/* reservation controller */
else if (isset($_GET['reservation-manager']) && $GLOBALS['CONFIG']['Reservation']) {
  require_once( _SOURCES_ . "/reservation.controller.php" );
  }

/* DEMONSTRATION loading default package for example of use
-----------------------------------------------------------------*/
else if ($GLOBALS['CONFIG']['Demonstration']) {

  /* DEMO create a list of product loaded from source file product */
  require_once( "demonstration.static.php" );

  /* DEMO create a list of product loaded from source file product */
  \Demonstration::CreateObjectListForm($DATAS);
  }

?>