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
public function StartHTML () {
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
      <i class='material-icons'>local_offer</i> MY ORDERS</h1>
    </div>
  </div>";
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