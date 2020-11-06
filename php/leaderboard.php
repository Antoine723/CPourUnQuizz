<!DOCTYPE html>
<html lang="fr">
    <?php include("header.php");
    $all_themes=getThemeAndIdQuizzOfAllQuizz();
    ?>

    <link rel="stylesheet" href="../css/leaderboard.css">
    <link rel="stylesheet" href="../css/common.css">

    <body>
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
                    <?php if(count(getScoreByIdQuizzAndIdPlayer($all_themes[$i]['Quizz_ID'],$_SESSION['user_id']))>0) { ?>
                        <p class="my_score"> <?=getScoreByIdQuizzAndIdPlayer($all_themes[$i]['Quizz_ID'],$_SESSION['user_id'])[0]['Score']?> </p>
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
            

            <!-- <div class="line2">
                
                <div class="element">
                    <p class="title">Quizz pub</p>
                </div>

                <div class="element">
                    <p>Mon score</p>
                </div>

                <div class="element">
                    <p class="pseudo">Genius</p>
                    <p>Son score</p>
                </div>

            </div>

            <div class="line3">
                
                <div class="element">
                    <p class="title">Quizz parodies emissions TV</p>
                </div>

                <div class="element">
                    <p>Mon score</p>
                </div>

                <div class="element">
                    <p class="pseudo">Genius</p>
                    <p>Son score</p>
                </div>

            </div>

            <div class="line4">
                
                <div class="element">
                    <p class="title">Quizz amateur</p>
                </div>

                <div class="element">
                    <p>Mon score</p>
                </div>

                <div class="element">
                    <p class="pseudo">Genius</p>
                    <p>Son score</p>
                </div>

            </div>

            <div class="line5">
                
                <div class="element">
                    <p class="title">Quizz expert</p>
                </div>

                <div class="element">
                    <p>Mon score</p>
                </div>

                <div class="element">
                    <p class="pseudo">Genius</p>
                    <p>Son score</p>
                </div>

            </div> -->

            

        </div>
    </body>
    <?php include("footer.php")?>
</html>