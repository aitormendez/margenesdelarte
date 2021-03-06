<?php

namespace App;

/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    /** Add class if sidebar is active */
    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});

/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

/**
 * Template Hierarchy should search for .blade.php files
 */
collect([
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment'
])->map(function ($type) {
    add_filter("{$type}_template_hierarchy", __NAMESPACE__.'\\filter_templates');
});

/**
 * Render page using Blade
 */
add_filter('template_include', function ($template) {
    $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);
    if ($template) {
        echo template($template, $data);
        return get_stylesheet_directory().'/index.php';
    }
    return $template;
}, PHP_INT_MAX);

/**
 * Render comments.blade.php
 */
add_filter('comments_template', function ($comments_template) {
    $comments_template = str_replace(
        [get_stylesheet_directory(), get_template_directory()],
        '',
        $comments_template
    );

    $data = collect(get_body_class())->reduce(function ($data, $class) use ($comments_template) {
        return apply_filters("sage/template/{$class}/data", $data, $comments_template);
    }, []);

    $theme_template = locate_template(["views/{$comments_template}", $comments_template]);

    if ($theme_template) {
        echo template($theme_template, $data);
        return get_stylesheet_directory().'/index.php';
    }

    return $comments_template;
}, 100);

/**
 * Load Google Maps API key for ACF
 * https://discourse.roots.io/t/acf-google-maps-mime-type-text-html-is-not-executable-error/12376/4
 */

add_filter('acf/fields/google_map/api', function ($api) {
 $api['key'] = env('GOOGLE_MAPS_API');

 return $api;
});

/**
 * Crear json con objetos event para fullcalendar
 */
add_action('save_post_event', function(){

 $args_event = [
   'post_type' => 'event',
   'post_status' => 'publish',
   'nopaging' => true,
 ];

 $event_query = new \WP_Query( $args_event );

 if ( $event_query->have_posts() ) {
  	while ( $event_query->have_posts() ) {
  		$event_query->the_post();

      $all_day = get_field('all_day');
      $start_obj = new \DateTime(get_field('start', false, false));
      $end_obj = new \DateTime(get_field('end', false, false));
      $start = $start_obj->format('c') ;
      $end = $end_obj->format('c') ;
      $permalink = get_permalink();


      $array[] = [
        'title'  => get_the_title(),
        'url'    => $permalink,
        'allDay' => $all_day,
        'start'  => $start,
        'end'  => $end,
      ];
  	} // end while
  } // end if


 $fp = fopen(get_template_directory().'/events.json', 'w');
 fwrite($fp, json_encode($array));
 fclose($fp);

 wp_reset_postdata();
});

/**
* Crear json con lugares para Leaflet
*/

add_action('save_post_location', function(){
  $args_location = [
    'post_type' => 'location',
    'post_status' => 'publish',
    'nopaging' => true,
  ];

  $location_query = new \WP_Query( $args_location );

  if ( $location_query->have_posts() ) {
   	while ( $location_query->have_posts() ) {
   		$location_query->the_post();

       $mapa = get_field('mapa');
       $permalink = get_permalink();
       $lat_lng = [$mapa['lat'], $mapa['lng']];


       $array[] = [
         'title'  => get_the_title(),
         'url'    => $permalink,
         'latLng' => $lat_lng,
       ];
   	} // end while
   } // end if

   $fp = fopen(get_template_directory().'/location.json', 'w');
   fwrite($fp, json_encode($array));
   fclose($fp);

   wp_reset_postdata();
});

/**
 * Edición 2018
 */
add_action('pre_get_posts', function($query){
  if (! is_admin() && $query->is_main_query() && $query->is_tax('edition', '2018')) {
     $query->set('post_type', 'production');
  }
});

/**
 * ordenar events por start date en meeting
 */
add_action('pre_get_posts', function($query){

	if( is_admin() ) {
		return $query;
	}

	if( $query->is_tax('meeting') && $query->is_main_query()) {
        $query->set('nopaging', true );
		$query->set('orderby', 'meta_value');
		$query->set('meta_key', 'start');
		$query->set('order', 'ASC');
	}

  return $query;
});



/**
 * Eliminar eventos del 2018 en página de calendario (post type event)
 */
add_action('pre_get_posts', function($query){
  if (! is_admin() && $query->is_main_query() && $query->is_post_type_archive('event')) {

    $taxquery = [
      [
        'taxonomy' => 'edition',
        'field' => 'slug',
        'terms' => array( '2019' ),
        'operator'=> 'IN'
      ]
    ];

    $query->set( 'tax_query', $taxquery );

  }
});

/**
 * Eliminar eventos del 2018 en tax origin
 */
add_action('pre_get_posts', function($query){
  if (! is_admin() && $query->is_main_query() && $query->is_tax('origin')) {

    $taxquery = [
      [
        'taxonomy' => 'edition',
        'field' => 'slug',
        'terms' => array( '2019' ),
        'operator'=> 'IN'
      ]
    ];

    $query->set( 'tax_query', $taxquery );

  }
});
