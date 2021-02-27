@extends('layouts.app')

@section('content')
  @if( ! $error404 )

  {{ $location->name }}

  @else
    @include('partials.404')
  @endif
@endsection
