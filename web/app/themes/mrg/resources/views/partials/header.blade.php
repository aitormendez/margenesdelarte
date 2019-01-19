<header class="banner">
  <div class="container">
    <a class="brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
    <p class="descripcion">{{ $edicion->name }}</p>
    <p class="descripcion">{{ $edicion->description }}</p>
    <div class="logo">
      <div class="video"></div>
      <div class="ruido"></div>
    </div>
    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav>
  </div>
</header>
