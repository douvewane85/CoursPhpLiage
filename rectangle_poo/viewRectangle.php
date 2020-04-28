<?php
  if(isset($_POST['btn_submit'])){
    if($_POST['btn_submit']==="calcul"){
                    $validator=new Validator();
                    $longueur=$_POST['longueur'];
                    $largeur=$_POST['largeur'];

                    $validator->isVide($longueur,"longueur");
                    $validator->isVide($largeur,"largeur","La Largeur est obligatoire");

                    //Pas Erreur
                    if($validator->isValid()){

                                $validator->isNumerique($longueur,'longueur');
                                $validator->isNumerique($largeur,'largeur',"La Largeur est doit etre un numerique");
                               if($validator->isValid()){
                                    $validator->isPositif($longueur,'longueur');
                                    $validator->isPositif($largeur,'largeur',"La Largeur est doit etre un numerique positif");
                                    if($validator->isValid()){
                                        $validator->compare($longueur,$largeur,'all');
                                        if($validator->isValid()){
                                           $rectangle=new Rectangle();
                                            $rectangle->setLongueur($longueur);
                                            $rectangle->setLargeur($largeur);
                                            $_SESSION['id']++;
                                            $id=  $_SESSION['id'];
                                            $_SESSION["resultat".$id]= $rectangle;


                                        }
                                    }

                               }

                    }


                    $errors=$validator->getErrors();
                    if(isset($errors['longueur'])){
                        $longueur="";
                    }
                    if(isset($errors['largeur'])){
                        $largeur="";
                    }


    }else{
        //Clique sur le bouton de réinitialisation
           session_destroy();
    }

  }
?>


     <div class="container mt-5">
<?php
    if(isset($errors['all'])){
            $longueur="";
            $largeur="";
?>
        <div class="alert alert-danger col-6 ml-5">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Erreur!</strong> <?php echo $errors['all'];?>
        </div>
 <?php
    }
 ?>

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
             <div class="form-group row">
                 <label for="inputName" class="col-sm-1-12 col-form-label">Largeur</label>
                 <div class="col-6 ml-3">
                     <input type="text" class="form-control" name="largeur" id="inputName" placeholder="" value="<?=$largeur;?>">
                 </div>
                 <?php
                 if(isset($errors['largeur'])){

                  ?>
                    <div class="alert alert-danger col-4  ">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Erreur!</strong> <?=$errors['largeur'];?>
                    </div>
                    <?php
                     }
                  ?>
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
                      foreach ($_SESSION as $key => $rectangle) {
                          if($key!=="id"){
                   ?>
                            <tr>
                                <td scope="row"><?=$rectangle->demiPerimetre();?></td>
                                <td><?=$rectangle->perimetre();;?></td>
                                <td><?=$rectangle->surface();?></td>
                                <td><?=$rectangle->diagonale();;?></td>
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


  