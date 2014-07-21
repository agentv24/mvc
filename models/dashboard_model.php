<?php

class Dashboard_Model extends Model {

	function __construct() {
            parent::__construct();
		//echo 'Dash model';
	}
	
	function xhrInsert() {
                //echo 'inside dashboard-> xhrInsert';
		$text = $_POST['text'];
                
                $sth = $this->db->prepare('INSERT INTO data (text) VALUES (:text)' );
                $sth->execute(array(':text' => $text ));
                
                $data = array('text' => $text, 'id' => $this->db->lastInsertID());
                echo json_encode($data);
	}
        
        function xhrGetListings(){
            //echo 'inside dashboard-> xhrGetListings';
            $sth = $this->db->prepare('SELECT * FROM data');
           $sth->setFetchMode(PDO::FETCH_ASSOC);
            $sth->execute();
            $data = $sth->fetchAll();
            echo json_encode($data);
        }
        
        function xhrDeleteListing(){
            //echo 'inside dashboard-> xhrGetListings';
            $id = $_POST['id'];
            $sth = $this->db->prepare('DELETE  FROM data WHERE id = "'.$id.'"');
            $sth->execute();
            
        }

}