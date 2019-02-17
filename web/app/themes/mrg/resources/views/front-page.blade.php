@extends('layouts.app')

@section('content')

  @query([
    'post_type' => ['event'],
    'nopaging' => true,
    'meta_query' 		=> [
      [
        'key'			=> 'start',
  	        'compare'		=> '>=',
  	        'value'			=> $now,
  	        'type'			=> 'DATETIME'
      ]
    ],
    'tax_query' => [
      'relation' => 'AND',
      [
        'taxonomy' => 'edition',
        'field'    => 'slug',
        'terms'    => '2019',
      ],
      [
        'taxonomy' => 'ambit',
        'field'    => 'slug',
        'terms'    => 'publico',
      ],
    ],
  ])

  @if (!$query->have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  <div class="hero">
    <a id="flecha-2" class="flecha-aba">@svg('caret-down')</a>
    <a id="flecha-3" class="flecha-aba">@svg('flecha-aba-peq-blan')</a>

    <div class="slider">
      @posts
        @include('partials.content-slider')
      @endposts
    </div>

  </div> {{-- hero --}}


  {!! get_the_posts_navigation() !!}
@endsection
