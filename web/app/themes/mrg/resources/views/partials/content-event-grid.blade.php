@php
$clase_imagen = PProgramadas::clase();
$clase_tipo = PProgramadas::programadaAnterior();
$clase = $clase_imagen . ' ' . $clase_tipo;
$post_type = get_post_type();
@endphp

<article @php post_class($clase) @endphp>
  <header>
    @if ($post_type == 'event')
      <p class="ambito">{{ PProgramadas::ambito() }}</p>
    @endif
    @if (has_post_thumbnail())
      {!! PProgramadas::featured() !!}
    @endif
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h2>
    <p class="fecha">{{ PProgramadas::fecha() }}</p>
  </header>
  <div class="entry-summary">
    @php the_excerpt() @endphp
  </div>
</article>
