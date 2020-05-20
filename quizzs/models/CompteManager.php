<?php

class CompteManager extends Manager{

     function __construct(){
         $this->tableName="Compte";
     }

     public function add($objet){
         $sql="";
         
        return  $this->executeUpdate( $sql)!=0;

     }
     public function update($objet){

     }
    
     public function findById($id){

     }

     public function getUserByLoginPwd($login,$pwd){
         $sql="select * from $this->tableName where login='$login' and password='$pwd'";
         $datas=$this->executeSelect($sql);
         return count($datas)==1? $datas[0]:null;
         /*
          if(ount($datas)==1){
              return $datas[0];
          }else{
              return false;
          }
         */
     }
}