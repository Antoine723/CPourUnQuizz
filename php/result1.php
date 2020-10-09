<!DOCTYPE html>
<html>
<?php include("footer.php")?>
    <head>
        <title>Résultats quizz n°1</title>
        <link rel="stylesheet" href="../css/quizz1.css"/>
    </head>
    <body>
        <div>
            <p>
                <img src="../images/logo_palmashow.jpg"/>
                </br>
                <h1>Résultats du quizz n°1</h1>
            </p>
        </div>
        <div>
            <p>
                <h1>Bravo, vous avez obtenu un score de 4/4 !!! </br>C'est un très bon score</h1>
            </p>
            <p>
                <img src="../images/gif_fireworks.gif"/>
            </p>
        </div>
        <div>
            <form action="quizz1.php">
                <p>
                    <button type="submit">Réessayez</button>
                </p>
            </form>
            <form action="home.php">
                <p>
                    <button type="submit">Retour à l'accueil</button>
                </p>
            </form>
            <form action="quizz2.php">
                <p>
                    <button type="submit">Quizz n°2</button>
                </p>
            </form>
        </div>
    </body>

<br>
<?php include("footer.php")?>
</html>