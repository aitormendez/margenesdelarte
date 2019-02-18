@extends('layouts.app')

@section('content')

  @include('partials.page-header')

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif


<div class="programa">

  <div class="centrar-container">
    <div class="centrar">
      <h2>{{ __('Program', 'sage') }}</h2>
    </div>
  </div>

      @php static $day_check = ''; @endphp

      @while (have_posts()) @php the_post() @endphp
        @php
          $fechas_eventos = TaxonomyMeeting::fechasEventos();
          $current_day = $fechas_eventos['comparador']
        @endphp

        @if ($current_day != $day_check)
          <div class="epigrafe-fecha">
            <div class="centrar-container">
              <div class="centrar">
                <h3>{{ $fechas_eventos['fecha_i18n'] }}</h3>
              </div>
            </div>
          </div>
        @endif
        @php $day_check = $current_day @endphp


        <div class="evento">
          <div class="centrar-container">
            <div class="centrar">
              <div class="date-group">
                <p><span class="epi">{{ __('From', 'sage') }}</span> {{ $fechas_eventos['start_time'] }}</p>
                <p><span class="epi">{{ __('To', 'sage') }}</span> {{ $fechas_eventos['end_time'] }}</p>
              </div>
              <h4 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h4>
            </div>
          </div>
        </div>



      @endwhile

  </div>
</div>

@endsection
