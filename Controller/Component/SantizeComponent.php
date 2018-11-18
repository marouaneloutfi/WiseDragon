<?php

App::uses('Component', 'Controller');

class SantizeComponent extends Component {
   
	

   public function santizeQuote($quote,$category_id){

   	$atag = $this->checkAuthor($quote);
   	if($atag){
   		$eatag = strpos($quote,'</a>',$atag);
   		$linkend = strpos($quote,'>', $atag);
   		$author_name = substr($quote,$linkend + 1 , $eatag - ($linkend +1));
   			$quote = substr($quote,0, $atag);
   		return array('category_id' => $category_id,
   					 'content' => $quote,
   					 'author_id' => $this->exists($author_name));
   	}
   
   	return false;

   }


  public function checkAuthor($quote){

  	return strpos($quote, '<a ');

  }

  public function exists($author_name){
  	 $Author = ClassRegistry::init('Author');

  	 $author = $Author->find('first',array('conditions'=>array(
  	 						'name' => $author_name)));
  	 if(!$author){
  	 	$Author->create();
  	 	$author = $Author->save(array('name' => $author_name));

  	 } 
  	 return $author['Author']['id'];

  }

   public function getCategory($category_name){
     $Category = ClassRegistry::init('Category');

     $category = $Category->find('first',array('conditions'=>array(
                'name' => $category_name)));
     if(!$category){
      $Category->create();
      $category = $Category->save(array('name' => $category_name));

     } 
     return $category['Category']['id'];

  }

 
 
 


 


}