<?php
    date_default_timezone_set('Europe/Paris');
    $good_answers=getAllGoodAnswersByIdQuizz($_GET['id']);
    $associated_score = getScoreByIdPlayerAndIdQuizz($_SESSION['user_id'],$_GET['id']);
    $questions=getAllQuestionsByIdQuizz($_GET['id']);

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




    function compute_score($answers,$user_answers){
        $score=0;
        foreach($user_answers as $key=>$ans){ //Les key seront les ID des questions du quizz (que l'on a saisi dans les name de chaque réponse) : ex pour la question 6, l'ID question est 17, pour cette question key vaudra donc 17
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
                if(isset($answer) && strtolower(remove_accents($answer))==strtolower(remove_accents($ans))) $score++; //le isset($answer) est là pour éviter d'afficher une erreur au cas où $answer n'existerait pas (c'est juste une sécurité car normalement elle existe forcément)
            }
        }
        return $score;

    }
    //----------------------------------------------
?>

    <!-----------------------AFFICHAGE------------------------ -->
<?php if(isset($_GET['done']) && $_GET['done']=="true")
{
    $score=getScoreByIdPlayerAndIdQuizz($_SESSION['user_id'], $_GET['id']);
?>
    <div class="display"> 
        <div class="score">
            <div class="display_score">
                Votre score est de : <?= $score[0]['Score']?>
                
            </div>
            <div class="comment_score">
                <?php
                    if(0<=$score && $score<=4){?> </br> Aïe, tu n'es pas un fin connaisseur
                    <?php }elseif(5<=$score && $score<=8){?> </br> Ça va tu n'es pas trop mauvais
                    <?php }else { ?> </br> Ah voilà quelqu'un qui est fan de notre duo !
                    <?php }?>
            </div>
        </div>
        
        <form action="index.php?page=quizz&id=<?php echo($_GET['id'])?>" method="post">
            <p>
                <input type="submit" value="Réessayer"></input>
            </p>
        </form>
        <form action="index.php?page=home" method="post">
            <p>
                <input type="submit" value="Retour à l'accueil"></input>
            </p>
        </form>
        <form action="index.php?page=homequizz" method="post">
            <p>
                <input type="submit" value="Autres quizz"></input>
            </p>
        </form>
    </div>
    <div class="answers">
                <p class="date"><?=(getDateOfAnswersByIdPlayerAndIdQuizz($_SESSION['user_id'],$_GET['id'])[0]['date']);?></p>
                <?php
                for($j=0;$j<count($questions);$j++)
                { //On parcourt toutes les questions du quizz actuel  
                    
                    $good_answers_for_a_question=array();
                    ?>
                    </br>
                    </br>
                    <label for="Question"><b>Question <?= $j+1?> : <?php echo($questions[$j]['Content'])?></label> 
                    </br>
                    </br> 
                    <?php
                    $id_quest=$questions[$j]['Question_ID']; //On récupère l'id de la question actuelle
                    for($i=0;$i<count($good_answers);$i++)
                    { //On parcourt toutes les bonnes réponses des différentes questions du quizz actuel
                        if($good_answers[$i]['Question_ID']==$id_quest) {
                            array_push($good_answers_for_a_question,$good_answers[$i]['Answer']);
                        } 
                        
                    }
                    $actual_answer=getAnswerByIdPlayerAndIdQuizzByIdQuest($_SESSION['user_id'],$_GET['id'],$id_quest);
                        if(!empty($actual_answer) && $actual_answer[0]['answer']!='') //Si l'utilisateur a répondu à la question actuelle
                        { 
                            if(count($good_answers_for_a_question)==1) //Si ce n'est pas une checkbox
                            {
                                if(strtolower(remove_accents($good_answers_for_a_question[0])) == strtolower(remove_accents($actual_answer[0]['answer']))) //Si la réponse est bonne
                                { ?>
                                    <p class="good_ans"><?=$actual_answer[0]['answer']?></p>
                            <?php   }
                                else //Si réponse fausse
                                {
                                    ?>
                                    <p class="good_ans"><?=ucfirst($good_answers_for_a_question[0])?></p>
                                    <p class="bad_ans"><?=$actual_answer[0]['answer']?></p>
                                <?php
                                }
                            
                            ?>
                        <?php }
                            else if (count($good_answers_for_a_question)>1) //Si c'est une checkbox
                            { ?>
                                <div class="checkbox_global">
                                <?php
                                $isCorrect=true;
                                $array_answers_for_checkbox=array();
                                for($i=0;$i<count($actual_answer);$i++)
                                {
                                    array_push($array_answers_for_checkbox,$actual_answer[$i]['answer']);
                                }
                                for($i=0;$i<count($good_answers_for_a_question);$i++)
                                {
                                    if(!in_array(remove_accents($good_answers_for_a_question[$i]),remove_accents($array_answers_for_checkbox))) $isCorrect=false;
                                    
                                }
                                if($isCorrect)
                                { 
                                    for($i=0;$i<count($good_answers_for_a_question);$i++)
                                    {
                                    ?>
                                    <p class="good_ans"><?=ucfirst($good_answers_for_a_question[$i])?></p>
                                <?php 
                                    }
                                }
                                else
                                { ?>
                                    <div class="checkbox">
                                    <?php
                                        for($i=0;$i<count($good_answers_for_a_question);$i++)
                                        { ?>
                                            <p class="good_ans"><?=ucfirst($good_answers_for_a_question[$i])?></p>
                                        <?php
                                        }
                                    ?>
                                    </div>
                                    <div class="checkbox">
                                        <?php
                                        for($i=0;$i<count($actual_answer);$i++)
                                        { ?>
                                            <p class="bad_ans"><?=$actual_answer[$i]['answer']?></p>
                                        <?php
                                        }?>
                                    </div>
                                    <?php
                                }
                                ?>
                                </div>
                                <?php
                                
                                
                            }
                        }
                        
                        else
                        { 
                            for($k=0;$k<count($good_answers_for_a_question);$k++)
                            {
                            ?>
                                <p class="good_ans"><?=ucfirst($good_answers_for_a_question[$k])?></p>
                            <?php
                            } ?>
                            <p class="no_ans">Aucune réponse</p>
                        <?php }
                }
                ?>
    </div>

<?php
}
else
{
    $score=compute_score($good_answers,$_POST);
    if (count($associated_score) == 0)
    {
        addScoreToUser($_SESSION['user_id'],$_GET['id'],$score);
    }
    else
    {
        updateScore($_SESSION['user_id'],$_GET['id'],$score);
    }
?>
    <div class="display"> 
        <div class="score">
            <div class="display_score">
                Votre score est de : <?= $score?>
                
            </div>
            <div class="comment_score">
                <?php
                    if(0<=$score && $score<=4){?> </br> Aïe, tu n'es pas un fin connaisseur
                    <?php }elseif(5<=$score && $score<=8){?> </br> Ça va tu n'es pas trop mauvais
                    <?php }else { ?> </br> Ah voilà quelqu'un qui est fan de notre duo !
                    <?php }?>
            </div>
        </div>
        
        <form action="index.php?page=quizz&id=<?php echo($_GET['id'])?>" method="post">
            <p>
                <input type="submit" value="Réessayer"></input>
            </p>
        </form>
        <form action="index.php?page=home" method="post">
            <p>
                <input type="submit" value="Retour à l'accueil"></input>
            </p>
        </form>
        <form action="index.php?page=homequizz" method="post">
            <p>
                <input type="submit" value="Autres quizz"></input>
            </p>
        </form>
    </div>
    <div class="answers">
            <?php
                
                for($j=0;$j<count($questions);$j++)
                { //On parcourt toutes les questions du quizz actuel  
                    
                    $good_answers_for_a_question=array();
                    ?>
                    </br>
                    </br>
                    <label for="Question"><b>Question <?= $j+1?> : <?php echo($questions[$j]['Content'])?></label> 
                    </br>
                    </br> 
                    <?php
                    $id_quest=$questions[$j]['Question_ID']; //On récupère l'id de la question actuelle
                    for($i=0;$i<count($good_answers);$i++)
                    { //On parcourt toutes les bonnes réponses des différentes questions du quizz actuel
                        if($good_answers[$i]['Question_ID']==$id_quest) {
                            array_push($good_answers_for_a_question,$good_answers[$i]['Answer']);
                        } 
                        
                    }
                        if(isset($_POST[$id_quest]) && $_POST[$id_quest]!='') //Si l'utilisateur a répondu à la question actuelle
                        { 
                            if(!is_array($_POST[$id_quest])) //Si ce n'est pas une checkbox
                            {
                                if(strtolower(remove_accents($good_answers_for_a_question[0])) == strtolower(remove_accents($_POST[$id_quest]))) //Si la réponse est bonne
                                { ?>
                                    <p class="good_ans"><?=$_POST[$id_quest]?></p>
                            <?php   }
                                else //Si réponse fausse
                                {
                                    ?>
                                    <p class="good_ans"><?=ucfirst($good_answers_for_a_question[0])?></p>
                                    <p class="bad_ans"><?=$_POST[$id_quest]?></p>
                                <?php
                                }
                            
                            ?>
                        <?php }
                            else //Si c'est une checkbox
                            { ?>
                                <div class="checkbox_global">
                                <?php
                                $isCorrect=true;
                                for($i=0;$i<count($good_answers_for_a_question);$i++)
                                {
                                    if(!in_array(remove_accents($good_answers_for_a_question[$i]),remove_accents($_POST[$id_quest]))) $isCorrect=false;
                                    
                                }
                                if($isCorrect)
                                { 
                                    for($i=0;$i<count($good_answers_for_a_question);$i++)
                                    {
                                    ?>
                                    <p class="good_ans"><?=ucfirst($good_answers_for_a_question[$i])?></p>
                                <?php 
                                    }
                                }
                                else
                                { ?>
                                    <div class="checkbox">
                                    <?php
                                        for($i=0;$i<count($good_answers_for_a_question);$i++)
                                        { ?>
                                            <p class="good_ans"><?=ucfirst($good_answers_for_a_question[$i])?></p>
                                        <?php
                                        }
                                    ?>
                                    </div>
                                    <div class="checkbox">
                                        <?php
                                        for($i=0;$i<count($_POST[$id_quest]);$i++)
                                        { ?>
                                            <p class="bad_ans"><?=$_POST[$id_quest][$i]?></p>
                                        <?php
                                        }?>
                                    </div>
                                    <?php
                                }
                                ?>
                                </div>
                                <?php
                                
                                
                            }
                        }
                        
                        else
                        { 
                            for($k=0;$k<count($good_answers_for_a_question);$k++)
                            {
                            ?>
                                <p class="good_ans"><?=ucfirst($good_answers_for_a_question[$k])?></p>
                            <?php
                            } ?>
                            <p class="no_ans">Aucune réponse</p>
                        <?php }
                        if(isset($_POST[$id_quest]) && count($associated_score) == 0)
                        {
                            addAllAnswersByUser($_POST[$id_quest], date('y-m-d'),$_SESSION['user_id'],$_GET['id'],$id_quest);
                        }
                        else if(isset($_POST[$id_quest]) && count($associated_score)!=0) //Sinon, supprimer toutes les réponses pour cet utilisateur à ce quizz, puis ajouter les nouvelles réponses
                        {
                            deleteAllAnswersByUserIdAndQuizzIdAndQuestionId($_SESSION['user_id'],$_GET['id'],$id_quest);
                            if(is_array($_POST[$id_quest]))
                            {
                                for($h=0;$h<count($_POST[$id_quest]);$h++)
                                {
                                    addAllAnswersByUser($_POST[$id_quest][$h], date('y-m-d'),$_SESSION['user_id'],$_GET['id'],$id_quest);
                                }
                            }
                            else addAllAnswersByUser($_POST[$id_quest], date('y-m-d'),$_SESSION['user_id'],$_GET['id'],$id_quest);

                        }
                        }
            }       
                ?>
    </div>
}