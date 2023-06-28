@extends('layouts.app')
<section id="c0nt3nt" class="grid grid-cols-3 gap-2">
  <?php
    $loop = new WP_Query( array( 'post_type' => 'releases','meta_query' => array(
  array(
    'key' => 'feature',
    'value' => '0',
    'compare' => '=='
  )
) ) );
    if ( $loop->have_posts() ) :
        while ( $loop->have_posts() ) : $loop->the_post(); ?>
          <div class="release relative">
            <div class="info font-mono text-sm text-sh80-black absolute top-0 z-10 text-h2"> 
            @hasfield('title')
            <span class="rounded-lg px-2 ml-2 bg-sh80-offwhite">@field('title')</span>
            @endfield
            @hasfield('format')
              <span class="rounded-lg px-2 ml-2 bg-sh80-offwhite">@field('format')</span>
            @endfield
            @hasfield('year')
            <span class="rounded-lg px-2 ml-2 bg-sh80-offwhite">@field('year')</span>
            @endfield
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
            $image = get_field('artwork_front');
            if( !empty( $image ) ): ?>

              <div class="covers">
                <img class="front" src="<?php the_field('artwork_front'); ?>" alt="hero">
                <img class="back" src="<?php the_field('artwork_back'); ?>" alt="hero">
              </div>

            <?php endif; ?>

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
            <div class="video-container aspect-video z-0">
              <img class="video-thumbnail object-cover w-full h-full" src="<?php the_field('artwork_back');?>" alt="Video Thumbnail" data-video-url="<?php the_field('visual');?>">
            </div>
            <?php endif; ?>
          </div>
        
        <?php endwhile;
    endif;
    wp_reset_postdata();
    
?>
<div class="lightbox">
  <div class="lightbox-content z-20">
    <iframe class="video-frame" src="" frameborder="0" allowfullscreen></iframe>
  </div>
  <div class="lightbox-overlay z-10"></div>
</div>
  </section>