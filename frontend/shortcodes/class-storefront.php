<?php
/**
 * StoreFront Function
 * @since 0.3.0
 */
namespace LSDCommerce\Shortcodes;

if (!defined('ABSPATH')) {
    exit;
}

class StoreFront
{
    public function __construct()
    {
        add_shortcode('lsdcommerce_etalase', [$this, 'render']);
    }

    public function filter()
    {
    }

    public function listing()
    {
    }

    public function sorting()
    {
    }

    public function render($atts)
    {


        ob_start(); ?>

<div id="lsdcommerce-storefront" class="max480">

  <main class="lsdc-card">
    <!-- Header Store -->
    <div class="card-header card-header-white">
      <h6 class="card-title">
        <?php _e('Semua Produk', 'lsdcommerce'); ?>
        <small><?php // echo lsdc_count_products( 'lsdc-product', 'Produk', 'Produk' );?></small>
      </h6>
    </div>

    <!-- Body Store -> Product Listing -->
    <div class="card-body">
      <?php load_template( LSDC_PATH . 'frontend/templates/storefront/product/listing.php', true ); ?>
    </div>

  </main>

</div>
<?php
        $render = ob_get_clean();

        return $render;
    }
}
new StoreFront();
?>