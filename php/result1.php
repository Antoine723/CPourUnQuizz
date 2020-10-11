<!DOCTYPE html>
<html>
<?php include("header.php");
$bdd=new PDO('mysql:host=localhost;dbname=cpourunquizz','root','');
$answers_table=$bdd->query('SELECT * FROM answers INNER JOIN questions ON answers.ID_extQuestions=questions.Question_ID WHERE questions.ID_extQuizz=1');//On va récupérer les infos avec les champs de la table answers+questions, pour le 1er quizz

$score=0;




foreach($_POST as $ans){
    $all=$answers_table->fetchall();
    $next_ans=$answers_table->fetch();
    $check=true;
    if(is_array($ans)){ //Si la réponse envoyée est une checkbox
        $i=0;
        $tab=array();
        while($i<count($all)){//Il faut récupérer le nom de l'input qui va correspondre au numéro de la question
            if($all[$i]['Question_ID']==17) array_push($tab,$all[$i]['Answer']); //On remplit un tableau contenant les réponses à la question actuelle
            $i++;

        }
        foreach($ans as $dat){
            if(!in_array($dat,$tab)){
                $check=false;
            }
        }
        if($check) $score++;
        
        }
    else{
        if(strtolower($next_ans['Answer'])==strtolower($ans)) $score++; //Ici, tester la réponse depuis le tableau $all (pas next_ans car n'existe plus)
    }
    }
    var_dump($tab);
    echo'
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
                <h1>Bravo, vous avez obtenu un score de 4/4 !!! </br>C'.'est un très bon score</h1>
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
                    <button type="submit">Retour à l'.'accueil</button>
                </p>
            </form>
            <form action="quizz2.php">
                <p>
                    <button type="submit">Quizz n°2</button>
                </p>
            </form>
        </div>
    </body>

<br>';
include("footer.php");
echo'
</html>';