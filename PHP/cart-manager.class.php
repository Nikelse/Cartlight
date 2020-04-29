<?php
/* eShopCart - Cart manager
* author @NikelseDev */

class CartManager {

public function __construct ( $vars ) {
  $this->ActionManager( $vars );
  }

private function ActionManager ( $vars ) {
  if ( isset($vars['delpdt']) && is_numeric($vars['delpdt'])
  && array_key_exists($vars['delpdt'], $_SESSION['CART']) ) {
      $this->DeleteCartProduct( $vars['delpdt'] );
    }
  else if (isset($vars['placeorder'])) {
    $this->ExportCartData();
    }
  }

/* remove item from cart */
private function DeleteCartProduct ( $varval ) {
  unset($_SESSION['CART'][$varval]);
  }

private function ExportCartData () {
  $csv_data = null;
  foreach ($_SESSION['CART'] as $ROW) {
    $csv_data .= strval($ROW['id-product']) . ";" . strval($ROW['qty-product']) . "\r\n";
    }
  $date = new DateTime();
  $hash = hash('md5',$csv_data);
  $filename = "Order-".$date->format('Y-m-d-H-i-s')."-".$hash.".csv";
  file_put_contents($GLOBALS['CONFIG']['Export_Path'].$filename, $csv_data);
  }

private function ExportJsonOrderData () {
  $json_data = json_encode($_SESSION['CART']);
  file_put_contents('myfile.json', $json_data);
  }

}

/* controler */

new CartManager( $_GET );

new WebkitManager( $DATAS, $_SESSION['CART'] );

?>