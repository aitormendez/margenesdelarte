@php
$clase_imagen = PProgramadas::clase();
$clase_tipo = PProgramadas::programadaAnterior();
$ambito = PProgramadas::ambito();
$clase = $clase_imagen . ' ' . $clase_tipo . ' article';
$post_type = get_post_type();
@endphp


<a href="{{ get_permalink() }}" role="article" @php post_class($clase) @endphp>
  <header>
    @if ($post_type == 'event')
      @if ($ambito == 'publico')
        <div class="ambito">
          @svg('flecha-der-peq')
          <span>{{  __('Public call', 'sage') }}</span>
        </div>
      @else
        <div class="ambito">{{  __('Restricted to the research group', 'sage') }}</div>
      @endif

    @endif
    @if (has_post_thumbnail())
      {!! PProgramadas::featured() !!}
    @endif
    <h2 class="entry-title">{{ get_the_title() }}</h2>
    <p class="fecha">{{ PProgramadas::fecha() }}</p>
  </header>
  <div class="entry-summary">
    {!! PProgramadas::extracto() !!}
  </div>
</a>
