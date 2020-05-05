<?php
/* eShopCart - Reservation
* author @NikelseDev */

class ReservationManager {

public $ORDERS = array();

public function __construct ( ) {
  $this->LoadCookie();
 }

public function LoadCookie () {
  if (isset($_COOKIE['PlaceOrders']) && !empty($_COOKIE['PlaceOrders'])) {
    $unserial = @unserialize($_COOKIE['PlaceOrders']);
    $this->ORDERS = (!empty($unserial)) ? $unserial : array();
  }
}

}

?>