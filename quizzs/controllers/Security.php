<?php

class Security extends Controller{

    function __construct(){
 
        $this->folder_view="security";
        $this->layout="default";
        //Objet de Validation
        $this->validator=new Validator();
        $this->manager=new CompteManager();
         session_start();
        

    }

      


    public function showPage(){
        //Afficher la Page de Connection
      
        $this->view="connexion";
        $this->render();
    }

    public function inscription($layout="default"){
        //Afficher la Page de Connection
          $this->layout=$layout;
          $this->view="inscription";
          $this->render();
    }


 
    public function creerCompte(){


         //Joueur ou Admin

           //Creation d'un compte par un Joueur
           $profil="joueur";
           $layout="default";

           //Creation d'un compte par un admin
           if(isset($_SESSION['userConnect'])){
               
               $profil="admin";
               $layout="admin";
            } 
         
        if(isset($_POST['btn_inscription'])){
               extract($_POST);

          
    
          //Valide les Données Obligatoires
          $this->validator->isVide($login,'login',"Login Obligatoire");
          $this->validator->isVide($password1,'password1',"Mot de Passe  Obligatoire");
          $this->validator->isVide($password2,'password2',"Mot de Passe  Obligatoire");
          $this->validator->isVide($nom,'nom',"Nom  Obligatoire");
          $this->validator->isVide($prenom,'prenom',"Prenom  Obligatoire");
          if($this->validator->isValid()){
                 //Validation Password
                 $this->validator->isEgal($password1,$password2,"password2","Les deux Mots de Passe ne sont pas identiques");
                 if($this->validator->isValid()){
                   //Login existe
                   $user=$this->manager->loginExist($login);
                   if($user==null){
                       //Scenario Nominal
                       $compteUser=new Compte();
                       $compteUser->login=$login;
                       $compteUser->password=$password1;
                       $compteUser->fullName=$prenom." ".$nom;
                       $compteUser->profil=$profil;
                        $result=$this->manager->add( $compteUser);
                        if($result){
                            $this->data_view['err_login']= "Compte Créé avec Succes";
                            $this->inscription($layout);
                        }
                       
                   }else{
                       $this->data_view['err_login']= "Login Existe Déja";
                       $this->inscription($layout);
                   }
                  
                 }else{
                    $errors=$this->validator->getErrors();
                    $this->data_view['errors']= $errors;
                    $this->inscription($layout);
                 }
                

                
              
          }else{
                $errors=$this->validator->getErrors();
                $this->data_view['errors']= $errors;
                $this->inscription($layout);
               
            }
        }else{
            $this->inscription($layout);
        }
    
    }


    public function seConnecter(){
        //Recuperation des Donnée =>$_POST
        
        if(isset($_POST['btn_connexion'])){
             //Au clique du bouton de connexion
           
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
                    
                        $_SESSION['userConnect']=$compte;
                     
                  if($compte->getProfil()==="joueur"){
                          echo "Affichage Page de Jeu";
                  }else{
                        
                         $this->inscription("admin");
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
        }else{
            //Actualisation de Page
            $this->inscription("admin");
        }
       
      
    }
    public function seDeconnecter(){
        //Destruction des données utlisateur
           session_destroy();
           unset( $_SESSION['userConnect']);
         //Redirection vers la page de Connexion
             $this->view="connexion";
             $this->render();
    }

   

}