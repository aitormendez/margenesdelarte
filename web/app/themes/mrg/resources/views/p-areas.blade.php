{{--
  Template Name: Áreas de investigación
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile

  @foreach ($todas_areas as $area)

  @php
    $term_link = get_term_link($area);
    $imagen = get_field('imagen', 'area_' . $area->term_id);
    $descrip = @wpautop($area->description);
    // var_dump($imagen);
  @endphp

    <article>

      <h2><a href="{{ $term_link }}">{{ $area->name }}</a></h2>
      {!! wp_get_attachment_image( $imagen, 'large' ); !!}
      <div class="descripcion">{!! $descrip !!}</div>
    </article>

  @endforeach

@endsection
