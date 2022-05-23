<?php

  namespace Drupal\movie_reservation\Controller;

  use Drupal;
  use Drupal\Core\Controller\ControllerBase;
  use Drupal\node\Entity\Node;
  use Symfony\Component\HttpFoundation;


  class MovieController
  {

    public function moviePage()
    {

      $genres = Drupal::entityTypeManager()
        ->getStorage('taxonomy_term')
        ->loadByProperties(['vid' => 'movie_type']);

      $id = Drupal::request()->query->get('movie_type') ;

      $query = Drupal::entityQuery('node')
       ->condition('type', 'movie');

      if(!empty($id)) {
        $query->condition('field_movie_type', $id);
      }

      $movies = Node::loadMultiple($query->execute());

      return array(
        '#title' => 'Movie reservation',
        '#theme' => 'movie_reservation_page',
        '#movies' => $movies,
        '#genres' => $genres
      );
    }

    public function savePage(){

      $save_reservation = Drupal::request()->query->get('save_reservation');

      if (isset($save_reservation)) {
        $db = Drupal::database();

        $title = Drupal::request()->get('title');
        $day = Drupal::request()->get('day');
        $genre = Drupal::request()->get('genre');
        $name = Drupal::request()->get('name');
        $date = date('Y-m-d H:i:s');

        $info = $db->insert('reservations');
        $info->fields([
          'day_of_reservation' => $day,
          'time_of_reservation' => $date,
          'reserved_movie_name' => $title,
          'reserved_movie_genre' => $genre,
          'customer_name' => $name
        ]);
        $info->execute();

      }
      return array();
    }
  }

