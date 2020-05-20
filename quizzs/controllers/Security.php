<?php

class Security extends Controller{

    function __construct(){
        $this->folder_view="security";
        $this->layout="default";
        //Objet de Validation
        $this->validator=new Validator();
        $this->manager=new CompteManager();

    }

      


    public function showPage(){
        //Afficher la Page de Connection
      
        $this->view="connexion";
        $this->render();
    }
 
    public function creerCompte(){
        $this->view="inscription";
        $this->render();
    
    }


    public function seConnecter(){
        //Recuperation des Donnée =>$_POST
      
        if(isset($_POST['btn_connexion'])){
              //Validation des données saisies
              //Extraire les données d'un tableau associatif =>extract($tab_associatif)
              //$_POST['login']   remplacer $login
              //$_POST['password'] remplacer $password 
                 extract($_POST);

            $this->validator->isVide($login,'login',"Login Obligatoire");
            $this->validator->isVide($password,'password',"Mot de Passe  Obligatoire");
            if($this->validator->isValid()){
               $compte= $this->manager->getUserByLoginPwd($login,$password);
               if($compte!=null){
                   //Compte Existe
                  if($compte->getProfil()==="joueur"){
                      echo "Affichage Page de Jeu";
                  }else{
                      echo "Affichage Page de l'Admin";
                  }
               }else{
                     //Login ou Mot de passe Incorrect
                     $this->data_view['err_login']= "Login ou Mot de passe Incorrect";
                     $this->view="connexion";
                     $this->render();
               }
            }else{
                $errors=$this->validator->getErrors();
              $this->data_view['errors']= $errors;
                $this->view="connexion";
                $this->render();
               
            }
        }
       
      
    }
    public function seDeconnecter(){
        echo "seDeconnecter"; 
    }

}