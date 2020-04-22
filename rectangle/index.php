<?php
   require_once("./fonctions.php");
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

                    $longueur=$_POST['longueur'];
                    $largeur=$_POST['largeur'];

                    if(isVide($longueur)){
                        $errors['longueur']="La Longueur est obligatoire";
                    }
                    if(isVide($largeur)){
                        $errors['largeur']="La Largeur est obligatoire";
                    }

                    //Pas Erreur
                    if(count($errors)===0){

                            if(!isNumerique($longueur)){
                                $errors['longueur']="La Longueur est doit etre un numerique";
                            }
                            if(!isNumerique($largeur)){
                                $errors['largeur']="La Largeur est doit etre un numerique";
                            }
                            if(count($errors)===0){

                                if(!isPositif($longueur)){
                                    $errors['longueur']="La Longueur est doit etre un numerique positif";
                                }
                                if(!isPositif($largeur)){
                                    $errors['largeur']="La Largeur est doit etre un numerique positif";
                                }

                                if(count($errors)===0){
                                    //compare($longueur,$largeur)===false  equivalent !compare($longueur,$largeur)
                                    if(!compare($longueur,$largeur)){
                                        $errors['all']="La Longeur doit etre superieur à la Largeur";
                                    }else{
                                        $resultat['dp']=demi_perimetre($longueur,$largeur);
                                        $resultat['p']=perimetre($longueur,$largeur);
                                        $resultat['s']=surface($longueur,$largeur);
                                        $resultat['dg']=diagonale($longueur,$largeur);
                                        $_SESSION['id']++;
                                        $id=  $_SESSION['id'];
                                        $_SESSION["resultat".$id]=$resultat;


                                    }
                                }

                            }

                    }

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
     <ul class="">
         <li class="nav-item">
                 Dem-Perimètre: <?=$resultat['dp'];?>
         </li>
         <li class="nav-item">
                 Perimètre :    <?=$resultat['p'];?>
         </li>
         <li class="nav-item">
              Surface  :       <?=$resultat['s'];?>
         </li>
         <li class="nav-item">
              Diagonale:      <?=$resultat['dg'];?>
         </li>
     </ul>
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
                      foreach ($_SESSION as $key => $resultat) {
                          if($key!=="id"){
                   ?>
                            <tr>
                                <td scope="row"><?=$resultat['dp'];?></td>
                                <td><?=$resultat['p'];?></td>
                                <td><?=$resultat['s'];?></td>
                                <td><?=$resultat['dg'];?></td>
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