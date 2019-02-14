@extends('layouts.app')

@section('content')

  @include('partials.page-header')

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  <div class="infinite-container">
    @while (have_posts()) @php the_post() @endphp
      @include('partials.content-grid')
    @endwhile
  </div>

  @include('partials.loader')

  {!! get_the_posts_navigation() !!}
@endsection
