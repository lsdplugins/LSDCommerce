<?php 
wp_enqueue_style('lsdc-theme');
wp_enqueue_style('lsdc-single');
?>

<section class="products">
  <div class="container">
    <?php
    $query = new \WP_Query([
            'post_type' => 'product',
            'post_status' => 'publish',
    ]); 
  ?>
    <?php if ($query->have_posts()): ?>
    <div class="lsdp-row lsdp-pt-10 lsdp-pl-10">
      <?php while ($query->have_posts()): $query->the_post(); ?>

      <div class="lsdc-product-item col-6">
        <figure class="product-item">
          <div class="product-item-img">
            <a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>">
              <?php the_post_thumbnail('lsdcommerce-thumbnail-listing'); ?>
            </a>
          </div>

          <?php do_action('lsdcommerce/product/thumbnail'); ?>
          <?php do_action('lsdcommerce/product/content'); ?>

          <figcaption>
            <div class="lsdp-row no-gutters">
              <div class="col-10">
                <!-- Display Category Product -->
                <?php //echo get_the_term_list(get_the_ID(), 'product-category', ' <div class="product-item-category">', ', ', '</div>'); ?>

                <h3 class="product-item-name">
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                <?php do_action('lsdcommerce/product/category'); ?>
                <?php do_action('lsdcommerce/product/title'); ?>
                <?php do_action('lsdcommerce/product/price'); ?>
                <h6 class="product-item-price">

                </h6>
              </div>
              <!-- Do Action for Whislist -->
            </div>
          </figcaption>
        </figure>
      </div>

      <?php endwhile;
                      wp_reset_postdata(); ?>
    </div>
    <?php else: ?>

    <div class="lsdp-alert lsdc-info  mb-10 lsdp-mx-10">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="feather feather-info">
        <circle cx="12" cy="12" r="10"></circle>
        <line x1="12" y1="16" x2="12" y2="12"></line>
        <line x1="12" y1="8" x2="12.01" y2="8"></line>
      </svg>
      <p><?php _e('Product is empty', 'lsdcommerce'); ?></p>
    </div>

    <?php endif; ?>

  </div>
</section>