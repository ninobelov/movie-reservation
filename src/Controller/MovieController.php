<?php

  namespace Drupal\movie_reservation\Controller;

  use Drupal;
  use Drupal\Core\Controller\ControllerBase;
  use Drupal\node\Entity\Node;
  use Symfony\Component\HttpFoundation\Request;


  class MovieController {

    public function moviePage(){

      $query = Drupal::entityQuery('node')
     //  ->condition('nid', 1)
       ->condition('type', 'movie');

      $movies = Node::loadMultiple($query->execute());

    //  $nids = $query->execute();

      $data = array(
        'name'=>'Robot',
        'email'=>'robo1992@gmail.com'
      );

      return array(
        '#title'=>'Movie reservation',
        '#theme'=>'information_page',
        '#items'=>$data,
        '#movies'=>$movies
      );
    }
  }
