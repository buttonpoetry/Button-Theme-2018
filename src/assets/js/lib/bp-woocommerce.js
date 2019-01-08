
// WooCommerce dependent Function to switch the empty cart icon to a full cart icon when item is added to cart.
(function($){
    $('body').on( 'added_to_cart', function(){
        $('.nav-cart').attr("src", "../dist/assets/images/theme/cart-icon-full.jpg");
        $('.title-bar-cart').attr("src", "../dist/assets/images/theme/cart-icon-full.jpg");
    });
})(jQuery); 