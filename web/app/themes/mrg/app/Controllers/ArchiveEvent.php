<?php

namespace App\Controllers;

use Sober\Controller\Controller;



class ArchiveEvent extends Controller
{
  // public function fechasJson()
  // {
  //   global $posts;
  //   $array = [];
  //
  //   foreach ($posts as $post) {
  //
  //     $all_day = get_field('all_day');
  //     $start_obj = new \DateTime(get_field('start', false, false));
  //     $end_obj = new \DateTime(get_field('end', false, false));
  //     $start = $start_obj->format('c') ;
  //     $end = $end_obj->format('c') ;
  //     $permalink = get_permalink();
  //
  //
  //     $array[] = [
  //       'title'  => $post->post_title,
  //       'url'    => $permalink,
  //       'allDay' => $all_day,
  //       'start'  => $start,
  //       'end'  => $end,
  //     ];
  //   }
  //
  //
  //
  //   return json_encode($array);
  // }
}
