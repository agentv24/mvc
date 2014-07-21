<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Login_Model extends Model {

    public function __construct() {
        parent::__construct();
        //echo md5('jack');
    }
    
    public function run(){
        
         $sth = $this->db->prepare("SELECT id, role FROM users WHERE "
                 . "login = :login  AND password = MD5(:password) ");
         
         $sth->execute(array(
             ':login' => $_POST['login'],
             ':password' => $_POST['password']
         ));
         
         $data = $sth->fetch();
        // print_r($data);
         
         //echo $data['role'];
         
         
         //$data = $sth->fetchAll();
         
         $count = $sth->rowCount();
         //print_r($data);
         
         if($count > 0){
             //login
             echo 'we are going to login<br/>';
             Session::init();
             Session::set('role', $data['role']);
             Session::set('loggedIn', true);
             header('location: ../dashboard');
         }
         else{
             //show error
             echo 'we are going to show error<br/>';
             header('location: ../login');
         }
    }

}