<?php
App::uses('AppController', 'Controller');
/**
 * Quotes Controller
 *
 * @property Quote $Quote
 * @property PaginatorComponent $Paginator
 */
class QuotesController extends AppController {




	public $components = array('Paginator','Santize');

	
	public function search(){
		$found = false;
		$search_query = str_replace('+',' ',$this->request->query['query']);
		$this->set('search_query',$search_query);
	
		$paginate = array(
    	'Category' => array(
        'limit' => 10,
        'conditions' => array('Category.name LIKE' =>'%'.$search_query.'%')
        
    ),
    	'Author' => array(
    		'limit' =>10,
    	'conditions' => array('Author.name LIKE' => '%'.$search_query.'%')
    	));

		$this->Paginator->settings = $paginate;

		$this->loadModel('Author');
		$this->loadModel('Category');

		$this->Author->recursive = -1;
		$this->Category->recursive = -1;

		
		  try{
       	$categories = $this->Paginator->paginate('Category');
       $authors = $this->Paginator->paginate('Author');
   }
   	catch(Exception $e){

       	}
		if(isset($authors) && $categories){
			$this->set('authors',$authors);
			$found = true;
		}
       
		if(isset($categories) && $categories ){
			$this->set('categories',$categories);
			$found = true;
		}
	if(!$found){
		$this->render('/Pages/404');


	}
        

	



	}



	public function  random(){
		$this->Quote->recursive = 0;
		$quote = $this->Quote->find('first',array(
				'order' => 'rand()'));

		if($quote){

		if($this->request->is('ajax')){

			if(isset($quote['Author']['name'])){
				$msg = array('content' => $quote['Quote']['content'], 'author' =>$quote['Author']['name']);
			}
		else{
			$msg = array('content' => $quote['Quote']['content']);
		}
				
			
		return new CakeResponse(
            array(
                'type' => 'application/json',
                'status' => 200,
                'body' => json_encode($msg)
            )
        );

        $this->render(false, false);

		} 

	else{

		
		$this->render('/Pages/home');


	}}

	else{
		$this->render('/Pges/404');

		}

	}

	public function categories($category_name = null) {
		
		$this->loadModel('Category');
		$this->Category->recursive = -1;
		$this->Quote->recursive = 0;
		$category_name = str_replace('_', ' ', $category_name);
		$category = $this->Category->find('first',array('conditions' => array(
			'name' => strtolower($category_name))));
		if($category){

		
		$total = $this->Quote->find('count',array('conditions'=>array(
				'category_id' => $category['Category']['id'])));
		$quote = $this->Quote->find('first',array('conditions'=>array(
				'category_id' =>  $category['Category']['id'],
				),
				'order' => 'rand()'));

		if(!$quote){
			$this->render('/Pages/404');


		}
		
		if($this->request->is('ajax')){
			if(isset($quote['Author']['name'])){
				$msg = array('content' => $quote['Quote']['content'], 'author' =>$quote['Author']['name']);
			}
		else{
			$msg = array('content' => $quote['Quote']['content']);
		}
				
			
		return new CakeResponse(
            array(
                'type' => 'application/json',
                'status' => 200,
                'body' => json_encode($msg)
            )
        );

        $this->render(false, false);

		}
		
		$this->set('quote',$quote);
		$this->set('title',$category_name);
		$this->set('type','categories');
		$this->render('/Quotes/quote');

	}

	else{

		$this->render('/Pages/404');


	}

		
	}

		public function authors($author_name = null) {
		
		$this->loadModel('Author');
		$this->Author->recursive = -1;
		$this->Quote->recursive = 0;
		$author_name = str_replace('_', ' ', $author_name);
		$author = $this->Author->find('first',array('conditions' => array(
			'name' => strtolower($author_name))));
		if($author){

		
		$total = $this->Quote->find('count',array('conditions'=>array(
				'author_id' => $author['Author']['id'])));
		$quote = $this->Quote->find('first',array('conditions'=>array(
				'author_id' =>  $author['Author']['id']),
				'order' => 'rand()'	
	));

		if(!$quote){
			$this->render('/Pages/404');

		}
		
		if($this->request->is('ajax')){
			if(isset($quote['Author']['name'])){
				$msg = array('content' => $quote['Quote']['content'], 'author' =>$quote['Author']['name']);
			}
		else{
			$msg = array('content' => $quote['Quote']['content']);
		}
				
			
		return new CakeResponse(
            array(
                'type' => 'application/json',
                'status' => 200,
                'body' => json_encode($msg)
            )
        );

        $this->render(false, false);

		}
		
		$this->set('quote',$quote);
		$this->set('title',$author_name);
		$this->set('type','authors');
		$this->render('/Quotes/quote');

	}

	else{

		$this->render('/Pages/404');


	}

		
	}





}
