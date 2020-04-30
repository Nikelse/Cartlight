<?php
/* eShopCart - Demonstration of use and easy integration
* listing of product file with components
* lightly templated for best comprehension
* author @NikelseDev */

class Demonstration {

public static function CreateObjectListForm ( $objects ) {

  $form = "
  <!doctype html>
  <html>
    <head>
      <title> ".$GLOBALS['CONFIG']['WebName']." &bull; Product list demonstration</title>
      <link href='"._FILES_."/style.css' type='text/css' rel='stylesheet' />
    </head>
  <body>

  <div class='container' id ='navbar'>

    <div class='box two'>
      <h1><a href='".$GLOBALS['CONFIG']['WebSiteUrl']."'>".$GLOBALS['CONFIG']['WebName']."</a> &bull; Product list demonstration</h1>
      <i>Simply select product and quantity to add in your cart :</i>
    </div>

    <div id='cartsection' class='box right'>
      <h1><a href='?cart-manager'><i class='material-icons'>shopping_cart</i> MY CART </a>(<span name='cartstats' id='cartstats'>".sizeof($_SESSION['CART'])."</span>)</h1>
    </div>

  </div>

  <div class='container'>";

  foreach ($objects as $K => $V) {
    $form .= "
      <div class='box three col'>
          <div>
            <h1>$V[1]</h1>
            <hr />
            <p>$V[3] &bull; <i>$V[4]</i></p>
            <hr />
            <h2 class='right'><a href='#'>$V[2]".$GLOBALS['PRODUCT']['Money_Symbol']."</a></h2>
          </div>
          <div>
            <img src='"._FILES_."/Images/default-product-1.png' width='100px'/>
          </div>
        <div id='product-$V[0]' name='product-$V[0]' class='right'>
          <input type='number' id='pdt-qty' name='pdt-qty' size='3' min='1' max='".$GLOBALS['PRODUCT']['Max_Product_Quantity']."' value='1' />
          <input type='button' class='addeshopcart' value='ADD CART' />
        </div>
      </div>";
    }

  $form.= "
  </div>

  <hr />
  <div class='right'><a href='https://twitter.com/NikelseDev'>@NikelseDev</a></div>

  <script src='https://code.jquery.com/jquery-3.5.0.min.js' type='text/javascript'></script>
  <script src='"._FILES_."/eshopcart.js' type='text/javascript'></script>

  </body>
  </html>";
  echo $form;
  }

}

?>