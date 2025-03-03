  <header class="banner h-screen z-10">
    <style type="text/css">
  .bg-sh80-cula {
      background-color: <?php the_field('site_colour', 'option'); ?>;
  }
  .text-sh80-cula {
      color: <?php the_field('site_colour', 'option'); ?>;
  }
  .border-sh80-cula {
    border-color: <?php the_field('site_colour', 'option'); ?>;
  }
  .sh80-logo{
      fill:<?php the_field('site_colour', 'option'); ?>;
  }
  </style>
    <div id="top" class=" pt-2 drop-shadow fixed grid grid-cols-5 gap-4 w-full text-sm text-sh80-cula text-center font-mono z-50">
    <a class="underline" href="#bigRed">News</a>
    <a class="underline" href="#d8s">dates</a>
    <a class="underline" href="#c0nt3nt">Releases</a>
    <a class="line-through pointer-events-none" href="#sh0p">Shop</a>
    <a class="underline" href="#fo0t">Contact</a>
  </div>
  <span id="h0va" class="transmit l1nk font-mono z-10 text-sm fixed top-0 p-20 font-mono text-sh80-cula">this is shadynasty</br> transmitting from SYD/EORA</span>
  @if($hero_two_video = get_field('hero_space_two_video', 'option'))
    <div id="h3r05h17 icon3"class="h-screen w-full  hidden md:flex absolute top-0 items-center justify-center overflow-hidden z-0 ">
      <video class="w-full h-full -z-10 object-cover" loop autoplay muted>
      <source src="{{ $hero_two_video }}" type="video/mp4">
      <source src="movie.ogg" type="video/ogg">
      Your browser does not support the video tag.
      </video> 
    </div>
  @endif
  @if($hero_two_image = get_field('hero_two_image', 'option'))
    <div id="h3r05h17"class=" h-screen w-full absolute top-0 hidden md:flex items-center justify-center z-10">
      <img class="w-1/2 "src="{{ $hero_two_image }}" alt="Your Image">
    </div>
  @endif
  @if($hero_space_image = get_field('hero_space_image', 'option'))
    <div id="h3r05h17"class=" h-screen absolute top-0 md:hidden items-center justify-center z-10">
      <img class="w-full h-full object-cover"src="{{ $hero_space_image }}" alt="shady nasty on top">
    </div>
  @endif
  @if($hero_video = get_field('hero_space_video', 'option'))
    <div id="h3r05h17"class="h-screen w-full hidden md:flex absolute  top-0  items-center justify-center z-0 overflow-hidden mix-blend-lighten">
      <video  class="w-screen h-full -z-10 object-cover"  loop autoplay muted>
      <source src="{{ $hero_video }}" type="video/mp4">
      <source src="movie.ogg" type="video/ogg">
      Your browser does not support the video tag.
    </video>
    </div>
  @endif

    <span class="l1nk w-screen h-screen flex justify-center items-center z-20"href="{{ home_url('/') }}">
    @svg('images.sh80L060', 'px-20  drop-shadow-lg sh80-logo', ['aria-label' => 'Sick Logo'])  </span>
    <div class="md:bg-gradient-to-b from-black  absolute w-full  z-0 -bottom-80 h-80"></div>
  </header>

