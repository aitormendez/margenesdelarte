<footer class="content-info">
  <div class="container">
    @if (has_nav_menu('general_navigation'))
      {!! wp_nav_menu(['theme_location' => 'general_navigation', 'menu_class' => 'nav']) !!}
    @endif
    @if (has_nav_menu('contents_navigation'))
      {!! wp_nav_menu(['theme_location' => 'contents_navigation', 'menu_class' => 'nav']) !!}
    @endif
    @if (has_nav_menu('activities_navigation'))
      {!! wp_nav_menu(['theme_location' => 'activities_navigation', 'menu_class' => 'nav']) !!}
    @endif
    @if (has_nav_menu('etc_navigation'))
      {!! wp_nav_menu(['theme_location' => 'etc_navigation', 'menu_class' => 'nav']) !!}
    @endif
    <div class="social">
      <!-- Facebook icon -->
      <a href="https://www.facebook.com/margenesdelarte/" target="_blank">
        <i class="fab fa-facebook"></i>
      </a>

      <!-- Twitter icon -->
      <a href="#">
        <i href="https://twitter.com/margenesdelarte" target="_blank" class="fab fa-twitter"></i>
      </a>
    </div>
    <div class="logos">
      <div class="logo-aguila">
        @svg('logo-aguila')
      </div>
      <div class="logo-cam">
        @svg('logo-cam-negativo')
      </div>
    </div>


    @php dynamic_sidebar('sidebar-footer') @endphp
  </div>
</footer>
