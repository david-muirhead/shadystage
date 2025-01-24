@extends('layouts.app')
<div class="md:grid md:grid-cols-3 md:gap-3 ">
  <?php
    $loop = new WP_Query( array( 'post_type' => 'releases','meta_query' => array(
  array(
    'key' => 'visual',
      'value'   => array(''),
      'compare' => 'NOT IN'
  )
) ) );
    if ( $loop->have_posts() ) :
        while ( $loop->have_posts() ) : $loop->the_post(); ?>
          <div class="release relative block aspect-video">
            <div class="absolute info font-mono text-sm text-sh80-black top-0 z-10 text-h2"> 
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

