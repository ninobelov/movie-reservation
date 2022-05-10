<?php

  namespace Drupal\movie_reservation\Controller;

  use Drupal;
  use Drupal\Core\Controller\ControllerBase;
  use Drupal\node\Entity\Node;
  use Symfony\Component\HttpFoundation\Request;


  class MovieController {

    public function moviePage(){

      $query = Drupal::entityQuery('node')
       ->condition('type', 'movie');

      $movies = Node::loadMultiple($query->execute());

      return array(
        '#title'=>'Movie reservation',
        '#theme'=>'information_page',
        '#movies'=>$movies
      );
    }
  }
