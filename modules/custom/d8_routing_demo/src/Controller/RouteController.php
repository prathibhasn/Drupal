<?php

namespace Drupal\d8_routing_demo\Controller;
use Drupal\user\UserInterface;

class RouteController {
  public function hello_world(){
    return [
      '#type' => 'markup',
      '#markup' => 'Hello World',
    ];
  }
  public function helloDynamic($name){
    return [
      '#type' => 'markup',
      '#markup' => 'Hello ' . $name,
    ];
  }
  public function helloDynamicTitleCallback($name){
    return 'Title ' . $name;
  }

  public function helloDynamicEntity(UserInterface $user){
    return [
      '#type' => 'markup',
      '#markup' => 'User name is: ' .  $user->getUserName()
    ];
  }

  public function helloDynamicEntityTitleCallback(UserInterface $user){
    return [
        '#type' => 'markup',
        '#markup' => 'User title is: ' .  $user->getUserName()
      ];
  }
}