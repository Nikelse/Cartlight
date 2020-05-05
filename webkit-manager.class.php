<?php
/* eShopCart - Cart Webkit template for Manager
* customer section
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
      <title> ".$GLOBALS['CONFIG']['WebName']." &bull; Cart management</title>
      <link href='"._FILES_."/style.css' type='text/css' rel='stylesheet' />
    </head>
  <body>
  <div id='navbar' class='container'>
    <div class='box'>
      <h1><a href='".$GLOBALS['CONFIG']['WebSiteUrl']."'>".$GLOBALS['CONFIG']['WebName']."</a> &bull; Cart Management</h1>
      <i><b>Customer space :</b> confirm your cart list of product and place order for reservation :</i>
    </div>
    <div id='cartsection' class='box right'>
      <h1>
        <i class='material-icons'>shopping_cart</i>
        MY CART (<span name='cartstats' id='cartstats'>".sizeof($_SESSION['CART'])."</span>)
        ".(($GLOBALS['CONFIG']['Reservation'])?
          "<a href='?reservation' title='Reservation Manager'>
          <i class='material-icons'>local_offer</i></a>" : null)."
      </h1>
    </div>
  </div>";
}

/* list of product file extract */
public function ShowCartDetails ( $datas_product, $datas_cart ) {

  $TOTAL = 0.0;

  $out = null;

  foreach ($datas_cart as $K => $V) {
    $PRODUCT = $datas_product[ $V['id-product'] ];
    $SUM = $V['qty-product'] * floatval($PRODUCT['PRICE']);

    $out .= "
    <div class='container col'>
      <div class='box'>
        <h2>&bull; ".$PRODUCT['NAME']." :
          <a href='?cart-manager&delpdt=$K'><span class='material-icons' title='remove item'>delete_forever</span></a>
        </h2>
      </div>
      <div class='box right'>
        <h2><i>".$V['qty-product']." x "
        .number_format(floatval($PRODUCT['PRICE']),2)."$this->money</i> = "
        .( number_format($SUM,2) )."$this->money</h2>
      </div>
    </div>";

    $TOTAL += $SUM;
    }

  $top = "
  <div class='box right'>
    <h1>TOTAL = ".number_format($TOTAL,2)."$this->money</h1>
  </div>
  ";

  if ( !empty($TOTAL) ) {
    echo $top . $out . $top . $this->FormCommand();
  }
  else {
    echo "<center>Cart is empty please make your selection of product.</center>";
  }

}

/* place order confirmation */
public function FormCommand () {
  return "
  <form method='get' action=''>

  <hr /><h1><span class='material-icons'>thumb_up</span> Place order to validate reservation :</h1>
  <div class='container'>

    ".((!$GLOBALS['CONFIG']['ExportMail'])?null:"
    <div class='box four center'><label for='order_name'>Name :</label><input type='text' placeholder='Enter your name...' required/></div>
    <div class='box four center'><label for='order_mail'>Mail :</label><input type='email' placeholder='Enter your mail...' /></div>
    <div class='box four center'><label for='order_phone'>Phone :</label><input type='tel' placeholder='Enter your phone...' required/></div>"
    )."

    <div class='box four right'>
      <input type='hidden' name='cart-manager' />
      <input type='submit' name='placeorder' value='PLACE ORDER' />
    </div>
  </div>

  </form>";
}

public function MsgItemDeleted () {
  return "
  <div class='container'>
    <h2 class='alert'><span class='material-icons'>check_box</span> Item product succesfully removed from your cart !</h2>
  </div>";
}

public function MsgOrderValidated ($ticket) {
  return "
  <div class='container'>
  <div class='box'>
    <h2 class='success'><span class='material-icons'>check_box</span> Cart reservation validated !</h2>
    <br />
    <h3>Get your order number to easily claim your package at shop reception :</h3>
    <h1><span class='material-icons'>local_offer</span> <b class='success'>#".mb_strtoupper($ticket)."</b></h1>
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