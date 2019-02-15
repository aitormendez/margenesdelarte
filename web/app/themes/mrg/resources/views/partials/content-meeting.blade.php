@php
  $fechas_eventos = TaxMeeting::fechasEventos();
  $current_day = $fechas_eventos['comparador']
@endphp


<p>{{ 'day_check 1: ' . $day_check}}</p>
<p>{{ 'current_day: ' . $current_day}}</p>

@if ($current_day != $day_check)
  <h1>{{ $fechas_eventos[fecha_i18n] }}</h1>
@endif

@php $day_check = $current_day @endphp
<p>{{ 'day_check 2: ' . $day_check}}</p>

<h2 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
