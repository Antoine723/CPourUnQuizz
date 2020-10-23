<!DOCTYPE html>
<html lang="fr">
    <link rel="stylesheet" href="../css/result.css"/>
    <?php include("header.php");
    include_once 'database.php';

    $answers=getAllAnswersByIdQuizz(2);


    //-------------------FONCTIONS-----------------------------------------------------
    function remove_accents($tab) //On va ici gérer la casse (y compris pour l'apostrophe entre ’ et ')
        {
            $tab= str_replace(['À','Á','Â','à','Ä','Å','à','á','â','à','ä','å'],'a',$tab);
            $tab=str_replace(['Ò','Ó','Ô','Õ','Ö','Ø','ò','ó','ô','õ','ö','ø'],'o',$tab);
            $tab=str_replace(['È','É','Ê','Ë','è','é','ê','ë'],'e',$tab);
            $tab=str_replace(['Ç','ç'],'c',$tab);
            $tab=str_replace(['Ì','Í','Î','Ï','ì','í','î','ï'],'i',$tab);
            $tab=str_replace(['Ù','Ú','Û','Ü','ù','ú','û','ü'],'u',$tab);
            $tab=str_replace('’',"'",$tab);

            return $tab;
        } ;




    function compute_score($answers){
        $score=0;
        foreach($_POST as $key=>$ans){ //Les key seront les ID des questions du quizz (que l'on a saisi dans les name de chaque réponse) : ex pour la question 6, l'ID question est 17, pour cette question key vaudra donc 17
            $check=true;
            
            if(is_array($ans)){ //Si la réponse envoyée est une checkbox
                $i=0;
                $tab=array();
                while($i<count($answers)){
                    if($answers[$i]['Question_ID']==$key) array_push($tab,$answers[$i]['Answer']); //On remplit un tableau contenant les réponses à la question actuelle, donc dans le if, on parcourt toutes les réponses du quizz 1 et on regarde quand celles-ci sont des réponses à la question actuelle
                    $i++;
                }
                foreach($ans as $dat){
                    if(!in_array(remove_accents($dat),remove_accents($tab)) || count($ans)!=count($tab)) $check=false; //Si l'utilisateur n'a pas sélectionné autant de réponses que nécessaires ou que l'une au moins des réponses est incorrecte
                }
                if($check) $score++;
            }
            else{
                for($index=0;$index<count($answers);$index++){ //On récupère la réponse correspondante à l'ID et on la stocke dans une variable avec laquelle on va comparer la réponse donnée par l'utilisateur
                    if($answers[$index]['ID_extQuestions']==$key) $answer=$answers[$index]['Answer'];
                }
                if(strtolower(remove_accents($answer))==strtolower(remove_accents($ans))) $score++;
            }
        }
        return $score;

    }
    //----------------------------------------------

    $score=compute_score($answers);
    //--------------------AFFICHAGE------------------------
        echo'<div class="score">
                <div class="display_score">
                    Votre score est de : '.$score;
                    echo'
                </div>
                <div class="comment_score">';
                    if(0<=$score && $score<=4) echo'</br> Aïe, tu n\'es pas un fin connaisseur';
                    elseif(5<=$score && $score<=8) echo'</br> Ça va tu n\'es pas trop mauvais';
                    else echo'</br> Ah voilà quelqu\'un qui est fan de notre duo !';
                    echo'
                </div>
            </div>';
        echo'
        <body>
            
                <form action="quizz2.php">
                    <p>
                        <button type="submit">Réessayer</button>
                    </p>
                </form>
                <form action="home.php">
                    <p>
                        <button type="submit">Retour à l\'accueil</button>
                    </p>
                </form>
                <form action="quizz.php">
                    <p>
                        <button type="submit">Autres quizz</button>
                    </p>
                </form>
            </div>
        </body>

    <br>';
    include("footer.php");
    echo'
</html>';