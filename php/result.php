<?php
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
                if(isset($answer) && strtolower(remove_accents($answer))==strtolower(remove_accents($ans))) $score++; //le isset($answer) est là pour éviter d'afficher une erreur au cas où $answer n'existerait pas (c'est juste une sécurité car normalement elle existe forcément)
            }
        }
        return $score;

    }
    //----------------------------------------------

    $score=compute_score($good_answers);
    if (count($associated_score) == 0)
    {
        addScoreToUser($_SESSION['user_id'],$_GET['id'],$score);
    }
    else
    {
        updateScore($_SESSION['user_id'],$_GET['id'],$score);
    }
?>

    <!-- --------------------AFFICHAGE------------------------ -->
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
                                <p class="good_ans"><?=ucfirst($good_answers[$i]['Answer'])?></p>
                                <p class="bad_ans"><?=$_POST[$id_quest]?></p>
                            <?php
                            }
                        
                        ?>
                    <?php }
                        else //Si c'est une checkbox A MODIFIER
                        { ?>
                            <div class="checkbox_global">
                            <?php
                            
                            for($i=0;$i<count($good_answers_for_a_question);$i++)
                            {
                                if(in_array(remove_accents($good_answers_for_a_question[$i]),remove_accents($_POST[$id_quest])))
                                {
                                    $isCorrect=true;    
                                
                                }
                                else {
                                    $isCorrect=false;
                                }
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
                            
                            
                                
                            
                                /*if(in_array(remove_accents($good_answers_for_a_question[$i]),remove_accents($_POST[$id_quest]))) //S'il a bien répondu
                                {
                                ?>
                                    <p class="good_ans"><?=ucfirst($good_answers_for_a_question[$i])?></p>
                                <?php } 
                                else //Sinon
                                {
                                ?>
                                    <p class="good_ans"><?=ucfirst($good_answers_for_a_question[$i])?></p>
                                    <?php  for($k=0;$k<count($_POST[$id_quest]);$k++){
    
                                    ?>
                                    <p class="bad_ans"><?=$_POST[$id_quest][$k]?></p>
                                    <?php }
                                }*/
                            
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