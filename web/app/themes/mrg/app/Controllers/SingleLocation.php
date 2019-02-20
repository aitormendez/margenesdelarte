<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class SingleLocation extends Controller
{
  public function relatedLocations()
  {

    $related_locations = get_posts([
			'post_type' => 'event',
			'meta_query' => [
        [
					'key' => 'donde', // name of custom field
					'value' => get_the_ID(),
					'compare' => 'LIKE'
				]
			]
		]);

    $list = "";

    foreach ($related_locations as $related_location) {
      $list .= '<li><a href="' . get_permalink($related_location->ID) .'">' . $related_location->post_title . '</li></a>';
    }

    return $list;
  }

  protected $acf = true;

  use Partials\Edicion;

}
