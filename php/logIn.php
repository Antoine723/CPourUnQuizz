<!DOCTYPE html>




<html>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/common.css">
    <?php include("header.php")?>

        <body>
            <div class="reg">
                <form method="post" action="index.php?user=login">
                    <div class="formular">
                        <label>Nom d'utilisateur</label>
                        <br>
                        <input type="text" placeholder="Nom d'utilisateur" name="username">
                        <br>
                        <label>Mot de passe</label>
                        <br>
                        <input type="password" placeholder="Mot de passe" name="password">
                    </div>
                    <div class="button">
                        <input type="submit" value="Connexion">
                    </div>
                </form>
            
            </div>
        </body>


    <?php include("footer.php")?>

</html>