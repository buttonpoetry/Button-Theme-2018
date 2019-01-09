<?php
/**
 * Template part for off canvas menu
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<ul>
    <div class="bp-mini-cart">
        <?php if ( ! WC()->cart->is_empty() ) {
            echo '<table><thead><tr><th>#</th><th>Item</th><th>$</th></thead><tbody>';
            foreach ( WC()->cart->get_cart() as $cart_item ) {
                if ( empty( $cart_item[ 'composite_parent' ] ) ) 
                {                   
                    echo '<tr>';
                    echo '<td>' . $cart_item['quantity'] . '</td>'; //qty 
                    
                    echo '<td>' . $cart_item['data']->get_title() . '</td>'; //item
                    
                    echo '<td>$' . $cart_item['data']->get_price() . '</td>'; //price
                    echo '</tr>';
                }
            }
            echo '</table>';        
        ?><a class="button secondary" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
        <em class="mini-shipping-note">*Cart total before shipping</em>
        <?php }
        else {
            echo "<a href='" . site_url('/shop') . "/'><em>Your cart is empty,<br>check out the shop!</em></a>";
         } ?>        
    </div>
</ul>