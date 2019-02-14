{{--
  Template Name: Anteriores
--}}

@query([
  'post_type' => 'event',
  'posts_per_page' => 2,
  'paged'=> (get_query_var('paged')) ? get_query_var('paged') : 1,
  'meta_query' 		=> [
    [
      'key'			=> 'start',
	        'compare'		=> '<=',
	        'value'			=> $now,
	        'type'			=> 'DATETIME'
    ]
  ]
])



@extends('layouts.app')

@section('content')

  @if (!$query->have_posts())
    <div class="centrar-container">
      <div class="alert alert-warning centrar">
        {{ __('There is no content in this section yet', 'sage') }}
      </div>
    </div>
  @else

    <div class="grid">
      @posts
        @include('partials.content-grid')
      @endposts
    </div>

    <div class="page-load-status">
      <div class="loader-ellips infinite-scroll-request">
        <div class="mi-loader"></div>
      </div>
      <p class="infinite-scroll-last">{{ __('End of content', 'sage') }}</p>
      <p class="infinite-scroll-error">{{ __('No more pages to load', 'sage') }}</p>
    </div>

    <div class="button-container hide">
      <button class="view-more-button boton">View more</button>
    </div>

    <nav class="pager">
      <li class="newer">{{ previous_posts_link( __('Newer posts', 'sage'), $query->max_num_pages) }}</li>
      <li class="older">{{ next_posts_link( __('Older posts', 'sage'), $query->max_num_pages) }}</li>
    </nav>

  @endif
@endsection
