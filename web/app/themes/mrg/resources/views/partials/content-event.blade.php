@php
  $clase = PProgramadas::clase()
@endphp

<article @php post_class($clase) @endphp>
  <header>
    <p class="edition">{{ __('Edition', 'sage') }}:  {{ PProgramadas::editionLoop() }}</p>
    {!! PProgramadas::featured() !!}
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h2>
    <p class="fecha">{{ PProgramadas::fecha() }}</p>
  </header>
  <div class="entry-summary">
    @php the_excerpt() @endphp
  </div>
</article>
