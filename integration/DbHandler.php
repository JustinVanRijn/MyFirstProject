<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dbhandler
 *
 * @author sproe
 */

$db = new DbHandler();
if ($db->findWoord("lepel") == TRUE){
   $db->printWoord();
}
else{
   echo "Sorry geen kaas vandaag"; 
}


class DbHandler {
    //dit noemen in OO een attribute
    private $woord;
    
    //een functie in OO heet een method
    function findWoord($woord){
        $result = FALSE;
        $this->woord = $woord;
                
    $options = [
        PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES      => false,
    ];

    $host = '127.0.0.1';
    $charset = 'utf8mb4';
    $db = 'palindroom';
    $user = 'root';
    $password = "";
    
    $host = "mysql:host=$host;dbname=$db;charset=$charset";
    
    try{
        //stap 2: Connect
        $conn = new PDO($host, $user, $password, $options);
        //stap 3: run the query
        $stmt = $conn->query($sql);
        //Stap 4
        if ($stmt->rowCount() == 1){
            $result = TRUE;
        }
        return $result;
    }
    catch(PDOEsception $e) {
        echo "jouw tekst" . $e->getMessage() . "(".$e->getCode().").";
        
    }
    }
        
    }
    
    function printWoord(){
        echo $this->woord;
    }

