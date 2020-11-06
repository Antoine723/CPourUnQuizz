<!DOCTYPE html>
<div class="reg">
    <div class="infos_compte">
        <form method="post" action="account.php">
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