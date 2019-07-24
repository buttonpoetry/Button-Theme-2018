<?php
/**
 * Customer completed order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-completed-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates/Emails
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * @hooked WC_Emails::email_header() Output the email header
 */
do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<?php /* translators: %s: Customer first name */ ?>
<p><?php printf( esc_html__( 'Hi %s,', 'woocommerce' ), esc_html( $order->get_billing_first_name() ) ); ?></p>
<?php /* translators: %s: Site title */ ?>
<p><?php printf( esc_html__( 'Your %s order has been marked complete on our side.', 'woocommerce' ), esc_html( wp_specialchars_decode( get_option( 'blogname' ), ENT_QUOTES ) ) ); ?></p>
<?php

/*
 * @hooked WC_Emails::order_details() Shows the order details table.
 * @hooked WC_Structured_Data::generate_order_data() Generates structured data.
 * @hooked WC_Structured_Data::output_structured_data() Outputs structured data.
 * @since 2.5.0
 */
do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email );

/*
 * @hooked WC_Emails::order_meta() Shows order meta data.
 */
do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email );

/*
 * @hooked WC_Emails::customer_details() Shows customer details
 * @hooked WC_Emails::email_address() Shows email address
 */
do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email ); 

/*<p>
<?php esc_html_e( 'Thanks for shopping with us.', 'woocommerce' ); ?>
</p>*/

/**
 * Custom Code to add a promotional button
 * For Button Poetry
 */
?><table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td style="text-align:center;">
			<center>
				<table border="0" cellspacing="0" cellpadding="0" style="display:inline-block;margin-left:auto;margin-right:auto;">
					<tr>
						<td align="center" style="padding-bottom:10px;font-size:1.1em"><strong>Love Poetry Videos?</strong> Try <a href="https://tv.buttonpoetry.com/">Button TV</a> on us! Get<br><em>3 months FREE</em> with discount code <strong>TRYBTV</strong></td>
					</tr>
					<tr>
						<td align="center" style="border-radius: 3px;" bgcolor="#e9703e">                            
							<a href="https://tv.buttonpoetry.com/join" target="_blank" style="font-size: 16px; color: #ffffff; text-decoration: none; text-decoration: none;border-radius: 3px; padding: 8px 14px; border: 1px solid #e9703e; display: inline-block;">Watch Button TV Now! →</a></td>
					</tr>
					<tr>
							<td align="center" style="font-size:14px;padding-top:6px;">
								<em>Coupon valid on Button TV Monthly Subscription</em>
							</td>
						</tr>
				</table>
			</center>
		</td>
	</tr>
</table>

<?php

/*
 * @hooked WC_Emails::email_footer() Output the email footer
 */
do_action( 'woocommerce_email_footer', $email );
