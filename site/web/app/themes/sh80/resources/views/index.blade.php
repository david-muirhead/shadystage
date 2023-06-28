@extends('layouts.app')

@include('sections.header')
@section('content')
<section id="bigRed" class="feature release text-sh80-green">
    @include('sections.featured-releases')
  </section>
    @include('sections.d8s')
    @include('sections.cont3nt')
@endsection
