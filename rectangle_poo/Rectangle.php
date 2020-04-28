<?php

//Un rectangle est une Figure
//Rectangle est une  classe Fille de Figure
class Rectangle extends Figure{
   
         private $largeur; 
       //Methodes Concretes d'instances
        //Constructeur
            public function __construct(){

            }
        //Getters
      
        public function getLargeur(){
            return $this->largeur;
        }
        // //Setters
      
        public function setLargeur($largeur){
            $this->largeur=$largeur;
       }

     //metier=>Uc
      public function demiPerimetre(){
        return $this->largeur+ $this->longueur;
      }
     
      public function surface(){
        return $this->largeur*$this->longueur;
      }
      public function diagonale(){
        return sqrt(pow($this->largeur,2)+pow($this->longueur,2));
      }


    

}


//Objets

//
Rectangle::setUnite("m");

/*$rect1=new Rectangle();
echo "-------Rectangle 1\n";
echo $rect1->getUnite()."\n";
$rect1->setLongueur(10);
echo "Longueur: ".$rect1->getLongueur()."\n";
$rect1->setLargeur(5);
echo "Largeur: ".$rect1->getLargeur()."\n";
echo "-------Rectangle 2\n";
$rect2=new Rectangle();
echo $rect2->getUnite()."\n";
$rect2->setLongueur(20);
echo "Longueur: ".$rect2->getLongueur()."\n";
$rect2->setLargeur(10);
echo "Largeur: ".$rect2->getLargeur()."\n";
*/

?>