<?php
 
  if(isset($_POST['btn_submit'])){
    if($_POST['btn_submit']==="calcul"){
                    $validator=new Validator();
                    $longueur=$_POST['longueur'];

                    $validator->isVide($longueur,"longueur");
                

                    //Pas Erreur
                    if($validator->isValid()){

                                $validator->isNumerique($longueur,'longueur');
                              
                               if($validator->isValid()){
                                    $validator->isPositif($longueur,'longueur');
                                  
                                    if($validator->isValid()){
                                           $carre=new Carre();
                                           $carre->setLongueur($longueur);
                                            
                                            $_SESSION['id']++;
                                            $id=  $_SESSION['id'];
                                            $_SESSION["resultat".$id]=  $carre;
                                       
                                    }

                               }

                    }


                    $errors=$validator->getErrors();
                    if(isset($errors['longueur'])){
                        $longueur="";
                    }
                   


    }else{
        //Clique sur le bouton de réinitialisation
           session_destroy();
    }

  }
?>


     <div class="container mt-5">


         <form action="" method="post">
             <div class="form-group row">
                 <label for="inputName" class="col- col-form-label">Longueur</label>
                 <div class="col-6">
                     <input type="text" class="form-control" name="longueur" id="inputName" placeholder="" value="<?=$longueur;?>">

                 </div>
                 <?php
                 if(isset($errors['longueur'])){

                  ?>
                    <div class="alert alert-danger col-4  ">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Erreur!</strong> <?=$errors['longueur'];?>
                    </div>
                    <?php
                     }
                  ?>
             </div>
           
             </div>
             <div class="form-group row">
                 <div class="offset-sm-4 col-sm-2">
                     <button type="submit" class="btn btn-secondary" name="btn_submit" value="init">Reinitialisation</button>
                 </div>
                 <div class=" col-sm-2">
                     <button type="submit" class="btn btn-primary" name="btn_submit" value="calcul">Calculer</button>
                 </div>
             </div>
         </form>


         <?php
             if(isset($_POST['btn_submit'])&& $_POST['btn_submit']==="calcul" && count($errors)===0){
      ?>
     
               <table class="table bordered">
                   <thead>
                       <tr>
                           <th>Demi Perimetre</th>
                           <th>Perimetre</th>
                           <th>Surface</th>
                           <th>Diagonale</th>
                       </tr>
                   </thead>
                   <tbody>
                   <?php
                      foreach ($_SESSION as $key => $carre) {
                          if($key!=="id"){
                   ?>
                            <tr>
                                <td scope="row"><?= $carre->demiPerimetre();?></td>
                                <td><?= $carre->perimetre();?></td>
                                <td><?= $carre->surface();?></td>
                                <td><?= $carre->diagonale();?></td>
                            </tr>
                    <?php
                        }
                      }
                   ?>

                   </tbody>
               </table>


     <?php
     }
      ?>
     </div>


   