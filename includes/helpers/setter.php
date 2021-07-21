<?php

function lsdc_product_description_header()
{
    $product_tab = array(
        'description' => __('Deskripsi', 'lsdcommerce'),
    );

    $product_tab = array_reverse($product_tab);

    if (has_filter('lsdcommerce/product/tab/header')) {
        $product_tab = apply_filters('lsdcommerce/product/tab/header', $product_tab);
    }

    return array_reverse($product_tab);
}

/**
 * Menambahkan Class `lsdcommerce` pada body class
 *
 * @since 0.3.0
 * @param array $class
 * @return void
 */
function lsdc_body_class( $class )
{
    $class[] = 'lsdcommerce';
    return $class;
}
add_filter('body_class', 'lsdc_body_class');

/**
 * Menambahkan Deskripsi Produk di Detail Produk
 *
 * @since 0.3.0
 * @return void
 */
function lsdc_product_description()
{
?>

<div class="lsdc-nav-tab">
  <?php $count = 0;foreach (lsdc_product_description_header() as $key => $item): ?>
  <a data-target="<?php echo $key; ?>" data-toggle="tab"
    class="nav-link <?php echo ($count == 0) ? 'active' : ''; ?>"><?php echo $item; ?></a>
  <?php $count++;endforeach;?>
</div>

<div class="lsdc-tab-content py-10 px-10">
  <div class="tab-pane show" data-tab="description">
    <?php the_content();?>
  </div>
  <?php do_action('lsdcommerce/single/tab/content')?>
</div>

<?php
}
add_action('lsdcommerce/single/tab', 'lsdc_product_description'); //Single Tabs




/**
 * get price frontend based on prioritize price discount
 *
 * @package Core
 * @subpackage Price
 * @since 1.0.0
 */
function lsdc_price_frontend($product_id = false)
{
    if ($product_id == null) $product_id = get_the_ID(); //Fallback Product ID
    $normal = lsdc_get_normal_price($product_id);
    $discount = lsdc_get_discount_price($product_id);

    if ($discount): ?>
    
      <span class="product-price product-item-price-normal discounted">
        <?php echo lsdc_currency_format(true, $discount); ?>
      </span>
      <span class="product-item-price-discount">
        <?php echo lsdc_currency_format(true, $normal); ?>
      </span>
      <small>per pcs</small>

    <?php else: ?>

      <?php if ($normal): ?>

        <span class="product-price product-item-price-normal">
          <?php echo lsdc_currency_format(true, $normal); ?>
        </span>

      <?php else: ?>

        <span class="product-item-price-normal">
          <?php _e("Gratis", 'lsdcommerce'); ?>
        </span>

      <?php endif; ?>
    <?php
    endif;
}
add_action('lsdcommerce/single/price', 'lsdc_price_frontend');

// Apply style Based on Settings
function lsdc_apperance(){
  $fontFamily         = lsdc_get_settings('appearance_settings', 'font_family' ) == null ? 'Poppins' : lsdc_get_settings('appearance_settings', 'font_family' );
  $backgroundTheme    = empty( lsdc_get_settings('appearance_settings', 'background_theme_color' )) ? 'transparent' : lsdc_get_settings('appearance_settings', 'background_theme_color' );
  $colorTheme         = lsdc_get_settings('appearance_settings', 'theme_color' );
  $lighter            = lsdc_adjust_brightness( $colorTheme, 50 );
  $darker             = lsdc_adjust_brightness( $colorTheme, -40 );
  $darker = '#000000';
  echo '<style>
          :root {
              --lsdc-color: '. $colorTheme .';
              --lsdc-lighter-color: '. $lighter .';
              --lsdc-darker-color: '. $darker .';
              --lsdc-background-color: '. $backgroundTheme .';
          }
          
          .lsdc-bg-color{
              background: '. $backgroundTheme .';
          }

          .lsdc-theme-color{
              color: '. $colorTheme .';
          }

          .lsdc-content{
              font-family: -apple-system, BlinkMacSystemFont, "'. $fontFamily . '", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
          }
      </style>';
}
add_action( 'wp_head', 'lsdc_apperance');
?>