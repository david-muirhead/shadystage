@extends('layouts.app')
<section id="sh80onTOP " class=" relative">
@include('sections.header')
</section>
<!-- @section('content') -->
<section id="bigRed" class="feature release text-sh80-green flex w-full my-60">
@include('sections.promo-releases')
</section>
<section id="bigRed" class="feature release text-sh80-green flex w-full my-60">
@include('sections.featured-releases')
</section>
<section id="d8s" class="mt-36 rap w-full p-8 text-sh80-blue z-10 min-h-screen flex items-center justify-center my-60">
@include('sections.d8s')
</section>
<section id="c0nt3nt" class="p-2 my-80">
@include('sections.cont3nt')
</section>
<section id="footer">
@include('sections.footer')
</section>
@endsection
