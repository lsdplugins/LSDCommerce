<?php
/**
 * Template untuk halaman detail produk
 * semua detail produk akan dialihkan ke template single.php ini
 * kamu bisa merubah struktur tampilan dengan merubah template ini
 * 
 * @since 0.3.0
 */

defined('ABSPATH') ?: exit; // Exit if accessed directly
?>

<!-- Panggil Header -->
<?php get_header();?>

<!-- Panggil CSS -->
<?php
wp_enqueue_style('lsdc-single');
wp_enqueue_style('lsdc-theme');
wp_enqueue_style('lsdc-cart');
?>

<!-- Struktur HTML -->
<div id="lsdcommerce-container" class="max480">
  <main class="lsdc-card page-content lsdcommerce">

    <?php do_action('lsdcommerce/single/before');?>

    <!-- Header Store -->
    <div class="card-header card-header-white">
      <?php load_template( LSDC_PATH . 'public/templates/storefront/cart/cart.php', true ); ?>
    </div>

    <!-- Product Detail -->
    <div id="product-detail" data-id="<?php echo get_the_ID(); ?>" data-title="<?php echo get_the_title(); ?>"
      data-price="<?php echo lsdc_get_product_price(); ?>" data-weight="<?php echo lsdc_get_product_weight(); ?>"
      data-thumbnail="<?php the_post_thumbnail_url(get_the_ID(), 'lsdcommerce-thumbnail-mini');?>" class="card">

      <div class="card-body lsdcommerce-bg-color">

        <!-- Product Image -->
        <section class="product-detail">
          <figure id="featured-image">
            <?php the_post_thumbnail('lsdcommerce-thumbnail-single');?>
          </figure>
        </section>

        <!-- Product Meta -->
        <section class="product-item--detail lsdp-py-10">

          <div class="lsdp-row p-default align-items-end">
            <div class="col-8 py-10">
              <!-- Product Name -->
              <h2 class="product-item-name">
                <a href="<?php the_permalink();?>">
                  <?php the_title();?>
                </a>
              </h2>

              <!-- Product Price -->
              <h6 class="product-item-price">
                <?php do_action('lsdcommerce/single/price');?>
              </h6>

              <!-- Product Category -->
              <?php echo get_the_term_list( get_the_ID(), 'product-category', ' <div class="product-item-category">', ', ', '</div>' ); ?>
              
            </div>

            <div class="col-auto ml-auto py-10">
              <!-- Product Stock -->
              <div class="product-item-stock text-right lsdp-mb-10">
                <?php echo lsdc_get_product_stock(); ?>
              </div>
              <a href="javascript:void(0)" class="lsdc-btn btn-primary " data-action="add-cart"
                data-target="#cart-popup-add">Tambah</a>
              <div class="lsdc-qty">
                <button type="button" class="minus button-qty" data-qty-action="minus">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-minus">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                  </svg>
                </button>
                <input min="0" type="number" value="{{qty}}" name="qty" disabled>
                <button type="button" class="plus button-qty" data-qty-action="plus">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-plus">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                  </svg>
                </button>
              </div>

            </div>
          </div>

        </section>

        <?php do_action('lsdcommerce/single/tab/before');?>

        <!-- Product Description -->
        <section class="product-description">
          <?php do_action('lsdcommerce/single/tab');?>
        </section>

        <?php do_action('lsdcommerce/single/tab/after');?>
      </div>

    </div>

    <!-- Cart Manager -->
    <?php do_action('lsdcommerce/single/after');?>

  </main> <!-- main -->
</div>

<!-- Panggil JS -->
<?php wp_enqueue_script('lsdc-single'); ?>
<?php wp_enqueue_script('lsdc-cart'); ?>

<!-- Panggil Footer -->
<?php get_footer();?>