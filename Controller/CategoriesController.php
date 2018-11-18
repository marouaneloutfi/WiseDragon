<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 * @property PaginatorComponent $Paginator
 */
class CategoriesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */


 public $paginate = array(
        'limit' => 25,
        'order' => array(
            'Category.name' => 'asc'
        )
    );



public function index(){
 $this->Paginator->settings = $this->paginate;
	$this->Category->recursive = 0;
	$this->set('categories', $this->Paginator->paginate());



}

}
