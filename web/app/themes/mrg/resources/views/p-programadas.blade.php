{{--
  Template Name: Programadas
--}}

@query([
  'post_type' => 'event',
  'posts_per_page' => 8,
  'paged'=> (get_query_var('paged')) ? get_query_var('paged') : 1,
  'meta_query' 		=> [
    [
      'key'			=> 'start',
	        'compare'		=> '>=',
	        'value'			=> $now,
	        'type'			=> 'DATETIME'
    ]
  ]
])



@extends('layouts.app')

@section('content')

  @if (!$query->have_posts())
    <div class="no-posts">
      <p>{{ __('There is no scheduled activities at this time.', 'sage') }}</p>
      <p><a href="{{ $home_url }}/anteriores">{{ __('You can see past activities.', 'sage') }}</a> </p>
    </div>

  @else

    <div class="grid">
      @posts
        @include('partials.content-grid')
      @endposts
    </div>

    @include('partials.loader')

    <nav class="pager">
      <li class="newer">{{ previous_posts_link( __('Newer posts', 'sage'), $query->max_num_pages) }}</li>
      <li class="older">{{ next_posts_link( __('Older posts', 'sage'), $query->max_num_pages) }}</li>
    </nav>

  @endif
@endsection
