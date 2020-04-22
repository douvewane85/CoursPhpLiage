<?php
/*
     Boucles
     Tableaux
     //Variables de types composés
        //Déclaration d'un Tableaux
           $tab=[]  ou  $tab=array()
       //Initilalisation=> données des Valeurs
          a) Lors de la Déclaration
             indice 0   1    2        3
              $tab=[23,2.5,'Bonjour',null]
         b)  Déclaration et apres initialisation
            $tab=[] //Facutative
            $tab[]=23  =>   $tab[0]=23
            $tab[]=2.5   => $tab[1]=2.5
            $tab[]='Bonjour'  =>   $tab[2]=23
            $tab[]=null    =>   $tab[3]=23
            $tab[]=true    =>   $tab[4]=23

        c)  Acces aux donnees
             $tab=[23,2.5,'Bonjour',null]
             //Un a un
             echo $tab[0]  //23
             echo $tab[1]
             echo $tab[2]
             echo $tab[3]  //null
             //Boucle
             for($i=0;$i<=3; $i++){
                 echo $tab[$i];
             }
            NB:
            //Général => Récuperer l'indice et la valeur
            foreach($tab as $indice=>$valeur){
                echo $valeur;
            }

            //Abrégé => Récuperer  la valeur
            foreach($tab as $valeur){
                echo $valeur;
            }

        d) Quelques fonctions prédefinies
           1) count($tableau)=>taille du tableau
           exemple:
            $tab=[23,2.5,'Bonjour',null]
            count($tab) =>4
           2) isset($var): teste l'existence de la variable
              true: Si variable existe
              false: Si variable n'existe pas
               exemple:
               isset($x)  => false
               $x=1;
               isset($x)    => true

              $tab=[23,2.5,'Bonjour',null]
              isset($tab[0])  //true
              isset($tab[4])  //false

          Associatifs
          //Classe Etudiant(id,nom,prenom,age)
             Tableau Numérique                   Tableau Associatif
             $etu1=[1,"Diop","Abdou",18]           $etu1=["id"=>1,"nom"=>"Diop","prenom"=>"Abdou","age"=>18]
             echo $etu1[0];                       => echo $etu1["id"];
             echo $etu1[1];                       => echo $etu1["nom"];
             echo $etu1[2];                       => echo $etu1["prenom"];
             echo $etu1[3];                       => echo $etu1["age"];
                                                   foreach($etu1 as $key=>$val){
                                                    echo $key;// id nom prenom age
                                                    echo $val; //1 Diop Abdou 18
                                                   }
                                                   if(isset($etu1))=> true
                                                   if(isset($etu1['id'])) =>true
                                                   if(isset($etu1['taille'])) =>false


     Formulaires  : Interaction entre votre systeme et l'utilisateur
                    //Entrer des données et de les soumettre au serveur
        exemple
        //Déclaration
        <form action="nompage.php" method="post">
                 <input type="text"   name="nom1" id="" value="Bonjour">
                 <input type="submit"  name="nom2" value="Envoyer">
        </form>

        //Recuperation
        1) Lieu de Récuperation   =>  action="nompage.php"
        2) method de récupération =>  method="post" => $_POST associatif
            $_POST=[
              "nom1"=>"Bonjour",
              "nom2"=>"Envoyer",
            ]

            echo $_POST['nom1'];
            echo $_POST['nom2'];

            if(isset($_POST['nom1']))  => verifier le clique du bouton

         NB:
         $_NOMTABLEAU: Tableaux globaux PHP



     Fonctions:Lot Traiment nommé
     // Reutilisation du meme traitement
      //1)Définition d'une fonction

            //Parametres ou arguments representent les information nécéssaire à la fonction
            //Parametres ou arguments  d'une Fonction sont facultatifs
            function nomFonction($parametre1,$parametre2, ,$parametren){
                //instruction1;

                //instructionn;
            }
        NB:les Parametres utilisés dans la définition d'une fonction sont appelés Parametres formels
        Exemple:
        //Somme de deux nombres
            //Sans Type de Retour=> consomme le Résultat
            //f(a,b)=a+b
            function somme($a,$b){
                $som=$a+$b;
                echo $som;
            }
           //tester si un nombre est pair

            //Avec Type de Retour=> Partage leur Résultat avec d'autre fonction
            function parite($a){
                $result="";
               if($a%2==0){
                   $result="Pair";
               }else{
                     $result="Impair";
               }
               return $result;
            }

            //somme des valeurs paires d'un tableau
            function somTab($tab){
                $som=0;
                foreach($tab as $val){
                    $result=parite($val);
                    if($result=="Pair"){
                      $som=$som+val;
                    }

                }

                return $som;

            }

    //2)Appel d'une fonction  consiste à donner des arguments reels à la fonction
        f(2,3)=2+3=>5
         somme(2,5) // 8
         $x=2; $y=3;
         somme($x,$y);  //5

        $result= parite(2);
        echo $result;//Pair

//Session : ceux sont des variables sonr déclarees dans le serveur
//et peuvent exister entre un ou plusieurs requetes

   1) Manipulation
         //ouvrir session_start()
         //$_SESSION permet de déclarer et de manipuler les Variables sessions
         //$_SESSION est un tableau associatif
         //detruire la session en utilisant session_destroy()

*/

?>

