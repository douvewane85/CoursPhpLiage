
<div id="connexion-form" class="w-25">

                    
            <div class="connexion-form-header">
                <h3 class="bgPrimary h5 p-3 m-0">Login form</h3>
                
            </div>

            <div class="connexion-form-body bgWhite p-3">
                  <?php
                        if(isset($err_login)){ 
                     ?>
                        <small id="fileHelpId" class="form-text text-danger font-weight-bold "><?=$err_login?></small>
                    <?php
                        }
                    ?>
                <form class="py-2" method="post" action="security/seConnecter">
                    <div class="form-group ">
                        <input type="text" placeholder="Login" name="login" class="form-control" id="email">
                     <?php
                        if(isset($errors['login'])){ 
                     ?>
                        <small id="fileHelpId" class="form-text text-danger font-weight-bold "><?=$errors['login']?></small>
                    <?php
                        }
                    ?>
                    
                    </div>

                    <div class="form-group py-2">
                        <input type="password" placeholder="Password" name="password" class="form-control">
                        <?php
                        if(isset($errors['password'])){ 
                        ?>
                        <small id="fileHelpId" class="form-text text-danger font-weight-bold "><?=$errors['password']?></small>
                    <?php
                        }
                    ?>
                    </div>


                    <button type="submit" class="btn btn-primary" name="btn_connexion">Connexion</button>
                    <a href="security/creerCompte" class="text-secondary pl-5">S'inscrire pour jouer</a>
                </form>
            </div>

</div>


