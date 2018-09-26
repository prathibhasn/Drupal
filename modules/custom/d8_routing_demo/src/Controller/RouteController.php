<?php

namespace Drupal\d8_routing_demo\Controller;
use Drupal\user\UserInterface;
use Drupal\node\NodeInterface;
use Drupal\core\Access\AccessResult;
use Drupal\core\Session\AccountInterface;

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
    #ksm($user);
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

  public function listNodes(NodeInterface $node) {
    $owner = $node->getOwner()->getAccountName();
    return [
      '#type' => '#markup',
      '#markup' => $node->getTitle() . '|' . $owner,
    ];
  }

  public function listNodeAccess(NodeInterface $node, AccountInterface $account) {
    return AccessResult::allowedIf(
      $node->getOwnerId() === $account->id()
    );
  }
}