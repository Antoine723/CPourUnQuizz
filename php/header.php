<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="../css/header.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ucfirst(basename($_SERVER['SCRIPT_NAME'],'.php')) ?></title>
</head>

<header>
    <h1 class="titre_header">
        CPourUnQuizz
    </h1>
    <a href="home.php"> Home </a>
    <a href="login.php"> Log in </a>
    <a href="register.php"> Register </a>
    <a href="logout.php"> Log out </a>
    <a href="quizz.php"> Quizz </a>
    <a href="account.php"> Account </a>
</header>

<body>
    <header>
            <div class="gauche">
            <a href="home.php"><img src="../images/logop.png" height="200"></a>    
            </div>
            <div class="droite">
                <div class="titre" >CPourUnQuizz</div>
                <div class="lien">
                    <a href="quizz.php">Quizz</a>
                    <a href="result.php">Résultat</a>
                    <a href="account.php">Profil</a>
                    <a href="register.php">Register</a>
                    <a href="logIn.php">Log in</a>
                    <a href="" id="logout"><img src="https://img.icons8.com/ios/50/000000/exit.png" alt="Log out"/></a>
                    
                </div>
            </div>
        </header>
</body>
</html>