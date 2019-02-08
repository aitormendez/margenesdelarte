<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_tax('origin', 'invitado')) {
            return __('Guests', 'sage');
        }
        if (is_tax('origin', 'grupo')) {
            return __('Research group', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    public function edicion()
    {
      $year = get_field('year', 'option');
      $term = get_term_by( 'name', $year, 'edition');
      // $description = term_description( $term_id, 'edicion' );

      return $term;
    }
}
