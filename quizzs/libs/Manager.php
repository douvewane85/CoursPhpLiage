<?php
abstract class Manager{
     //Chaine de Connexion
      protected  $pdo=null;//Connexion est fermée
      protected  $tableName;

      //Ouvrir la Connexion
      private function getConnexion(){
          if($this->pdo==null){
              $this->pdo = new PDO('mysql:host=localhost;dbname=quizz_liage','root','');
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
               CompteManager
               $datas[] =new Compte($rowBd)
               
            */
           }

        $this->closeConnexion();
         return $datas;
    
       }

      public abstract function add($objet);
      public abstract function update($objet);
      public  function delete($id){
        $sql="delete from $this->tableName where id=$id";
        return  $this->executeUpdate( $sql)!=0;
     }
     public function findAll(){
        $sql="select * from  $this->tableName";
        return $this->executeSelect($sql);
     }
      public abstract function findById($id);

}