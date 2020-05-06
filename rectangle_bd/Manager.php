<?php
abstract class Manager{
     //Chaine de Connexion
      protected  $pdo=null;//Connexion est fermée
      protected  $tableName;

      //Ouvrir la Connexion
      private function getConnexion(){
          if($this->pdo==null){
              $this->pdo = new PDO('mysql:host=localhost;dbname=gestion_figure','root','');
              //Activer les erreurs de PDO
              $this->pdo ->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              //Retourne les données d'une requete select sous la forme d'un tableau Associatif
              $this->pdo ->setAttribute (PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
          }
          
      }

      private function closeConnexion(){
        if($this->pdo!=null){
            $this->pdo=null;
        }
               
    }

      public function executeUpdate($sql){
           $this->getConnexion();
             $nbreLigne= $this->pdo->exec($sql);
           $this->closeConnexion();
           return $nbreLigne;
          
      }
      
      public function executeSelect($sql){

        $this->getConnexion();
        $dataBd=$this->pdo->query($sql);
       
        $datas=[];
           foreach($dataBd as $rowBd) {
            //tuple => objet   
            $datas[] =new $this->tableName($rowBd) ;
            /* 
               CarreManager
               $datas[] =new Carre($rowBd)
               RectangleManager
               $datas[] =new Rectangle($rowBd)
            */
           }

        $this->closeConnexion();
         return $datas;
    
       }

      public abstract function add($objet);
      public abstract function update($objet);
      public abstract function delete($id);
      public abstract function findAll();
      public abstract function findById($id);

}