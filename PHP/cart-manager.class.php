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

/* export id and quantity into csv file for further implementation */
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
  $filename = "Order-".$date->format('Y-m-d-H-i-s')."-".$hash."-".$rand.".csv";

  file_put_contents( $GLOBALS['CONFIG']['Export_Path'].$filename, $csv_data );

  return $rand;
  }

/* export Json */
public function ExportJsonOrderData () {
  $json_data = json_encode($_SESSION['CART']);
  file_put_contents('myfile.json', $json_data);
  }

}

?>