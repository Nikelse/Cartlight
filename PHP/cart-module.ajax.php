<?php
/* eShopCart - Cart module
* product and quantity add or update in the cart session
* author @NikelseDev */

/* AJAX CALL

* get the object ID to check if in the datafile */
if (isset($_POST['id-product']) && is_numeric($_POST['id-product'])
  && array_key_exists($_POST['id-product'], $DATAS)
  && isset($_POST['qty-product']) && is_numeric($_POST['qty-product'])
  && $_POST['qty-product'] > 0 && $_POST['qty-product'] <= $GLOBALS['PRODUCT']['Max_Product_Quantity']) {

  /* check cart product to increase amount of same product ID already added */
  if (!empty($_SESSION['CART'])
    && array_search($_POST['id-product'], array_column($_SESSION['CART'], 'id-product')) !== false) {
      foreach ($_SESSION['CART'] as $K => $ITEM) {
        if ($ITEM['id-product'] == $_POST['id-product']) {
          /* update product quantity into the cart */
          $_SESSION['CART'][$K]['qty-product'] = intval($ITEM['qty-product'] + $_POST['qty-product']);
          break;
        }
      }
    }
  else {
    /* no existent product id detected then insert a new one with quantity into the cart */
    array_push($_SESSION['CART'],
      array (
        "id-product" => intval($_POST['id-product']),
        "qty-product" => intval($_POST['qty-product'])
      ));
  }

}

echo sizeof($_SESSION['CART']);

?>