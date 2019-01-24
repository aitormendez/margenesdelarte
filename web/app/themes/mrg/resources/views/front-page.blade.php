@extends('layouts.app')

@section('content')

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  @while (have_posts()) @php the_post() @endphp
    <div class="hero">
      <a id="flecha-2" class="flecha-aba">@svg('flecha-aba-peq', ['id' => 'flecha-2'])</a>
      <a id="flecha-3" class="flecha-aba"></a>

    </div>
    @include('partials.content-'.get_post_type())
  @endwhile

  {!! get_the_posts_navigation() !!}
@endsection
