@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    @include('partials.404')
  @endif
@endsection
