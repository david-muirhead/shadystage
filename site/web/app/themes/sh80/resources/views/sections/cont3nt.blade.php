@extends('layouts.app')
<div class="relative">
  <h2 class="relative top-5 text-h1-m rotate-25 drop-shadow-sm w-full text-center mt-36">Releases</h2>
  <div class="md:grid md:grid-cols-3 md:gap-3">
  <?php
    $loop = new WP_Query( array( 'post_type' => 'releases','meta_query' => array(
      'relation' => 'AND',
      array(
          'key' => 'feature',
          'value' => '1',
          'compare' => '='
      ),
      array(
          'key' => 'project',
          'value' => 'trek',
          'compare' => '=='
      )
) ) );
    if ( $loop->have_posts() ) :
        while ( $loop->have_posts() ) : $loop->the_post(); ?>
          <div class="feature release group pb-8 md:pb-12 block w-full">
            
              <div >
              <?php
              $image = get_field('artwork_front');
              if( !empty( $image ) ): ?>
    
                  <img class="front" src="<?php the_field('artwork_front'); ?>" alt="hero"> 
              <?php endif; ?>
            </div>
            <div class="info inline-block  cursor-pointer">
              <span class="text-h2"><?php the_field('title'); ?></span>
              <span class="text-h3"> - <?php the_field('format'); ?></span>
              <span class="text-h2 block"><?php the_field('year'); ?></span>
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
</div>
<div class="md:grid md:grid-cols-3 md:gap-3 ">
  <?php
    $loop = new WP_Query( array( 'post_type' => 'releases','meta_query' => array(
      'relation' => 'AND',
      array(
        'key' => 'visual',
        'value'   => array(''),
        'compare' => 'NOT IN'
      ),
      array(
          'key' => 'project',
          'value' => 'trek',
          'compare' => 'LIKE'
      )
) ) );
    if ( $loop->have_posts() ) :
        while ( $loop->have_posts() ) : $loop->the_post(); ?>
          <div class="release relative block aspect-video">
            <div class="absolute info font-mono text-sm text-stone-900 top-0 z-10 text-h2"> 
            @hasfield('title')
            <span class="inline-block rounded-lg px-2 ml-2 bg-sh80-offwhite mt-2">@field('title')</span>
            @endfield
            @hasfield('format')
              <span class="rounded-lg px-2 ml-2 bg-sh80-offwhite mt-2">@field('format')</span>
            @endfield
            @hasfield('year')
            <span class="rounded-lg px-2 ml-2 bg-sh80-offwhite mt-2">@field('year')</span>
            @endfield
            </div>
            <?php
            $image = get_field('visual');
            if( !empty( $image ) ): ?>
            <div class="video-container aspect-video z-0 absolute top-0">
              <img class="video-thumbnail object-cover w-full h-full" src="<?php the_field('artwork_front');?>" alt="Video Thumbnail" data-video-url="<?php the_field('visual');?>">
            </div>
            <?php endif; ?>
          </div>
        <?php endwhile;
    endif;
    wp_reset_postdata();
    
?>
</div>
<div class="lightbox">
  <div class="lightbox-content z-20">
    <iframe class="video-frame" src="" frameborder="0" allowfullscreen></iframe>
  </div>
  <div class="lightbox-overlay z-10"></div>
</div>

