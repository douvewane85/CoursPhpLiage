<?php

class Validator{

   //Attributs 
    private $errors=[];

    //Getters
    public function getErrors(){
        return $this->errors;
    }


    public function isValid(){
        return count($this->errors)===0;
    }


   public  function isVide($nbre,$key,$sms="La Longueur est obligatoire"){
        if(empty($nbre)){
            $this->errors[$key]=$sms;
        }
           
     }
    //R2
    public  function isNumerique($nbre,$key,$sms="La Longueur  doit etre un numerique"){
     if(!is_numeric($nbre)){
        $this->errors[$key]=$sms;
     }
      
    }
    //R4
    public  function isPositif($nbre,$key,$sms="La Longueur est doit etre un numerique positif"){
        if($nbre<=0){
            $this->errors[$key]=$sms;
        }
       
    }
    //R1
    public  function compare($longueur,$largeur,$key,$sms="La Longeur doit etre superieur à la Largeur"){
        if($longueur<=$largeur){
            $this->errors[$key]=$sms;
        }
       
    }

    //Email
    public function isEmail($email,$key,$sms="La Longeur doit etre superieur à la Largeur"){

    }

    //Telephone
    public function isTelephone($telephone,$key,$sms="La Longeur doit etre superieur à la Largeur"){
        
    }
}

?>