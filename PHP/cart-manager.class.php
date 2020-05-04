<?php
/* eShopCart - Cart manager
* author @NikelseDev */

class CartManager {

public function __construct ( ) { }

/* remove item from cart */
public function DeleteCartProduct ( $varval ) {
  unset($_SESSION['CART'][$varval]);
  }

/* reset cart products */
public function ResetCart () {
  $_SESSION['CART'] = array();
}

/* export id and quantity into csv file for consulting reservation */
public function ExportCartData () {
  $csv_data = null;

  /* formatting csv datas */
  foreach ($_SESSION['CART'] as $ROW) {
    $csv_data .= strval($ROW['id-product']) . ";" . strval($ROW['qty-product']) . "\r\n";
    }

  $date = new DateTime();
  $rand = null;
  /* ticket generator used for command and salt hash */
  for ($x=0;$x<=4;$x++) $rand.=chr(97 + mt_rand(0, 25));
  /* hash to generate unique file name */
  $hash = hash('md5',$csv_data.$rand);
  $filegen = $date->format('Y-m-d-H-i-s')."-".$hash."-".$rand;

  $filename = "Order-".$filegen.".csv";
  file_put_contents( $GLOBALS['CONFIG']['Export_Path'].$filename, $csv_data );

  return array("full"=>$filegen, "number"=>$rand);
  }

public function CookieSave ( $name ) {
  if (isset($_COOKIE['PlaceOrders']) && !empty($_COOKIE['PlaceOrders'])) {
    $list_cook = unserialize($_COOKIE['PlaceOrders']);
    array_push($list_cook, $name);
    $list_cook = serialize($list_cook);
    }
  else {
    $list_cook = serialize(array($name));
    }
    setcookie("PlaceOrders", $list_cook, time()+365*24*60*60);
  }

}

?>