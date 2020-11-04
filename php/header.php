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
            <a href="index.php?page=home"><img src="images/logop.png" height="200"></a>    
            </div>
            <div class="droite">
                <div class="titre" >CPourUnQuizz</div>
                <div class="lien">
                    
                    <?php if(!isset($_SESSION['username'])){ ?>
                        <a class="navigate" href="index.php?user=login">Log in</a>
                        <a class="navigate" href="index.php?user=register">Register</a>
                    <?php }
                        else{?>
                        <a class="navigate" href="index.php?page=homequizz">Quizz</a>
                        <a class="navigate" href="index.php?page=result">Résultat</a>
                        <a class="navigate" href="index.php?page=leaderboard">Classement</a>
                        <a class="navigate" href="index.php?user=account">Profil</a>
                        <a class="navigate" href="index.php?user=logout" id="logout"><img src="https://img.icons8.com/ios/50/000000/exit.png" alt="Log out"/></a>
                        <?php }?>
                </div>
            </div>
        </header>
</body>
</html>