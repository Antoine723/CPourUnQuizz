<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="../css/header.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ucfirst(basename($_SERVER['SCRIPT_NAME'],'.php')) ?></title>
</head>



<body>
    <header>
            <div class="gauche">
            <a href="home.php"><img src="../images/logop.png" height="200"></a>    
            </div>
            <div class="droite">
                <div class="titre" >CPourUnQuizz</div>
                <div class="lien">
                    <a class="navigate" href="quizz.php">Quizz</a>
                    <a class="navigate" href="result.php">Résultat</a>
                    <?php if(!isset($_SESSION['username'])){ ?>
                        <a class="navigate" href="register.php">Register</a>
                        <a class="navigate" href="login.php">Log in</a>
                    <?php }
                        else{?>
                        <a class="navigate" href="account.php">Profil</a>
                        <a class="navigate" href="logout.php" id="logout"><img src="https://img.icons8.com/ios/50/000000/exit.png" alt="Log out"/></a>
                        <?php }?>
                </div>
            </div>
        </header>
</body>
</html>