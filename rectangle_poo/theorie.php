<?php
/*
  //Classe:Entite formée d' Attributs et méthodes
    a)type classe =>type
       1)Concrete:est un classe qui peut etre intanciée
       2)abstraite:est une classe non instanciable
  //Objet:est une instance d'une classe ou un elemnt d'une classe => une variable
      //Etat: Valeurs de ces attributs à un instant t
      //Comportement:les methodes que l'ont peut appliquer sur un objet


      //regles
        //1)Encapsulation:principe qui permettait de cacher les attributs et d'exposer les methodes d'une classe
               Visibilte ou Portée:
                 private:portée limitée dans la classe
                 public:porteé illimitée
                 protected=>Heritage:Visible dans la classe mere et dans les classes Filles
  //Attributs:Une caracteristique percue sur une classe
       //instances:est une carcteristique percue sur chaque objet de la classe
            private $nomAttribut;
       //classe:Attribut partagé à l'ensembles des instances de la classe.
           private static $nomAttribut;
  //Methodes:fonctionnalités offertent par une classe
        //concretes:une methode qui a une definition
            //Instance:est une methode percue sur chaque objet de la classe
               public function nomMethode(){
                    //code
                }
                //Exemple:
                   //Constructeur:construire une instance ou objet de la classe
                      public function __construct(){

                      }
                   //Getters:methode qui retourne la valeur d'un attribut 
                     //retourne un attribut d'intance
                    public function nomMethode(){
                         return $this->nomAttribut;
                     }
                  //Setters:methode qui modifie la valeur d'un attribut 
                      //modifie un attribut d'intance
                      public function nomMethode($nomAttribut){
                         $this->nomAttribut=$nomAttribut;
                     }

                     //metiers =>UC

           //Classe:methode partagée à l'ensembles des instances de la classe.
             public  static function nomMethode(){
                            //code
                        }

             //Exemple:
              //Getters:methode qui retourne la valeur d'un attribut 
                     //retourne un attribut de classe
                   public static  function nomMethode(){
                         return self::nomAttribut;
                     } 
             //Setters:methode qui modifie la valeur d'un attribut 
                      //modifie un attribut de classe
                      public static function nomMethode($nomAttribut){
                         self::nomAttribut=$nomAttribut;
                     } 
               //metiers =>UC                 

        //abstraites: dont on ne connait pas la définition
               //Instance:est une methode percue sur chaque objet de la classe
                    public abstract function nomMethode();
                    //metiers =>UC
             //Classe:methode partagée à l'ensembles des instances de la classe.
                   public  abstract static function nomMethode();
                   //metiers =>UC

*/

?>