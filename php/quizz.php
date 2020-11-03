<!DOCTYPE html>

<html lang="fr">
    <link rel="stylesheet" href="../css/quizz.css"/>
    <?php include("header.php");
    include_once 'database.php';
    
    $questions=getAllQuestionsByIdQuizz($_GET['id']);
    $answers=getAllAnswersByIdQuizz($_GET['id']);
    // var_dump($questions);
    // var_dump($answers);
    $islistMade=false;
    ?>
    
    
    
    <body>
        <div class="titre_quizz">
                <h1>Quizz n° <?php echo($_GET['id']);?> </h1>
        </div>
        <form  action="index.php?page=result&id=<?php echo($_GET['id'])?>" method="post">
            <div class="questions_and_answers">
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
                        shuffle($answers_for_quest); //Réorganise de manières aléatoires les réponses qui vont être affichées
                        ?>
                        </br>
                        </br>
                        <label for="Question"><b>Question <?= $j+1?> : <?php echo($questions[$j]['Content'])?></label> 
                        </br>
                        </br>
                        <div class="reponse">
                            <?php if(count($bad_answers)==0 && count($correct_answers)==1){?>
                            <input type="text" name=<?php $questions[$j]['Question_ID']?>></input>
                            <?php }
                            else{
                                if(count($correct_answers)>1){
                                    for($k=0;$k<count($answers_for_quest);$k++){?>
                                        <input type="checkbox" name="<?php $id_quest?>[]" value=<?php $answers_for_quest[$k]['Answer']?>><?php echo($answers_for_quest[$k]['Answer']);?></input>
                                        </br>
                                        <?php 
                                    }
                                }
                                else{
                                    if(!$islistMade){ ?>
                                            <select name=<?php $id_quest?> id="Question <?php $j+1?>">
                                                <?php for($k=0;$k<count($answers_for_quest);$k++){ ?>
                                                <option value=<?php $answers_for_quest[$k]['Answer']?>><?php echo($answers_for_quest[$k]['Answer']);?></option>
                                                <?php }?>
                                            </select>
                                        <?php 
                                        $islistMade=true;
                                    }
                                    else{ 
                                        for($k=0;$k<count($answers_for_quest);$k++) {?>
                                            <input type="radio" name=<?php $id_quest?> value=<?php $answers_for_quest[$k]['Answer']?>><?php echo($answers_for_quest[$k]['Answer']);?></input>
                                            </br>
                                            <?php 
                                        }  
                                    }
                                }
                            
                            }
                            }?>
                        </div>
            </div>
            <div>
                <p>
                    <button type="reset">Reset</button>
                    <button type="submit">Submit</button>
                </p>
            </div>
        </form>
    </body>

    <br>
    <?php include("footer.php"); ?>
    
</html>