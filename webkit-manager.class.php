<?php
/* eShopCart - Cart Webkit template for Manager
* list product and quantity of item collected, possible remove from cart
* calculate the global price to place order
* author @NikelseDev */

class WebkitManager {

public $money = null;

public function __construct ( $datas_product, $datas_cart ) {

  $this->money = $GLOBALS['PRODUCT']['Money_Symbol'];
  $this->StartHTML();
  $this->ShowCartDetails( $datas_product, $datas_cart );
  $this->EndHTML();

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
  <div class='container'>
    <div class='box'>
      <h1><a href='".$GLOBALS['CONFIG']['WebSiteUrl']."'>".$GLOBALS['CONFIG']['WebName']."</a> &bull; Cart Management</h1>
      <i>Verify your command and place order for reservation :</i>
    </div>
  </div>
  <hr />";
}

/* list of product file extract */
public function ShowCartDetails ( $datas_product, $datas_cart ) {
  $TOTAL = 0.0;

  $out = null;

  foreach ($datas_cart as $K => $V) {
    $PRODUCT = $datas_product[ $V['id-product'] ];
    $SUM = $V['qty-product'] * floatval($PRODUCT[2]);

    $out .= "
    <div class='container col'>
      <div class='box'>
        <h2>&bull; ".$PRODUCT[1]." : <a href='?cart-manager&delpdt=$K'>X</a></h2>
      </div>
      <div class='box right'>
        <h2><i>".$V['qty-product']." x "
        .number_format(floatval($PRODUCT[2]),2)."$this->money</i> = "
        .( number_format($SUM,2) )."$this->money</h2>
      </div>
    </div>";

    $TOTAL += $SUM;
    }

  $top = "
  <div class='box col2 right'>
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

  <hr /><h1>Place order to validate reservation :</h1>
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

/* end of output for html document */
public function EndHTML () {
  echo "
      <hr />
      <div class='right'><a href='https://twitter.com/NikelseDev'>@NikelseDev</a></div>
      <script src='https://code.jquery.com/jquery-3.5.0.min.js' type='text/javascript'></script>
    </body>
  </html>";
  }

}

?>