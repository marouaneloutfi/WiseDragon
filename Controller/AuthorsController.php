<?php
App::uses('AppController', 'Controller');
/**
 * Authors Controller
 *
 * @property Author $Author
 * @property PaginatorComponent $Paginator
 */
class AuthorsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


 public $paginate = array(
        'limit' => 25,
        'order' => array(
            'Author.name' => 'asc'
        )
    );

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Paginator->settings = $this->paginate;
		$this->Author->recursive = 0;
		$this->set('authors', $this->Paginator->paginate());
	}



}
