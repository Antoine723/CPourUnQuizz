<?php
    $no_modif=false;
    $user_infos=getAllByUserId($_SESSION['user_id']);
    if (isset($_GET["modif"]) && $_GET["modif"] == true)
    {
        $old_password_size=strlen($_POST["old_password"]);
        $new_password_size=strlen($_POST["new_password"]);
        $conf_new_password_size=strlen($_POST["conf_new_password"]);
        if(strlen($_POST["username"]) > 0)
        {
            if(empty(getAllByUserName($_POST["username"]))) 
            {
                changeUsernamebyIDUser($_POST["username"],$_SESSION["user_id"]);
            }
            else
            {
                $userNameError = "Ce nom d'utilisateur est déjà utilisé";
            }   
        }

        if( isPossibleToUpdatePassword($old_password_size, $new_password_size, $conf_new_password_size))
        {
            if(password_verify($_POST["old_password"],$user_infos[0]['Password']) && $new_password_size >= 8 && $_POST["new_password"]==$_POST["conf_new_password"])
            {
                changePasswordbyIDUser($_POST["password"],$_SESSION["user_id"]);
            }
            else if($new_password_size < 8)
            {
                $passwordError = "Le mot de passe doit contenir au moins 8 caractères";
            }
            else if($_POST["new_password"]!=$_POST["conf_new_password"])
            {
                $passwordError = "Votre nouveau mot de passe et sa confirmation ne correspondent pas";
            }
            else if(!password_verify($_POST["old_password"],$user_infos[0]['Password']))
            {
                $passwordError = "Votre ancien mot de passe est incorrect";
            }
        }

        if(strlen($_POST["e-mail"]) > 0)
        {
            if(empty(getUsernameAndPasswordAndMailByMail($_POST["e-mail"],$_SESSION["user_id"])))
            {
                if(filter_var($_POST['e-mail'], FILTER_VALIDATE_EMAIL))
                {
                    changeMailbyIDUser($_POST["e-mail"], $_SESSION["user_id"]);
                }
                else
                {
                    $mailError = "L'adresse mail n'est pas au bon format";
                }
            }
            else
            {
                $mailError = "L'adresse mail est déjà utilisée";
            }
        }

        if( !isPossibleToUpdatePassword($old_password_size, $new_password_size, $conf_new_password_size) && ($old_password_size>0 || $new_password_size>0 || $conf_new_password_size>0) ) 
        {
            $passwordError = "Veuillez remplir tous les champs nécessaires à la modification du mot de passe pour pouvoir le modifier";
        }
        else{
            $no_modif=true;
        }
    }

    function isPossibleToUpdatePassword($old_password_size, $new_password_size, $conf_new_password_size){
        $password_size_array=array();
        if($old_password_size>0) array_push($password_size_array,$old_password_size);
        if($new_password_size>0) array_push($password_size_array,$new_password_size);
        if($conf_new_password_size>0) array_push($password_size_array,$conf_new_password_size);
        if(count($password_size_array)==3) return true;
        else return false;
    }
?>
<div class="reg">
    <div class="infos_compte">
        <form method="post" action="index.php?user=account&modif=true">
            <h1>Informations de compte</h1>
            <label>Nom d'utilisateur</label>
            <br>
            <p><?php echo(getAllByUserId($_SESSION['user_id'])[0]['Username'])?></p>
            <input type="text" placeholder="Nouveau nom d'utilisateur" name="username">
            <br>
            <label>E-mail</label>
            <br>
            <p><?php echo(getAllByUserId($_SESSION['user_id'])[0]['Mail'])?></p>
            <input type="text" placeholder="Nouvel e-mail" name="e-mail">
            <br>
            <br>
            <p>Souhaitez-vous modifier votre mot de passe ?</p>
            <label class="password">Ancien mot de passe</label>
            <br>
            <input type="password" placeholder="Ancien mot de passe" name="old_password">
            <br>
            <label class="password">Nouveau mot de passe</label>
            <br>
            <input type="password" placeholder="Nouveau mot de passe" name="new_password">
            <br>
            <label class="password">Confirmation nouveau mot de passe</label>
            <br>
            <input type="password" placeholder="Confirmer mot de passe" name="conf_new_password">
            <div class="button">
                <input type="submit" value="Modifier">
            </div>
        </form>
    </div>

</div>
<div>
    <?php
        if(isset($userNameError))
        {
            ?>
            <div class = "err">
                <?= $userNameError?>
            </div>
            <?php
        }
        else if (isset($passwordError))
        {
            ?>
            <div class = "err">
                <?= $passwordError?>
            </div>
            <?php
        }
        else if (isset($mailError))
        {
            ?>
            <div class = "err">
                <?= $mailError?>
            </div>
            <?php
        }
        else
        {
            if (isset($_GET["modif"]) && $_GET["modif"] == true &&!$no_modif)
            {
                 ?>
            <div class = "success">
                <?= "Votre modification a bien été prise en compte"?>
            </div>
            <?php
            }
            if(isset($_GET["modif"]) && $_GET["modif"] == true && $no_modif)
            {
                ?>
                 <div class = "err">
                    <?= "Vous n'avez rien modifié"?>
                </div>
            <?php
            }

        }
    ?>
</div>
