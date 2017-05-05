<?php  
namespace Drupal\d8_demo\Controller;

use Drupal\node\NodeInterface;
use Drupal\Core\Access\AccessResult;

class D8DemoController {
	public function staticContent() {
		return [ 
			'#markup' => "Hello World"
	    ];
    }   

 	public function dynamicContent($arg) {
    	return [
    		'#markup' => "Arguments is" . $arg
    	];
    }

    public function upcastedContent(NodeInterface $node1, NodeInterface $node2) {
    	return [
    		'#theme' => 'item_list',
    		'#items' => [
		    	 $node1->getTitle(),
		    	 $node2->getTitle(),
    		]
    	];
    }
    public function nodeCreatorCheck(NodeInterface $node1, NodeInterface $node2){
        \Drupal::service('current_user')->id();
        return AccessResult::forbidden();
    }
}