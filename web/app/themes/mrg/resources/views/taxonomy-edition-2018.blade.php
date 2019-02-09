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
      @include('partials.content-event-grid')
    @endwhile
  </div>

  <div class="page-load-status centrar-container">
    <div class="centrar">
      <div class="loader-ellips infinite-scroll-request">
        <div class="mi-loader"></div>
      </div>
      <p class="infinite-scroll-last">{{ __('End of content', 'sage') }}</p>
      <p class="infinite-scroll-error">{{ __('No more pages to load', 'sage') }}</p>
    </div>
  </div>

  <div class="button-container hide">
    <button class="view-more-button boton">View more</button>
  </div>

  {!! get_the_posts_navigation() !!}
@endsection
