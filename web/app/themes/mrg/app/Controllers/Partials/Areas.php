<?php

namespace App\Controllers\Partials;

trait Areas
{
    public function areas()
    {
        global $post;
        $terms = get_the_terms( $post->ID, 'area' );
        $areas = '<ul>';
        if ($terms) {
            foreach ($terms as $term) {
                $term_link = get_term_link($term);
                $areas .= '<li><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></li>';
            }
        }
        return $areas;
    }
}
