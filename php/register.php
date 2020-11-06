<!DOCTYPE html>
<div class="reg">
    <form method="post" action="index.php">
        <div class="formular">
            <label>Nom d'utilisateur <span class="symb">*</span></label>
            <br>
            <input required type="text" placeholder="Nom d'utilisateur" name="username_reg">
            <br>
            <label>Mot de passe <span class="symb">*</span></label>
            <br>
            <input required type="password" placeholder="Mot de passe" name="password_reg">
            <br>
            <label>Confirmer mot de passe <span class="symb">*</span></label>
            <br>
            <input required type="password" placeholder="Confirmer mot de passe" name="password_conf">
            <br>
            <label>E-mail <span class="symb">*</span></label>
            <br>
            <input required type="text" placeholder="E-mail" name="mail">
            <br>
        </div>
        <div class="button">
            <input type="submit" value="S'inscrire">
        </div>
        <p class="info_required">
            <span class="symb">*</span> = obligatoires
        </p>
    </form>

</div>