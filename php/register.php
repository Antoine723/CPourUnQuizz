<!DOCTYPE html>
<html lang="fr">
    <link rel="stylesheet" href="../css/register.css">
    <link rel="stylesheet" href="../css/common.css">
    <?php include("header.php")?>

        <body>
            <div class="reg">
                <form method="post" action="register.php">
                    <div class="formular">
                        <label>Nom d'utilisateur</label>
                        <br>
                        <input type="text" placeholder="Nom d'utilisateur" name="username">
                        <br>
                        <label>Mot de passe</label>
                        <br>
                        <input type="password" placeholder="Mot de passe" name="password">
                        <br>
                        <label>Confirmer mot de passe</label>
                        <br>
                        <input type="password" placeholder="Confirmer mot de passe" name="password">
                        <br>
                        <label>E-mail</label>
                        <br>
                        <input type="text" placeholder="E-mail" name="e-mail">
                        <br>
                    </div>
                    <div class="button">
                        <input type="submit" value="S'inscrire">
                    </div>
                </form>
            
            </div>

        </body>

    <?php include("footer.php")?>

</html>