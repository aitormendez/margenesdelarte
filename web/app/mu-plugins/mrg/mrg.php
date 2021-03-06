<?php
/**
 * Plugin Name: mrg-CPT
 * Description: CPT para mrg
 * Author: Aitor Méndez
 * Author URI: https://e451.net
 * Text Domain: mrg-CPT
 * License: MIT License
 * https://github.com/johnbillion/extended-cpts
 */

namespace mrg;

add_action( 'init', function() {

  load_textdomain('mrg-CPT', WPMU_PLUGIN_DIR . '/' .plugin_basename( dirname( __FILE__ ) ) . '/languages/mrg-CPT-' . get_locale() . '.mo');

  $args_production = [
      'name'                  => _x( 'Production', 'Post Type General Name', 'mrg-CPT' ),
      'singular_name'         => _x( 'Production', 'Post Type Singular Name', 'mrg-CPT' ),
      'menu_name'             => __( 'Productions', 'mrg-CPT' ),
      'name_admin_bar'        => __( 'Production', 'mrg-CPT' ),
      'archives'              => __( 'Production Archives', 'mrg-CPT' ),
      'attributes'            => __( 'Production Attributes', 'mrg-CPT' ),
      'parent_item_colon'     => __( 'Parent Production:', 'mrg-CPT' ),
      'all_items'             => __( 'All Productions', 'mrg-CPT' ),
      'add_new_item'          => __( 'Add New Production', 'mrg-CPT' ),
      'add_new'               => __( 'Add New', 'mrg-CPT' ),
      'new_item'              => __( 'New Production', 'mrg-CPT' ),
      'edit_item'             => __( 'Edit Production', 'mrg-CPT' ),
      'update_item'           => __( 'Update Production', 'mrg-CPT' ),
      'view_item'             => __( 'View Production', 'mrg-CPT' ),
      'view_items'            => __( 'View Productions', 'mrg-CPT' ),
      'search_items'          => __( 'Search Production', 'mrg-CPT' ),
      'not_found'             => __( 'Not found', 'mrg-CPT' ),
      'not_found_in_trash'    => __( 'Not found in Trash', 'mrg-CPT' ),
      'featured_image'        => __( 'Featured Image', 'mrg-CPT' ),
      'set_featured_image'    => __( 'Set featured image', 'mrg-CPT' ),
      'remove_featured_image' => __( 'Remove featured image', 'mrg-CPT' ),
      'use_featured_image'    => __( 'Use as featured image', 'mrg-CPT' ),
      'insert_into_item'      => __( 'Insert into item', 'mrg-CPT' ),
      'uploaded_to_this_item' => __( 'Uploaded to this item', 'mrg-CPT' ),
      'items_list'            => __( 'Items list', 'mrg-CPT' ),
      'items_list_navigation' => __( 'Items list navigation', 'mrg-CPT' ),
      'filter_items_list'     => __( 'Filter items list', 'mrg-CPT' ),
  ];

  $cols_production = [
    'post_author',
  ];

  $supports_production = [
    'author',
    'title',
    'editor',
    'thumbnail',
    'excerpt',
  ];

  register_extended_post_type(
      'production',
      [
          'show_in_rest' => true,
          'show_in_feed' => true,
          'labels'       => $args_production,
          'admin_cols'   => $cols_production,
          'supports'     => $supports_production,
          'admin_cols' => [
            'edition' => [
              'taxonomy' => 'edition'
            ],
          ],
          'admin_filters' => [
            'edition' => [
              'taxonomy' => 'edition'
            ],
          ],
      ]
  );

  $args_events = [
      'name'                  => _x( 'Event', 'Post Type General Name', 'mrg-CPT' ),
      'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'mrg-CPT' ),
      'menu_name'             => __( 'Events', 'mrg-CPT' ),
      'name_admin_bar'        => __( 'Event', 'mrg-CPT' ),
      'archives'              => __( 'Event Archives', 'mrg-CPT' ),
      'attributes'            => __( 'Event Attributes', 'mrg-CPT' ),
      'parent_item_colon'     => __( 'Parent Event:', 'mrg-CPT' ),
      'all_items'             => __( 'All Events', 'mrg-CPT' ),
      'add_new_item'          => __( 'Add New Event', 'mrg-CPT' ),
      'add_new'               => __( 'Add New', 'mrg-CPT' ),
      'new_item'              => __( 'New Event', 'mrg-CPT' ),
      'edit_item'             => __( 'Edit Event', 'mrg-CPT' ),
      'update_item'           => __( 'Update Event', 'mrg-CPT' ),
      'view_item'             => __( 'View Event', 'mrg-CPT' ),
      'view_items'            => __( 'View Event', 'mrg-CPT' ),
      'search_items'          => __( 'Search Event', 'mrg-CPT' ),
      'not_found'             => __( 'Not found', 'mrg-CPT' ),
      'not_found_in_trash'    => __( 'Not found in Trash', 'mrg-CPT' ),
      'featured_image'        => __( 'Featured Image', 'mrg-CPT' ),
      'set_featured_image'    => __( 'Set featured image', 'mrg-CPT' ),
      'remove_featured_image' => __( 'Remove featured image', 'mrg-CPT' ),
      'use_featured_image'    => __( 'Use as featured image', 'mrg-CPT' ),
      'insert_into_item'      => __( 'Insert into item', 'mrg-CPT' ),
      'uploaded_to_this_item' => __( 'Uploaded to this item', 'mrg-CPT' ),
      'items_list'            => __( 'Items list', 'mrg-CPT' ),
      'items_list_navigation' => __( 'Items list navigation', 'mrg-CPT' ),
      'filter_items_list'     => __( 'Filter items list', 'mrg-CPT' ),
  ];

  $cols_event = [
    'post_author' => [
    	'title'      => 'Post author',
    	'post_field' => 'post_author',
    ],
    'edition' => [
      'title'    => __('Edition', 'mrg-CPT'),
      'taxonomy' => 'edition',
    ],
    'ambit' => [
      'title'    => __('Ambit', 'mrg-CPT'),
      'taxonomy' => 'ambit',
    ],
    'start_date' => array(
      'title'       => __('Start Date', 'mrg-CPT'),
      'meta_key'    => 'start',
      'date_format' => 'D, d M Y',
      'default'  => 'DESC',
    ),
  ];

  $supports_event = [
    'author',
    'title',
    'editor',
    'thumbnail',
    'excerpt',
  ];

  register_extended_post_type(
      'event',
      [
          'show_in_rest'  => true,
          'show_in_feed'  => true,
          'labels'        => $args_events,
          'admin_cols'    => $cols_event,
          'supports'      => $supports_event,
          'admin_filters' => [
            'edition' => [
              'taxonomy' => 'edition',
            ],
            'ambit' => [
              'taxonomy' => 'ambit',
            ],
          ],
      ]
  );

  $args_location = [
    'name'                  => _x( 'Location', 'Post Type General Name', 'mrg-CPT' ),
    'singular_name'         => _x( 'Location', 'Post Type Singular Name', 'mrg-CPT' ),
    'menu_name'             => __( 'Locations', 'mrg-CPT' ),
    'name_admin_bar'        => __( 'Location', 'mrg-CPT' ),
    'archives'              => __( 'Location Archives', 'mrg-CPT' ),
    'attributes'            => __( 'Location Attributes', 'mrg-CPT' ),
    'parent_item_colon'     => __( 'Parent Location:', 'mrg-CPT' ),
    'all_items'             => __( 'All Locations', 'mrg-CPT' ),
    'add_new_item'          => __( 'Add New Location', 'mrg-CPT' ),
    'add_new'               => __( 'Add New', 'mrg-CPT' ),
    'new_item'              => __( 'New Location', 'mrg-CPT' ),
    'edit_item'             => __( 'Edit Location', 'mrg-CPT' ),
    'update_item'           => __( 'Update Location', 'mrg-CPT' ),
    'view_item'             => __( 'View Location', 'mrg-CPT' ),
    'view_items'            => __( 'View Locations', 'mrg-CPT' ),
    'search_items'          => __( 'Search Locations', 'mrg-CPT' ),
    'not_found'             => __( 'Not found', 'mrg-CPT' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'mrg-CPT' ),
    'featured_image'        => __( 'Featured Image', 'mrg-CPT' ),
    'set_featured_image'    => __( 'Set featured image', 'mrg-CPT' ),
    'remove_featured_image' => __( 'Remove featured image', 'mrg-CPT' ),
    'use_featured_image'    => __( 'Use as featured image', 'mrg-CPT' ),
    'insert_into_item'      => __( 'Insert into item', 'mrg-CPT' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'mrg-CPT' ),
    'items_list'            => __( 'Items list', 'mrg-CPT' ),
    'items_list_navigation' => __( 'Items list navigation', 'mrg-CPT' ),
    'filter_items_list'     => __( 'Filter items list', 'mrg-CPT' ),
  ];

  register_extended_post_type(
      'location',
      [
          'show_in_rest' => true,
          'show_in_feed' => true,
          'labels'       => $args_location,
      ]
  );

  register_extended_taxonomy( 'edition',
    [
      'production',
      'event',
      'location',
    ],
    [
      'meta_box' => 'simple',
      'hierarchical' => false,
  		'singular' => __( 'Edition', 'mrg-CPT' ),
  		'plural'   => __( 'Editions', 'mrg-CPT' ),
	   ]
  );

  register_extended_taxonomy( 'ambit',
    [
      'event'
    ],
    [
      'meta_box' => 'radio',
      'hierarchical' => false,
  		'singular' => __( 'Ambit', 'mrg-CPT' ),
  		'plural'   => __( 'Ambits', 'mrg-CPT' ),
	   ]
  );

  register_extended_taxonomy( 'meeting',
    [
      'event'
    ],
    [
      'meta_box' => 'radio',
      'hierarchical' => false,
  		'singular' => __( 'Meeting', 'mrg-CPT' ),
  		'plural'   => __( 'Meetings', 'mrg-CPT' ),
	   ]
  );

  register_extended_taxonomy( 'origin',
    [
      'production',
      'event'
    ],
    [
      'meta_box' => 'radio',
      'hierarchical' => false,
  		'singular' => __( 'Origin', 'mrg-CPT' ),
  		'plural'   => __( 'Origin', 'mrg-CPT' ),
	   ]
  );

  register_extended_taxonomy( 'area',
    [
      'production',
      'event'
    ],
    [
      'meta_box' => 'simple',
      'hierarchical' => false,
	   ]
  );

}, 0 );
