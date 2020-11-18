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
<!-- on crée des boutons si le quizzid correspond a celui qui a été fait par l'utilisateur(vérifier argument fonction)  -->
<div class="box"> 
    <div class="element">
        <p><?php
        
            if (!empty(getAllScoresByIdPlayer($_SESSION["user_id"],$_GET["quizz_id"]==1))){?>
    
                <a href="index.php?page=quizz&id=1" class="button">Résultat quizz Chansons</a><?php

            }
            if (!empty(getAllScoresByIdPlayer($_SESSION["user_id"],$_GET["quizz_id"]==5))){?>
                <a href="index.php?page=quizz&id=5" class="button">Résultat quizz Pub</a><?php
            }?>
        </p>
    </div>
    <div class="element">
        <p><?php
            if (!empty(getAllScoresByIdPlayer($_SESSION["user_id"],$_GET["quizz_id"]==4))){?>
            <a href="index.php?page=quizz&id=4" class="button">Résultat quizz Parodie émission TV</a><?php
            }
            if (!empty(getAllScoresByIdPlayer($_SESSION["user_id"],$_GET["quizz_id"]==2))){?>
            <a href="index.php?page=quizz&id=2" class="button">Résultat quizz Amateur</a><?php
            }?>
        </p>
    </div>
    
    <div class="element">
        <p><?php
            if (!empty(getAllScoresByIdPlayer($_SESSION["user_id"],$_GET["quizz_id"]==3))){?>
            <a href="index.php?page=quizz&id=3" class="button">Résultat quizz Expert</a><?php
            }?>
        </p>
    </div>
</div>


