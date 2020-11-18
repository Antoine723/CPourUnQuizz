<?php
$all_themes=getThemeAndIdQuizzOfAllQuizz();
?>
<div class="box">

    <div class="head">

        <div class="element">
            <p class="title head_title">QUIZZ</p>
        </div>

        <div class="element">
            <p class="title head_title">MON SCORE</p>
        </div>

        <div class="element">
            <p class="title head_title">MEILLEUR  SCORE</p>
        </div>

    </div>
    <?php
    for($i=0;$i<count($all_themes);$i++)
    { ?>
    <div class="line">
        
        <div class="element">
            <p class="title">Quizz <?= $all_themes[$i]['Theme']?></p>
        </div>

        <div class="element">
            <?php if(count(getScoreByIdPlayerAndIdQuizz($_SESSION['user_id'],$all_themes[$i]['Quizz_ID']))>0) { ?>
                <p class="my_score"> <?=getScoreByIdPlayerAndIdQuizz($_SESSION['user_id'],$all_themes[$i]['Quizz_ID'])[0]['Score']?> </p>
                <?php } 
                    else{ ?>
                    <p class="no_one"?><?="Quizz non réalisé"?></p>
                <?php }
                ?> 
        </div>

        <div class="element">
            <?php if(!empty(getAllScoreAndPlayerNameByIdQuizz($all_themes[$i]['Quizz_ID']))) { 
                $max=max(getAllScoreAndPlayerNameByIdQuizz($all_themes[$i]['Quizz_ID'])) ?>
                <p class="pseudo"><?=ucfirst($max['Username'])?></p>
                <p class="record"><?=$max['Score']?></p>
            <?php } 
            
                else { ?>
                    <p class="no_one">Ce quizz n'a été réalisé par personne</p>

            <?php } ?>
            
        </div>

    </div>

    <?php } ?>
</div>