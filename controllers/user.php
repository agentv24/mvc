<?php

class User extends Controller {

	function __construct() {
		parent::__construct();
                Session::init();
                $logged = Session::get('loggedIn');
                $role = Session::get('role');
                
                if($logged == false || $role != 'owner'){
                    
                    //get out of here
                    Session::destroy();
                    header('location: ../login');
                    exit;
                }
                
                //print_r($_SESSION);
                
               // $this->view->js = array('dashboard/js/default.js');
	}
	
	function index() {
		//echo 'INSIDE INDEX INDEX';
               $this->view->userList = $this->model->userList();
		$this->view->render('user/index');
	}
	
        public function create(){
            //echo 1;
            $data = array();
            $data['login'] = $_POST['login'];
            $data['password'] = md5($_POST['password']);
            $data['role'] = $_POST['role'];
            
            // @TODO  check for errors
            
            $this->model->create($data);
            header('location: '.URL. 'user');
        }
        public function edit($id){
            
            //fetch user
            $this->view->user = $this->model->userSingleList($id);
            $this->view->render('user/edit');
            
            
        }
        public function editSave($id){
            
            $data = array();
            $data['id'] = $id;
            $data['login'] = $_POST['login'];
            $data['password'] = md5($_POST['password']);
            $data['role'] = $_POST['role'];
            
            //@TODO do your error checking
             $this->model->editSave($data);
            header('location: '.URL. 'user');
            
        }
        
        public function delete($id){
            $this->model->delete($id);
            header('location: '.URL. 'user');
            
        }
       
        
}