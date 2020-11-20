<?php
    if(isset($_GET['delete']) && $_GET['delete']=="true")
    {
        deleteAllAnswersByUserIdAndQuizzId($_SESSION['user_id'],$_GET['id']);
        deleteScoreByUserIdAndQuizzId($_SESSION['user_id'],$_GET['id']);
    }
?>
<div>
    <p>
        <h1 class ="title">Quizz</h1>
    </p>
</div>
<div class="box"> 
    <div class="element">
        <p>
            <a href="index.php?page=quizz&id=1" class="button">Quizz Chansons</a>
            <a href="index.php?page=quizz&id=5" class="button">Quizz Pub</a>
        </p>
    </div>
    <div class="element">
        <p>
            <a href="index.php?page=quizz&id=4" class="button">Quizz Parodie émission TV</a>
            <a href="index.php?page=quizz&id=2" class="button">Quizz Amateur</a>
        </p>
    </div>
    
    <div class="element">
        <p>
            <a href="index.php?page=quizz&id=3" class="button">Quizz Expert</a>
        </p>
    </div>
</div>
<!-- Boutons qui apparaissent si l'utilisateur a déjà réalisé un quizz et souhaite revoir ses réponses-->
<div class="box"> 
    <div class="element">
        <p><?php
        
            if (!empty(getAllScoresByIdPlayerAndIdQuizz($_SESSION["user_id"],1))){?>
    
                <a href="index.php?page=result&id=1&done=true" class="button">Résultat quizz Chansons</a><?php

            }
            if (!empty(getAllScoresByIdPlayerAndIdQuizz($_SESSION["user_id"],5))){?>
                <a href="index.php?page=result&id=5&done=true" class="button">Résultat quizz Pub</a><?php
            }?>
        </p>
    </div>
    <div class="element">
        <p><?php
            if (!empty(getAllScoresByIdPlayerAndIdQuizz($_SESSION["user_id"],4))){?>
            <a href="index.php?page=result&id=4&done=true" class="button">Résultat quizz Parodie émission TV</a><?php
            }
            if (!empty(getAllScoresByIdPlayerAndIdQuizz($_SESSION["user_id"],2))){?>
            <a href="index.php?page=result&id=2&done=true" class="button">Résultat quizz Amateur</a><?php
            }?>
        </p>
    </div>
    
    <div class="element">
        <p><?php
            if (!empty(getAllScoresByIdPlayerAndIdQuizz($_SESSION["user_id"],3))){?>
            <a href="index.php?page=result&id=3&done=true" class="button">Résultat quizz Expert</a><?php
            }?>
        </p>
    </div>
</div>

<!-- Boutons qui apparaissent si l'utilisateur a déjà réalisé un quizz et souhaite supprimer ses réponses-->
<div class="box"> 
    <div class="element">
        <p><?php
        
            if (!empty(getAllScoresByIdPlayerAndIdQuizz($_SESSION["user_id"],1))){?>
    
                <a href="index.php?page=homequizz&id=1&delete=true" class="button">Supprimer résultat quizz Chansons</a><?php

            }
            if (!empty(getAllScoresByIdPlayerAndIdQuizz($_SESSION["user_id"],5))){?>
                <a href="index.php?page=result&id=5&delete=true" class="button">Supprimer résultat quizz Pub</a><?php
            }?>
        </p>
    </div>
    <div class="element">
        <p><?php
            if (!empty(getAllScoresByIdPlayerAndIdQuizz($_SESSION["user_id"],4))){?>
            <a href="index.php?page=result&id=4&delete=true" class="button">Supprimer résultat quizz Parodie émission TV</a><?php
            }
            if (!empty(getAllScoresByIdPlayerAndIdQuizz($_SESSION["user_id"],2))){?>
            <a href="index.php?page=result&id=2&delete=true" class="button">Supprimer résultat Amateur</a><?php
            }?>
        </p>
    </div>
    
    <div class="element">
        <p><?php
            if (!empty(getAllScoresByIdPlayerAndIdQuizz($_SESSION["user_id"],3))){?>
            <a href="index.php?page=result&id=3&delete=true" class="button">Supprimer résultat Expert</a><?php
            }?>
        </p>
    </div>
</div>


