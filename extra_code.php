<?php 
/**
 *	
 * The following lines need to be added on function.php file of the activated theme.
 * 
 */

// Display Fields
add_action('woocommerce_product_options_general_product_data', 'woocommerce_product_custom_fields');

// Save Fields
add_action('woocommerce_process_product_meta', 'woocommerce_product_custom_fields_save');


function woocommerce_product_custom_fields()
{
    global $woocommerce, $post;

    // Purchase field
    woocommerce_wp_text_input(
        array(
            'id' => '_purchase_price',
            'placeholder' => 'Purchase price',
            'label' => __('Purchase price', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
    //Vendor max field
    woocommerce_wp_text_input(
        array(
            'id' => '_vendor_max_price',
            'placeholder' => 'Vendor max price',
            'label' => __('Vendor max price', 'woocommerce'),
            'desc_tip' => 'true'
            )
    );
}

function woocommerce_product_custom_fields_save($post_id)
{
    // Purchase field
    $woocommerce_purchase_price = $_POST['_purchase_price'];
    if (!empty($woocommerce_purchase_price))
        update_post_meta($post_id, '_purchase_price', esc_attr($woocommerce_purchase_price));
// Vendor max field
    $woocommerce_vendor_max_price = $_POST['_vendor_max_price'];
    if (!empty($woocommerce_vendor_max_price))
        update_post_meta($post_id, '_vendor_max_price', esc_attr($woocommerce_vendor_max_price));

}