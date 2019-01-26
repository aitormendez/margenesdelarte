<div class="meta">

  @if (is_singular('production'))
    <p class="epi">{{ __('Edition', 'sage') }}: <span>{{ $edicion_term }}</span></p>
      @if ($eventos_relacionados['numero'] == 'singular')
        <div class="grupo">
        <p class="epi">{{ __('Related activity', 'sage') }}:</p>
      @elseif ($eventos_relacionados['numero'] == 'plural')
        <div class="grupo">
        <p class="epi">{{ __('Related activities', 'sage') }}</p>
      @endif
    {!! $eventos_relacionados['eventos'] !!}
    </div>
  @else
    <time class="updated" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time>
    <p class="byline author vcard">
      {{ __('By', 'sage') }} <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="fn">
        {{ get_the_author() }}
      </a>
    </p>
  @endif
</div>
