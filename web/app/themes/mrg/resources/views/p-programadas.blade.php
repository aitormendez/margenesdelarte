{{--
  Template Name: Anteriores
--}}

@query([
  'post_type' => 'event',
  'posts_per_page' => 2,
  'paged'=> (get_query_var('paged')) ? get_query_var('paged') : 1,
])



@extends('layouts.app')

@section('content')

  @if (!$query->have_posts())
    <h1>No hay posts</h1>
  @else

    <div class="infinite-container">
      @posts
        @include('partials.content-'.get_post_type())
      @endposts
    </div>

    <div class="page-load-status">
      <div class="loader-ellips infinite-scroll-request">
        <div class="mi-loader"></div>
      </div>
      <p class="infinite-scroll-last">End of content</p>
      <p class="infinite-scroll-error">No more pages to load</p>
    </div>

    <div class="button-container">
      <button class="view-more-button">View more</button>
    </div>

    <nav class="pager">
      <li class="newer">{{ previous_posts_link( __('Newer posts', 'sage'), $query->max_num_pages) }}</li>
      <li class="older">{{ next_posts_link( __('Older posts', 'sage'), $query->max_num_pages) }}</li>
    </nav>

  @endif
@endsection
