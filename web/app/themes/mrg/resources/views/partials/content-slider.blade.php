@if (has_post_thumbnail())
  @php $thumb_url = get_the_post_thumbnail_url();@endphp
@endif

<a href="{{ get_permalink() }}" role="article" @php post_class() @endphp style="background-image: url({{$thumb_url}})">
    <p class="next-call">{{ __('Next call', 'sage')}}</p>
    <h2 class="entry-title">{!! get_the_title() !!}</h2>
    <p class="fecha">{{ PProgramadas::fecha() }}</p>
</a>
