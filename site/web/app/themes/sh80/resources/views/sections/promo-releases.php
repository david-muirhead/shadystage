<div class="mt-36 w-full p-8 z-10 flex flex-col items-center">
  <?php
    $loop = new WP_Query( array( 
      'post_type' => 'releases',
      'meta_query' => array(
        array(
          'key' => 'promo',
          'value' => '1',
          'compare' => '=='
        )
      ) 
    ) );
    if ( $loop->have_posts() ) :
        while ( $loop->have_posts() ) : $loop->the_post(); ?>
         <span class="relative top-5 text-h1-m -rotate-25 drop-shadow-sm"><?php the_field('title'); ?></span>
          <div class="feature release group pb-10 w-full max-w-4xl px-4 flex flex-col items-center">
            <div class="covers group w-full">
            <?php if( get_field('song') ): ?>
              <div class="aspect-3/2 aspect-video mb-20">
                <?php
                $iframe = get_field('song');
                preg_match('/src="(.+?)"/', $iframe, $matches);
                $src = $matches[1];
                $params = array(
                    'controls'  => 0,
                    'hd'        => 1,
                    'autohide'  => 1
                );
                $new_src = add_query_arg($params, $src);
                $iframe = str_replace($src, $new_src, $iframe);
                $attributes = 'frameborder="0" class="w-full h-full"';
                $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
                echo $iframe;
                ?>
              </div>
            <?php endif; ?>

              <?php
              $image = get_field('artwork_front');
              if( !empty( $image ) ): ?>
                <img class="front w-full" src="<?php the_field('artwork_front'); ?>" alt="hero"> 
              <?php endif; ?>
            </div>
            
            <div class="info text-center mt-4 w-full">
              <span class="text-h3 block -top-20"><?php the_content(); ?></span>
              <?php if( have_rows('links') ): ?>
                <div class="linx mt-2">
                  <?php while( have_rows('links') ): the_row();
                    $link = get_sub_field('link');
                    if( $link ):
                      $link_url = $link['url'];
                      $link_title = $link['title'];
                      $link_target = $link['target'] ? $link['target'] : '_self';
                      ?>
                      <a class=" mx-2 block " href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                        <?php echo esc_html( $link_title ); ?>
                      </a>
                    <?php endif; ?>
                  <?php endwhile; ?>
                </div>
              <?php endif; ?>
            </div>

          </div>
        <?php endwhile;
    endif;
    wp_reset_postdata();
?>
</div>