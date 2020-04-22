<?php

//Un Carre est une Figure
//Carre est une  classe Fille de Figure
 class Carre extends Figure {

   //Methodes Concretes d'instances
        //Constructeur
        public function __construct(){

        }

     //metier=>Uc
     public function demiPerimetre(){
        return $this->longueur*2;
      }
      public function surface(){
        return $this->longueur*$this->longueur;
      }
      public function diagonale(){
        return sqrt(pow($this->longueur,2)+pow($this->longueur,2));
      }


 }

?>