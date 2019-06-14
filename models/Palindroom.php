<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../integration/DbHandler.php';
class Palindroom{
    private $text;
    private $flippedText;
    
function flipText($text){
    $this->text = $text;
    
    $flippedText= "";
    for($i=strlen($text)-1;$i>=0;$i--){
        $flippedText = $flippedText . $text[$i];
        
    }
     //    return $flippedText;
    $this->flippedText = $flippedText;
  
}
    function getFlippedText(){
        return $this->flippedText;
}
    function heeftFlippedTextEenBetekenis(){
        $db = new DbHandler();
        return $db->findWord($this->flippedText);
    }
}   
