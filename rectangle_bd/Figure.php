<?php
//Figure est la Classe Mere de Rectangle
//Figure est la Classe Mere de Carre
abstract class Figure{
     //Attributs
     protected $longueur;//cote
     protected static $unite;
    
       //Getters
       public function getLongueur(){
        return $this->longueur;
       }

        // //Setters
    public function setLongueur($longueur){
        $this->longueur=$longueur;
   }

    //Methodes Concretes de classe
    public static function getUnite(){
        return self::$unite;
        }
        public static function setUnite($unite){
        self::$unite = $unite;
        }

    //metier=>Uc
    public abstract function demiPerimetre();
      public function perimetre(){
        return $this->demiPerimetre()*2;
      }
      public abstract function surface();
      public abstract function diagonale();



}

?>

