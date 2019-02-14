<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;
use StoutLogic\AcfBuilder\FieldsBuilder;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    $data = array(
        'homeUrl' => get_bloginfo( 'url' ),
        'presentGif' => \App\asset_path('images/videogif/present.gif'),
        'actiGif' => \App\asset_path('images/videogif/actividades.gif'),
        'grupoGif' => \App\asset_path('images/videogif/grupo.gif'),
        'edicionGif' => \App\asset_path('images/videogif/edicion.gif'),
        'contactoGif' => \App\asset_path('images/videogif/contacto.gif'),
        'invitadosGif' => \App\asset_path('images/videogif/invitados.gif'),
        'jornadasGif' => \App\asset_path('images/videogif/jornadas.gif'),
        'marker' => \App\asset_path('images/img/marker-red.png'),
        'themeUri' => get_theme_file_uri(),
    );
    wp_localize_script('sage/main.js', 'mrg', $data);


}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    // add_theme_support('soil-clean-up');
    // add_theme_support('soil-jquery-cdn');
    // add_theme_support('soil-nav-walker');
    // add_theme_support('soil-nice-search');
    // add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'general_navigation' => __('General Navigation', 'sage'),
        'contents_navigation' => __('Contents Navigation', 'sage'),
        'activities_navigation' => __('Activities Navigation', 'sage'),
        'etc_navigation' => __('Etc Navigation', 'sage'),
        'contents_footer_navigation' => __('Contents Footer Navigation', 'sage'),
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});

/**
 * stage switcher https://github.com/roots/wp-stage-switcher
 */
$envs = [
  'development' => 'https://margenesdelarte.test',
  'staging'     => 'https://stage.margenesdelarte.com',
  'production'  => 'https://margenesdelarte.com'
];
define('ENVIRONMENTS', serialize($envs));

/**
 * ACF options page https://www.advancedcustomfields.com/resources/options-page/
 */
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(
    [
      'page_title' 	=> 'Edición',
      'updated_message'	=> 'Edición actualizada',
      'update_button'		=> 'Guardar',
    ]
  );

}

/**
 * Initialize ACF Builder
 */
add_action('init', function () {
    collect(glob(config('theme.dir').'/app/fields/*.php'))->map(function ($field) {
        return require_once($field);
    })->map(function ($field) {
        if ($field instanceof FieldsBuilder) {
            acf_add_local_field_group($field->build());
        }
    });
});

if( function_exists('acf_add_local_field_group') );

/**
 * image sizes
 */
add_image_size( 'very-large', 2000 );

/**
 * lang
 */
add_action('after_setup_theme', function () {
    load_theme_textdomain('sage', get_template_directory() . '/lang');
});
