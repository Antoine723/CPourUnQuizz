<!DOCTYPE html>
<html>
<?php include("header.php");
$bdd=new PDO('mysql:host=localhost;dbname=cpourunquizz','root','');
$answers_table=$bdd->query('SELECT * FROM answers INNER JOIN questions ON answers.ID_extQuestions=questions.Question_ID WHERE questions.ID_extQuizz=1');//On va récupérer les infos avec les champs de la table answers+questions, pour le 1er quizz



$score=0;

$all=$answers_table->fetchall();

foreach($_POST as $key=>$ans){ //Les key seront les ID des questions du quizz (que l'on a saisi dans les name de chaque réponse) : ex pour la question 6, l'ID question est 17, pour cette question key vaudra donc 17
    $check=true;
    
    if(is_array($ans)){ //Si la réponse envoyée est une checkbox
        $i=0;
        $tab=array();
        while($i<count($all)){
            
            if($all[$i]['Question_ID']==$key) array_push($tab,$all[$i]['Answer']); //On remplit un tableau contenant les réponses à la question actuelle, donc dans le if, on parcourt toutes les réponses du quizz 1 et on regarde quand celles-ci sont des réponses à la question actuelle

            $i++;

        }
        foreach($ans as $dat){
            $tab=str_replace("’",'\'',$tab); //Prendre en compte la différence d'apostrophe entre ' et ’ (on transforme les ’ des chaînes de caractères de la BDD en ')
            if(!in_array($dat,$tab) || count($ans)!=count($tab)) $check=false; //Si l'utilisateur n'a pas sélectionné autant de réponses que nécessaires ou que l'une au moins des réponses est incorrecte
                
        }
        if($check) $score++;
        }
    else{
        for($index=0;$index<count($all);$index++){ //On récupère la réponse correspondante à l'ID et on la stocke dans une variable avec laquelle on va comparer la réponse donnée par l'utilisateur
            if($all[$index]['ID_extQuestions']==$key) $answer=$all[$index]['Answer'];
        }
        if(strtolower($answer)==strtolower($ans)) $score++;
    }
    }
    echo("Votre score est de : ".$score);
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
            </p>
        </div>
        <div>
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