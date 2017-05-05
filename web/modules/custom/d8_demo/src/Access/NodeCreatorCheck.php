<?php
namespace Drupal\d8_demo\Access;

use Drupal\Core\Access\AccessResult;
use Drupal\core\Routing\Access\AccessInterface;
use Drupal\Core\Session\AccountProxy;
use Drupal\node\NodeInterface;

class NodeCreatorCheck implements AccessInterface {
	private $account;
	public function __construct(AccountProxy $account){
		$this->account = $account;

	}
 public function access(NodeInterface $node1, NodeInterface $node2){

 if ($node1->getOwnerId() === $this-> account->id()){
 	return AccessResult::allowed();
 }
 else{
 	return AccessResult::forbidden();
 }
 }

}