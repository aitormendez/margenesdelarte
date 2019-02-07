@php
$clase_imagen = PProgramadas::clase();
$clase_tipo = PProgramadas::programadaAnterior();
$clase = $clase_imagen . ' ' . $clase_tipo . ' centrar-container';
@endphp



<article @php post_class($clase) @endphp>
  <header class="centrar">
    @if ($clase_tipo == 'programada')
      @svg('flecha-der-med')
    @endif
    <p class="fecha">{{ PProgramadas::fecha() }}</p>
    @if ($clase_tipo == 'programada')
      <p class="aviso">
        {{ __('Next call', 'sage') }}
      </p>
    @endif
    {!! PProgramadas::featured() !!}
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h2>
  </header>
</article>
