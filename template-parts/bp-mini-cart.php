<?php
/**
 * Template part for the mini cart on desktop.
 *
 * Optionally accepts 'titlebar' argument in the args array. Set to 'True' to make it a foundation hover thing.
 * 
 * @package ButtonTheme
 * @since ButtonTheme 0.1.0
 */
?>

<div <?php 
    $bp_titlebar = get_query_var('bp_titlebar');
    if( $bp_titlebar == true ) {
        ?> id="bp-mini-cart" class="bp-mini-cart dropdown-pane" data-dropdown data-hover="true" data-hover-pane="true" data-position="bottom" data-alignment="right"> <?php 
    } else {
        ?> class="bp-mini-cart"> <?php
    }   
    do_action( 'woocommerce_before_mini_cart' );
        
    if ( ! WC()->cart->is_empty() && ! is_cart() ) {
        echo '<table><thead><tr><th>#</th><th>Item</th><th>$</th></thead><tbody>';
        $cart_contents_count = WC()->cart->get_cart_contents_count();
        $max_cart_rows = 5; // Don't display more than this many cart items.    
        $cart_rows_outputted = 0;
        $cart_qty_outputted = 0;
        $is_bundle_item = false;
        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {                
            // Borrowed approach from WooCommerce mini-cart.php line 32
            $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
            $price = apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
            $price = str_replace('.00', '', $price);
            $price = str_replace('\$', '', $price);
            if( function_exists('wc_pb_is_bundled_cart_item') ) {
                $is_bundle_item = wc_pb_is_bundled_cart_item($cart_item);
            }            
            if ( empty( $cart_item[ 'composite_parent' ] ) &&  $cart_rows_outputted < $max_cart_rows && ! $is_bundle_item) 
            {                                   
                echo '<tr>';
                echo '<td>' . $cart_item['quantity'] . '</td>'; //qty                 
                echo '<td>' . $cart_item['data']->get_title() . '</td>'; //item                
                echo '<td>' . $price . '</td>'; //price
                echo '</tr>';
                $cart_qty_outputted += $cart_item['quantity'];
                $cart_rows_outputted++;
            }
            else if ($cart_rows_outputted == $max_cart_rows)
            {
                echo '<tr>';
                echo '<td colspan="3" align="center"><em>... <a class="bp-mini-cart-link" href="/cart/">and ' . (int) ( $cart_contents_count - $cart_qty_outputted) . ' more in cart</a></em></td>';
                echo '</tr>';
                $cart_rows_outputted++;   
            }
        }        
        echo '</table>';        
    ?><a class="button secondary" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf( _n( '%d item', '%d items', $cart_contents_count ), $cart_contents_count ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
    <em class="mini-shipping-note">*Cart total before shipping</em>
    <?php }
    else if ( is_cart() ) {
        echo "<a href='" . site_url('/shop') . "/'><em>You're viewing your cart.<br>Click here to visit the shop!</em></a>";
    }
    else {
        echo "<a href='" . site_url('/shop') . "/'><em>Your cart is empty,<br>check out the shop!</em></a>";
        } ?>  
        <?php do_action( 'woocommerce_after_mini_cart' ); ?>      
</div>