<header class="banner">
  <div class="container">
    <a class="nombres" href="{{ home_url('/') }}">
      <p class="brand">{{ get_bloginfo('name', 'display') }}</p>
      <p class="nombre"></p>
      <p class="edicion">{{ $edicion->name }}</p>
      <p class="descripcion">{{ $edicion->description }}</p>
    </a>
    <div class="logo">
      <div class="video"></div>
      <div class="ruido"></div>
    </div>
    <nav class="nav-container cerrado">
      <div id="cerrar"></div>
      @if (has_nav_menu('general_navigation'))
        {!! wp_nav_menu(['theme_location' => 'general_navigation', 'menu_class' => 'nav']) !!}
      @endif
      @if (has_nav_menu('contents_navigation'))
        {!! wp_nav_menu(['theme_location' => 'contents_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav>
  </div>
  <div id="hamb"></div>
  <a id="flecha-1" class="flecha-aba"></a>
</header>
