@if (is_tax('origin'))
  <div class="page-header centrar-container">
    <div class="centrar">
      <h1>{!! App::title() !!}</h1>
      {!! term_description() !!}
      @if (is_tax('origin', 'grupo'))
        @php
          $term = get_term_by('slug', '2019', 'edition');
        @endphp
        <p>{{ get_field('aditional_info', $term)}}</p>
      @endif
    </div>
  </div>
  @elseif (is_tax('area'))
  <div class="page-header centrar-container">
    <div class="centrar">
      <h1>{!! App::title() !!}</h1>
      {!! term_description() !!}
    </div>
  </div>
@elseif (is_tax('meeting'))
  <div class="page-header">
    {!! $poster !!}
    <div class="centrar-container">
      <div class="centrar">
        <h1>{!! App::title() !!}</h1>
        <div class="meta">
          <p><span class="epi">{{ __('From' , 'sage') }}</span> {{ $lugar_jornadas['start_date']}}</p>
          <p><span class="epi">{{ __('To' , 'sage') }}</span> {{ $lugar_jornadas['end_date'] }}</p>
          <p><span class="epi">{{ __('At' , 'sage') }}</span> <a href="{{ $lugar_jornadas['lugar_permalink'] }}">{{ $lugar_jornadas['lugar_title'] }}</a></p>
          <div class="direccion">{!! $lugar_jornadas['lugar_direccion'] !!}</p>
        </div>
      </div>
      <div class="descripcion">{!! term_description() !!}</div>
    </div>
  </div>
</div>
@elseif (is_tax('edition', '2018'))
  <div class="page-header">
    <h1>Edición 2018</h1>
    {!! term_description() !!}
    @php $term = get_queried_object(); @endphp
    <p>{{ get_field('aditional_info', $term) }}</p>
  </div>

@else
  <div class="page-header">
    <h1>{!! App::title() !!}</h1>
  </div>
@endif
