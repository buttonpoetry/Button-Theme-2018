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
    if ( ! WC()->cart->is_empty() ) {
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