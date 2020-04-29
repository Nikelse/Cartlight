/* eShopCart - Javascript source
* author @NikelseDev */

$(document).ready(function(){

  $(".addeshopcart").click(function(){

    var divnum = $(this).parent();
    var pdt_id = $(divnum[0]).attr('name').replace('product-','');
    var pdt_qty = $(divnum[0]).children('input[name="pdt-qty"]').val();

      $.ajax({

         url : '?cart-module',
         type : 'POST',
         data : 'id-product=' + pdt_id + "&qty-product=" + pdt_qty,
         dataType : 'html',

         success : function(output, statut) {
           $("#cartstats").text(output);
         },

         error : function(result, statut, error) {},
         complete : function(result, statut) {}
      });

  });
});