@php
$clase_imagen = PProgramadas::clase();
$clase_tipo = PProgramadas::programadaAnterior();
$clase = $clase_imagen . ' ' . $clase_tipo . ' centrar-container';
$post_type = PProgramadas::postType();
@endphp



<article @php post_class($clase) @endphp>
  <header class="centrar">
    @if ($clase_tipo == 'programada' && $post_type == 'event')
      <div class="next-call">
        <div class="bloque-izquierda">
          @svg('flecha-der-med')
        </div>
        <div class="bloque-derecha">
          <p class="fecha">{{ PProgramadas::fecha() }}</p>
          <p class="aviso">{{ __('Next call', 'sage') }}</p>
        </div>
      </div>
    @endif
    @if (is_tax())
      <div class="tipo-de-post">
        @if ($post_type == 'event')
          <div class="bloque-izquierda">
            <p class="post-type">{{ __('Activitiy', 'sage') }}</p>
          </div>
          <div class="bloque-derecha">
            <i class="fas fa-calendar-alt fa-2x"></i>
          </div>
        @elseif ($post_type == 'production')
          <div class="bloque-izquierda">
            <p class="post-type">{{ __('Document', 'sage') }}</p>
          </div>
          <div class="bloque-derecha">
            <i class="fas fa-file-alt fa-2x"></i>
          </div>
        @endif
      </div>
    @endif

    {!! PProgramadas::featured() !!}
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
  </header>
  @if (is_tax())
    <div class="entry-summary centrar">
      @php the_excerpt() @endphp
    </div>
  @endif
</article>
