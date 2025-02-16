<section class="shop-section container mx-auto px-4 py-8">
  <h2 class="text-4xl mb-8">Shop</h2>
  
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    <?php
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1
    );
    
    $products = new WP_Query($args);
    
    if ($products->have_posts()) :
        while ($products->have_posts()) : $products->the_post();
            $current_product = wc_get_product(get_the_ID());
            if ($current_product && $current_product->is_visible()) :
    ?>
            <div class="product-card bg-white p-4 transition-all duration-300 hover:shadow-lg">
              <a href="<?php echo get_permalink(); ?>" class="block">
                <div class="aspect-w-1 aspect-h-1 mb-4">
                  <?php echo get_the_post_thumbnail(get_the_ID(), 'medium'); ?>
                </div>
                
                <h3 class="text-xl mb-2"><?php echo get_the_title(); ?></h3>
                
                <div class="price mb-4">
                  <?php echo $current_product->get_price_html(); ?>
                </div>

                <div class="add-to-cart">
                  <?php 
                  echo apply_filters('woocommerce_loop_add_to_cart_link',
                    sprintf('<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button %s product_type_%s">%s</a>',
                        esc_url($current_product->add_to_cart_url()),
                        esc_attr($current_product->get_id()),
                        esc_attr($current_product->get_sku()),
                        $current_product->is_purchasable() ? 'add_to_cart_button' : '',
                        esc_attr($current_product->get_type()),
                        esc_html($current_product->add_to_cart_text())
                    ),
                    $current_product);
                  ?>
                </div>
              </a>
            </div>
    <?php
            endif;
        endwhile;
        wp_reset_postdata();
    endif;
    ?>
  </div>
</section>