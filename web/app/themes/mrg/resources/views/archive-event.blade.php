@extends('layouts.app')

@section('content')

  <div class="calendar-container">
    <div id="calendar"></div>
  </div>

  <div class="infinite-container">
    @while (have_posts()) @php the_post() @endphp
      @include('partials.content-'.get_post_type())
    @endwhile
  </div>

  <div class="page-load-status centrar-container">
    <div class="loader-ellips infinite-scroll-request centrar">
      <div class="mi-loader"></div>
    </div>
    <p class="infinite-scroll-last centrar">{{ __('End of content', 'sage') }}</p>
    <p class="infinite-scroll-error centrar">{{ __('No more pages to load', 'sage') }}</p>
  </div>

  {!! get_the_posts_navigation() !!}
@endsection
