  <header class="banner h-screen z-10 bg-sh80-cula">
    <style type="text/css">
  .bg-sh80-cula {
      background-color: <?php the_field('site_colour', 'option'); ?>;
  }
  .text-sh80-cula {
      color: <?php the_field('site_colour', 'option'); ?>;
  }
  .sh80-logo{
      fill:<?php the_field('site_colour', 'option'); ?>;
  }
  </style>
    <div id="top" class="fixed grid grid-cols-4 gap-4 w-full text-sm text-sh80-cula font-mono z-50">
    <a href="#bigRed">News</a>
    <a href="#d8s">dates</a>
    <a href="#c0nt3nt">Releases</a>
    <a class="margin border-b-sh80-cula" href="#shop">shop</a>
  </div>
  <span id="h0va" class="l1nk font-mono z-10 text-sm fixed top-0 p-20 font-mono text-sh80-cula">this is shadynasty</br> tranmitting from SYD/EORA</span>
  @if($hero_two_video = get_field('hero_space_two_video', 'option'))
    <div id="h3r05h17"class="h-screen w-full absolute top-0 flex items-center justify-center overflow-hidden z-0">
      <video  id="" class="w-full -z-10" loop autoplay muted>
      <source src="{{ $hero_two_video }}" type="video/mp4">
      <source src="movie.ogg" type="video/ogg">
      Your browser does not support the video tag.
      </video> 
    </div>
  @endif
  @if($hero_two_image = get_field('hero_space_image', 'option'))
    <div id="h3r05h17"class="h-screen w-full absolute top-0 flex items-center justify-center z-10">
      <img class="w-1/2 "src="{{ $hero_two_image }}" alt="Your Image">
    </div>
  @endif
  @if($hero_video = get_field('hero_space_video', 'option'))
    <div id="h3r05h17"class="h-screen w-full absolute top-0 flex items-center justify-center z-0 overflow-hidden">
      <video  id="icon" class="w-screen -z-10"  loop autoplay muted>
      <source src="{{ $hero_video }}" type="video/mp4">
      <source src="movie.ogg" type="video/ogg">
      Your browser does not support the video tag.
    </video>
    </div>
  @endif

    <span class="l1nk w-screen absolute -top-1/2 pt-hero z-20"href="{{ home_url('/') }}">
    @svg('images.sh80L060', 'px-20  drop-shadow-lg sh80-logo', ['aria-label' => 'Sick Logo'])  </span>
    <div class="md:bg-gradient-to-b from-black  absolute w-full  z-0 -bottom-80 h-80"></div>
  </header>

