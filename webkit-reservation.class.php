<?php
/* eShopCart - Cart Webkit template for Reservation
* seller / admin section
* list product and quantity of item collected, possible remove from cart
* calculate the global price to place order
* author @NikelseDev */

class Webkit {

public $money = null;

public function __construct () {
  $this->money = $GLOBALS['PRODUCT']['Money_Symbol'];
}

/* begin output for header html document */
public function StartHTML ( $nb ) {
  echo "
  <!doctype html>
  <html>
    <head>
      <title> ".$GLOBALS['CONFIG']['WebName']." &bull; Reservation</title>
      <link href='"._FILES_."/style.css' type='text/css' rel='stylesheet' />
    </head>
  <body>
  <div id='navbar' class='container'>
    <div class='box'>
      <h1>
        <a href='".$GLOBALS['CONFIG']['WebSiteUrl']."'>
        ".$GLOBALS['CONFIG']['WebName']."</a> &bull; Reservation list
      </h1>
      <i><b>Customer space :</b> retrieve your placed order</i>
    </div>
    <div id='cartsection' class='box right'>
      <h1>
      <a href='?cart-manager'><i class='material-icons'>shopping_cart</i></a>
      <i class='material-icons'>local_offer</i> MY ORDERS ($nb)</h1>
    </div>
  </div>";
}

public function ShowListOrder ( $list ) {
  $out ="
  <div class='container'>";

  if (sizeof($list)) {

    foreach ($list as $K => $order) {
      $detail = explode("-",$order);
      $out .= "
      <div class='box two success'>
      <h2>
        <i class='material-icons'>local_offer</i>
        Reservation #".($K+1)." &bull; <a href='?reservation&placeorder=".$order."'>".mb_strtoupper($detail[7])."</a>
        <sup><i>".$detail[0]."-".$detail[1]."-".$detail[2]."</i></sup>
      </h2>
      </div>";
    }

  }
else {
  $out.="<div class='boxlight one center'><i>No reservation yet.</i></div>";
  }

  $out.="
  </div>";
  return $out;
}

/* list of reservation product file extract */
public function DataCartDetails ( $datas_product, $datas_cart ) {

  $TOTAL = 0.0;

  $out = $top = null;

  foreach ($datas_cart as $K => $V) {
    $PRODUCT = $datas_product[ $V[0] ];
    $SUM = $V[1] * floatval($PRODUCT['PRICE']);

    $out .= "
    <div class='container col'>
      <div class='box'>
        <h2>&bull; ".$PRODUCT['NAME']."</h2>
      </div>
      <div class='box right'>
        <h2><i>".$V[1]." x "
        .number_format(floatval($PRODUCT['PRICE']),2)."$this->money</i> = "
        .( number_format($SUM,2) )."$this->money</h2>
      </div>
    </div>";

    $TOTAL += $SUM;
    }

  $out.="<br /><hr />";
  $top = "
  <div class='box right'>
    <h1>TOTAL = ".number_format($TOTAL,2)."$this->money</h1>
  </div>
  ";

  if ( !empty($TOTAL) ) {
    $out = $top . $out;
  }
  else {
    $out = "<i>No product in list or error in the reservation.</i>";
  }
  return $out;
}

public function Content ( $content ) {
  echo $content;
}

/* end of output for html document */
public function EndHTML () {
  echo "
      <hr />
      <div class='box right'><a href='https://twitter.com/NikelseDev'>@NikelseDev</a></div>
      <script src='https://code.jquery.com/jquery-3.5.0.min.js' type='text/javascript'></script>

    </body>
  </html>";
  }

}

?>