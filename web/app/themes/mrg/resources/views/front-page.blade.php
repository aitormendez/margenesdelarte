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
    @php
      $sust_img = get_field('sutitut_img', 'option');
    @endphp
    <div class="sustitucion hero" style="background-image: url({{$sust_img[url]}})">
      <a id="flecha-2" class="flecha-aba">@svg('caret-down-bla')</a>
      <a id="flecha-3" class="flecha-aba">@svg('flecha-aba-peq-blan')</a>
  @else
    <div class="hero">
      <a id="flecha-2" class="flecha-aba">@svg('caret-down-bla')</a>
      <a id="flecha-3" class="flecha-aba">@svg('flecha-aba-peq-blan')</a>
      <div class="slider">
        @posts
          @include('partials.content-slider')
        @endposts
      </div>
      <div id="dots"></div>

  @endif
  </div>




  {!! get_the_posts_navigation() !!}
@endsection
