<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../models/Palindroom.php';
if (!empty($_POST)) {
    if (CheckPostArguments()){
        $woord = $_POST["naam"];
       if(strlen($woord) > 1){
           $palindroom = new Palindroom();
           $palindroom->flipText($woord);
           echo $palindroom->getFlippedText();
           if ($palindroom->heeftFlippedTextEenBetekenis()){
              $viewData = array(
                  "palindroom" => $palindroom->getFlippedText(),
                  "message" => "heeft een betekenis",
                  "action" => "Vul nog een woord in of sluit de browser"
              );
               
           }else {
              $viewData = array(
              "palindroom" => $palindroom->getFlippedText(),
              "message" => "heeft geen betekenis",
              "action" => "Vul nog een woord in of sluit de browser"
               );
           }
           
       }else {
           $viewData = array(
              "palindroom" => "",
              "message" => "heeft geen woord ingevuld",
              "action" => "Vul een woord in of sluit de browser"
               );
       }
       include_once '../views/View.php';
       
    }else{
        http_response_code(400);
    }
}
else {
    http_response_code(400);
}

function CheckPostArguments(){
$validArguments = array("naam", "submit");  
$aantalArgumentenInPost = sizeOf($validArguments);
    
    if(sizeOf($_POST)== $aantalArgumentenInPost){
        for ($index=0 ;$index < $aantalArgumentenInPost ;$index++){
            if (!isset($_POST[$validArguments[$index]])){
                // als het niet is gevonden:
                return FALSE;
            }
        }
        return TRUE;
    }
  return FALSE;
}

?>