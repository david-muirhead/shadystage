@extends('layouts.app')

@section('content')
<section id="bigRed" class="feature release text-sh80-green">
    @include('sections.featured-releases')
  </section>
  <section id="d8s">
    @include('sections.d8s')
  </section>
  <section id="c0nt3nt" class="grid grid-cols-3 gap-4">
    @include('sections.cont3nt')
	</section>
@endsection
