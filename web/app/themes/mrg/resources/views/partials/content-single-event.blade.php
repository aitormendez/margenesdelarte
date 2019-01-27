<article @php post_class() @endphp>
  <header>
    <div class="meta">
      <p class="edicion">{{ __('Activity', 'sage') }}. {{ __('Edition', 'sage') }}: {{ $ed }}</p>
    </div>

    <h1 class="entry-title"> {{ get_the_title() }}</h1>
    @include('partials/entry-meta')
  </header>
  <div class="entry-content">
    @php the_content() @endphp
  </div>
  <div class="map-container">
    <div
      id="map{{ get_the_ID() }}"
      class="map" lat="{{ $data['mapa']['lat'] }}"
      lng="{{ $data['mapa']['lng'] }}"
      nombre="{{ $data['nombre_lugar'] }}"
      link="{{ $data['link_location'] }}"
    >
  </div>


  </div>
</article>
