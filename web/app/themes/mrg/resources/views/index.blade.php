@extends('layouts.app')

@section('content')

  @include('partials.page-header')

  @if (!have_posts())
    <div class="centrar-container">
      <div class="alert alert-warning centrar">
        {{ __('There is no content in this section yet', 'sage') }}
      </div>
    </div>
  @endif

  <div class="infinite-container">
    @while (have_posts()) @php the_post() @endphp
      @include('partials.content-'.get_post_type())
    @endwhile
  </div>

  @include('partials.loader')

  <div class="button-container hide">
    <button class="view-more-button boton">{{ __('View more', 'sage') }}</button>
  </div>

  {!! get_the_posts_navigation() !!}
@endsection
