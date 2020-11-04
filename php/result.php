<!DOCTYPE html>
<html lang="fr">
    <link rel="stylesheet" href="../css/result.css"/>
    <?php include("header.php");
    include_once 'database.php';
    $good_answers=getAllGoodAnswersByIdQuizz($_GET['id']);
    $associated_score = getScoreByIdPlayerAndIdQuizz($_SESSION['user_id'],$_GET['id']);
    $questions=getAllQuestionsByIdQuizz($_GET['id']);
    $answers=getAllAnswersByIdQuizz($_GET['id']);
    $islistMade=false;

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
                if(isset($answer)) if(strtolower(remove_accents($answer))==strtolower(remove_accents($ans))) $score++; //le isset($answer) est là pour éviter d'afficher une erreur au cas où $answer n'existerait pas (c'est juste une sécurité car normalement elle existe forcément)
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
    <body>
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
                    for($j=0;$j<count($questions);$j++){ //On parcourt toutes les questions du quizz actuel  
                        $id_quest=$questions[$j]['Question_ID']; //On récupère l'id de la question actuelle
                        $answers_for_quest=array();
                        $bad_answers=array();
                        $correct_answers=array();
                        
                        for($i=0;$i<count($answers);$i++){ //On parcourt toutes les réponses des différentes questions du quizz actuel
                            if($answers[$i]['Question_ID']==$id_quest){
                                array_push($answers_for_quest,$answers[$i]);
                                if($answers[$i]['is_correct_answer']==0) array_push($bad_answers,$answers[$i]);
                                else if($answers[$i]['is_correct_answer']==1) array_push($correct_answers,$answers[$i]);

                            }
                        }
                        ?>
                        </br>
                        </br>
                        <label for="Question"><b>Question <?= $j+1?> : <?php echo($questions[$j]['Content'])?></label> 
                        </br>
                        </br>
                        <div class="reponse">
                            <?php if(count($bad_answers)==0 && count($correct_answers)==1){
                                // var_dump($correct_answers);
                                // var_dump($_POST[$id_quest]);
                                // if(isset($_POST[$id_quest]) && $_POST[$id_quest]==$correct_answers[0]['ID_extQuestions']) {?>
                                <p><?= $correct_answers[0]['Answer']?></p>
                            <!-- <input type="text" name="<?php echo($id_quest)?>"></input> -->
                            <?php }
                            else{
                                if(count($correct_answers)>1){
                                    for($k=0;$k<count($answers_for_quest);$k++){?>
                                        <input type="checkbox" name="<?php echo($id_quest)?>[]" value="<?php echo($answers_for_quest[$k]['Answer'])?>" <?php if(in_array($answers_for_quest[$k]['Answer'],$correct_answers)){?>checked <?php }?>><?php echo($answers_for_quest[$k]['Answer']);?></input>
                                        </br>
                                        <?php 
                                    }
                                }
                                else{
                                    if(!$islistMade){ ?>
                                            <select name="<?php echo($id_quest)?>">
                                                <option value="" selected></option>
                                                <?php for($k=0;$k<count($answers_for_quest);$k++){ ?>
                                                <option value="<?php echo($answers_for_quest[$k]['Answer'])?>"><?php echo($answers_for_quest[$k]['Answer']);?></option>
                                                <?php }?>
                                            </select>
                                        <?php 
                                        $islistMade=true;
                                    }
                                    else{ 
                                        for($k=0;$k<count($answers_for_quest);$k++) {?>
                                            <input type="radio" name=<?php echo($id_quest)?> value="<?php echo($answers_for_quest[$k]['Answer'])?>"><?php echo($answers_for_quest[$k]['Answer']);?></input>
                                            </br>
                                            <?php 
                                        }  
                                    }
                                }
                            
                            }
                            }?>
                        </br>
                        <label for="Question"><b>Question <?= $j+1?> : <?php echo($questions[$j]['Content'])?></label> 
                        </br>
            </div>        
    </body>                
    <br>
    <?php
    include("footer.php");?>
    
</html>';