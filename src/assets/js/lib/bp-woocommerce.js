
// WooCommerce dependent Function to switch the empty cart icon to a full cart icon when item is added to cart.
(function($){
    $('body').on( 'added_to_cart', function(){
        $('.nav-cart').removeClass('cart-icon-empty');
        $('.title-bar-cart').removeClass('cart-icon-empty');
    });
})(jQuery);