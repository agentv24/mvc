<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Database extends PDO{

    function __construct() {
       // parent::__construct('mysql;host=localhost;dbname=mvc', 'root', '');
        /* Connect to an ODBC database using driver invocation */
        $hostname= DB_HOST;
        $dbname= DB_NAME;
$dsn = DB_TYPE.":host=$hostname;dbname=$dbname";
$user = DB_USER;
$password = DB_PASS;
        try {
    parent::__construct($dsn, $user);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
 
    }

   
}
