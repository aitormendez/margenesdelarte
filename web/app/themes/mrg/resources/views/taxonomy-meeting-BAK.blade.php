@extends('layouts.app')
{{-- https://wordpress.stackexchange.com/a/25594/77722 --}}

@section('content')

  @include('partials.page-header')


  <div class="centrar-container">
    <div class="centrar">
        {!! $intro_jornadas !!}
    </div>
  </div>

  @php
  global $posts;
  $post_count = 1;
  $total = count($posts);
  // var_dump($total);
  @endphp



  <div class="centrar-container">
    <div class="centrar">
      <h2>{{ __('Program', 'sage') }}</h2>
    </div>
  </div>

  @if (!have_posts())
  <div class="centrar-container">
    <div class="centrar">
      <div class="alert alert-warning">
        {{ __('Sorry, no results were found.', 'sage') }}
      </div>
      {!! get_search_form(false) !!}
    </div>
  </div>
  @else

  <ul class="programa">
      @php static $day_check = ''; @endphp

      @while (have_posts()) @php the_post() @endphp
        @php
          $fechas_eventos = TaxonomyMeeting::fechasEventos();
          $current_day = $fechas_eventos['comparador']
        @endphp

        @if ($post_count == 1 AND $post_count !== $total)
          @if ($current_day != $day_check)

            <li class="un-dia">
              <div class="centrar-container epigrafe-fecha">
                <div class="centrar">
                  <h3>{{ $fechas_eventos['fecha_i18n'] }}</h3>
                </div>
              </div>

              <ul class="lista-eventos-dia">

          @endif

            <li class="evento">
              <div class="centrar-container">
                <div class="centrar">
                  <div class="date-group">
                    <p><span class="epi">{{ __('From', 'sage') }}</span> {{ $fechas_eventos['start_time'] }} h.</p>
                    <p><span class="epi">{{ __('To', 'sage') }}</span> {{ $fechas_eventos['end_time'] }} h.</p>
                  </div>
                  <h4 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h4>
                </div>
              </div>
            </li>
            @php $day_check = $current_day @endphp
        @elseif ($post_count > 1 AND $post_count !== $total)
          @if ($current_day != $day_check)

            </ul>{{-- !lista-eventos-dia --}}
          </li> {{-- !un-dia --}}


            <li class="un-dia">
              <div class="centrar-container epigrafe-fecha">
                <div class="centrar">
                  <h3>{{ $fechas_eventos['fecha_i18n'] }}</h3>
                </div>
              </div>
              <ul class="lista-eventos-dia">

          @endif

            <li class="evento">
              <div class="centrar-container">
                <div class="centrar">
                  <div class="date-group">
                    <p><span class="epi">{{ __('From', 'sage') }}</span> {{ $fechas_eventos['start_time'] }} h.</p>
                    <p><span class="epi">{{ __('To', 'sage') }}</span> {{ $fechas_eventos['end_time'] }} h.</p>
                  </div>
                  <h4 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h4>
                </div>
              </div>
            </li>
            @php $day_check = $current_day @endphp
        @elseif ($post_count == $total)
          @if ($current_day != $day_check)

            </ul>{{-- !lista-eventos-dia --}}
          </li> {{-- !un-dia --}}


            <li class="un-dia">
              <div class="centrar-container epigrafe-fecha">
                <div class="centrar">
                  <h3>{{ $fechas_eventos['fecha_i18n'] }}</h3>
                </div>
              </div>
              <ul class="lista-eventos-dia">

          @endif

            <li class="evento">
              <div class="centrar-container">
                <div class="centrar">
                  <div class="date-group">
                    <p><span class="epi">{{ __('From', 'sage') }}</span> {{ $fechas_eventos['start_time'] }} h.</p>
                    <p><span class="epi">{{ __('To', 'sage') }}</span> {{ $fechas_eventos['end_time'] }} h.</p>
                  </div>
                  <h4 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h4>
                </div>
              </div>
            </li>
          </ul>{{-- !lista-eventos-dia --}}
        </li> {{-- !un-dia --}}
            @php $day_check = $current_day @endphp
        @endif

      @php $post_count++; @endphp
      @endwhile

</ul> {{-- !programa --}}

  @endif


@endsection
