<?php
    if (isset($_GET["modif"]) && $_GET["modif"] == true)
    {
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

        if(strlen($_POST["password"]) > 0)
        {
            if(strlen($_POST["password"]) >= 8)
            {
                changePasswordbyIDUser($_POST["password"],$_SESSION["user_id"]);
            }
            else
            {
                $passwordError = "Le mot de passe doit contenir au moins 8 caractères";
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
    }
?>

<div class="reg">
    <div class="infos_compte">
        <form method="post" action="index.php?user=account&modif=true">
            <h1>Informations de compte</h1>
            <label>Nom d'utilisateur</label>
            <br>
            <p><?php echo($_SESSION['username'])?></p>
            <input type="text" placeholder="Nouveau nom d'utilisateur" name="username">
            <br>
            <label>E-mail</label>
            <br>
            <p><?php echo($_SESSION['mail'])?></p>
            <input type="text" placeholder="Nouvel e-mail" name="e-mail">
            <br>
            <br>
            <p>Souhaitez-vous modifier votre mot de passe ?</p>
            <label class="password">Ancien mot de passe</label>
            <br>
            <input type="password" placeholder="Ancien mot de passe" name="password">
            <br>
            <label class="password">Nouveau mot de passe</label>
            <br>
            <input type="password" placeholder="Nouveau mot de passe" name="password">
            <br>
            <label class="password">Confirmation nouveau mot de passe</label>
            <br>
            <input type="password" placeholder="Confirmer mot de passe" name="password">
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
            if (isset($_GET["modif"]) && $_GET["modif"] == true)
            {
                 ?>
            <div class = "success">
                <?= "Votre modification a bien été prise en compte"?>
            </div>
            <?php
            }

        }
    ?>
</div>
