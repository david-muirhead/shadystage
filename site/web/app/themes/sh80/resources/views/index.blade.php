
@extends('layouts.app')
<section id="sh80onTOP " class=" relative">
@include('sections.header')
</section>
<!-- @section('content') -->
<section id="bigRed" class="feature release text-sh80-cula flex w-full my-60">
@include('sections.promo-releases')
</section>
<section id="d8s" class="mt-36 rap w-full p-8 text-sh80-cula z-10 min-h-screen flex items-center justify-center my-60">
@include('sections.d8s')
</section>
<section id="c0nt3nt" class="p-2 my-80 text-sh80-cula">
<h2 class="relative top-5 text-h1-m rotate-25 drop-shadow-sm w-full text-center mt-36">Releases</h2>
@include('sections.b4d-cont3nt')
@include('sections.clu8-cont3nt')
@include('sections.tr3k-cont3nt')
<div class="lightbox">
  <div class="lightbox-content z-20">
    <iframe class="video-frame" src="" frameborder="0" allowfullscreen></iframe>
  </div>
  <div class="lightbox-overlay z-10"></div>
</div>
</section>
<section id="sh0p" class="p-2 my-80">
@include('sections.shop')
</section>
<section id="footer">
@include('sections.footer')
</section>
@endsection
