<?php

  namespace Drupal\movie_reservation\Controller;

  use Drupal;
  use Drupal\Core\Controller\ControllerBase;
  use Drupal\node\Entity\Node;
  use Symfony\Component\HttpFoundation;


  class MovieController {

    public function moviePage(){

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
        '#title'=>'Movie reservation',
        '#theme'=>'movie_reservation_page',
        '#movies'=>$movies,
        '#genres'=>$genres
      );
    }
  }
