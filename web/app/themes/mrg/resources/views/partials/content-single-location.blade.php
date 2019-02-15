<article @php post_class() @endphp>
  <header>
    <h1 class="entry-title">{!! get_the_title() !!}</h1>
    @include('partials/entry-meta')
  </header>
  <div class="entry-content">
    @php the_content() @endphp
  </div>
  <div class="map-container">
    <div
      id="map"
      class="map" lat="{{ $mapa->lat }}"
      lng="{{ $mapa->lng }}"
      nombre="{{ $mapa->address }}"
    >
  </div>
</article>
