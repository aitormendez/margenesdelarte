@extends('layouts.app')

@section('content')

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  <div id="map" class="map"><a id="flecha-location-1" class="flecha-aba">@svg('flecha-aba-peq')</a></div>


    <ul class="list">
      @while (have_posts()) @php the_post() @endphp
        @include('partials.content-'.get_post_type())
      @endwhile
    </ul>


@endsection
