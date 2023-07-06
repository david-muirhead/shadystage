<section id="bigRed" class="feature release text-sh80-green">
  <div class="mt-36 rap w-full p-8 text-sh80-offwhite z-10 h-screen">
<span class="text-h1-m mb-8">RELEASES</span>
  <?php
    $loop = new WP_Query( array( 'post_type' => 'releases','meta_query' => array(
  array(
    'key' => 'feature',
    'value' => '1',
    'compare' => '=='
  )
) ) );
    if ( $loop->have_posts() ) :
        while ( $loop->have_posts() ) : $loop->the_post(); ?>
          <div class="feature release group pb-5 md:pb-10 block cursor-pointer">
            
              <div class="covers group w-1/2  right-0 hidden group-hover:block  fixed top-0 right-0 h-screen flex justify-center items-center">
              <?php
              $image = get_field('artwork_front');
              if( !empty( $image ) ): ?>
    
                  <img class="front" src="<?php the_field('artwork_front'); ?>" alt="hero"> 
              <?php endif; ?>
            </div>
            <div class="info inline-block  cursor-pointer">
              <span class="text-h2"><?php the_field('title'); ?></span>
              <span class="text-h3"><?php the_field('format'); ?></span>
              <span class="text-h2"><?php the_field('year'); ?></span>
              <?php if( have_rows('links') ): ?>
                <div class="linx">
                  <?php while( have_rows('links') ): the_row();

                    // vars
                    $link = get_sub_field('link');

                      if( $link ):
                          $link_url = $link['url'];
                          $link_title = $link['title'];
                          $link_target = $link['target'] ? $link['target'] : '_self';
                          ?>
                          <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                      <?php endif; ?>

                  <?php endwhile; ?>

                  </div>

              <?php endif; ?>
            </div>
            <?php
            $image = get_field('song');
            if( !empty( $image ) ): ?>
              <div class="tunes">
                <?php

                // Load value.
                $iframe = get_field('song');

                // Use preg_match to find iframe src.
                preg_match('/src="(.+?)"/', $iframe, $matches);
                $src = $matches[1];

                // Add extra parameters to src and replcae HTML.
                $params = array(
                    'controls'  => 0,
                    'hd'        => 1,
                    'autohide'  => 1
                );
                $new_src = add_query_arg($params, $src);
                $iframe = str_replace($src, $new_src, $iframe);

                // Add extra attributes to iframe HTML.
                $attributes = 'frameborder="0"';
                $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

                // Display customized HTML.
                echo $iframe;
                ?>
              </div>

            <?php endif; ?>

            <?php
            $image = get_field('visual');
            if( !empty( $image ) ): ?>
              <div class="visual">
                <?php

                // Load value.
                $iframe = get_field('visual');

                // Use preg_match to find iframe src.
                preg_match('/src="(.+?)"/', $iframe, $matches);
                $src = $matches[1];

                // Add extra parameters to src and replcae HTML.
                $params = array(
                    'controls'  => 0,
                    'hd'        => 1,
                    'autohide'  => 1
                );
                $new_src = add_query_arg($params, $src);
                $iframe = str_replace($src, $new_src, $iframe);

                // Add extra attributes to iframe HTML.
                $attributes = 'frameborder="0"';
                $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

                // Display customized HTML.
                echo $iframe;
                ?>
              </div>

            <?php endif; ?>

          </div>
        <?php endwhile;
    endif;
    wp_reset_postdata();
?>
</div>
</section>