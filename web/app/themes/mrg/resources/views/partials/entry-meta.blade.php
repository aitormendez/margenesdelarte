<div class="meta">
  @if (is_singular('production'))

    <div class="bloque">
      <p class="epi">{{ __('Edition', 'sage') }}</p>
      <p>{{ $edicion_term }}</p>
    </div>

    @if ($eventos_relacionados['numero'] !== 'cero')

      <div class="bloque">
          @if ($eventos_relacionados['numero'] == 'singular')
          <div class="grupo">
          <p class="epi">{{ __('Related activity', 'sage') }}:</p>
        @elseif ($eventos_relacionados['numero'] == 'plural')
          <div class="grupo">
          <p class="epi">{{ __('Related activities', 'sage') }}</p>
        @endif
        {!! $eventos_relacionados['eventos'] !!}
      </div>

    @endif

    @if ($areas != '<ul>')
      <div class="bloque">
          <p class="epi">{{ __('Areas de investigación', 'sage') }}</p>
          {!! $areas !!}
      </div>
    @endif

  @elseif (is_singular('event'))

    @php  $ambito = PProgramadas::ambito() @endphp
    @if ($ambito == 'restringido')
      @php $ambito = __('Restricted to the research group', 'sage') @endphp
    @else
      @php $ambito = __('Public call', 'sage') @endphp
    @endif

    <div class="bloque">
      <p class="epi">{{ __('When', 'sage') }}</p>
      <p class="fecha">{{ $data['start_date'] }}</p>
      <p class="horario">{{ $data['horario'] }}</p>
    </div>
    <div class="bloque">
      <p class="epi">{{ __('Where', 'sage') }}</p>
      <div class="direccion">{!! $data['direccion'] !!}</div>
    </div>

    <div class="bloque">
      <p class="epi">{{ __('Ambit', 'sage') }}</p>
      <div class="ambito">{{ $ambito }}</div>
    </div>

    <div class="bloque">
      @if ($related_productions)
        <p class="epi">{{ __('Related documents', 'sage') }}</p>
        @foreach ($related_productions as $related_production)
          <p><a href="{{ get_permalink($related_production->ID) }}">{{ $related_production->post_title }}</a> </p>
        @endforeach
      @endif
    </div>

    @if ($areas != '<ul>')
      <div class="bloque">
          <p class="epi">{{ __('Areas de investigación', 'sage') }}</p>
          {!! $areas !!}
      </div>
    @endif



  @elseif (is_singular('location'))

    <div class="bloque">
      <p class="epi">{{ __('Address', 'sage') }}</p>
      <div class="direccion">
        <p>{{ $direccion }}</p>
        <p>{{ $codigo_postal }}, {{ $City }}</p>
      </div>
    </div>
    @if (sizeof($related_locations) > 0)
      <div class="bloque">
        <p class="epi">{{ __('Activities at this place', 'sage') }}</p>
        <ul class="actividades">
          {!! $related_locations !!}
        </ul>
      </div>
    @endif

  @else
    <time class="updated" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time>
    <p class="byline author vcard">
      {{ __('By', 'sage') }} <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="fn">
        {{ get_the_author() }}
      </a>
    </p>

  @endif
</div>
