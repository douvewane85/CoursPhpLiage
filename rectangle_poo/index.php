<?php
   require_once("./Validator.php");
   require_once("./Figure.php");
   require_once("./Rectangle.php");
   require_once("./Carre.php");
   $errors=[];
   $resultat=[];
   $longueur="";
   $largeur="";
   session_start();
  // session_destroy();//toutes les variables de session sont éfacées
  //unset($var):supprime une variable => contraire   isset()
  //unset($_SESSION['id']) //supprime la clé id dans le tableau $_SESSION

   if(!isset($_SESSION['id'])){
       $_SESSION['id']=0;
   }


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
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

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


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>