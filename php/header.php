<div class="gauche">
    <a href="index.php?page=home"><img src="images/logop.png" height="200"></a>    
</div>
<div class="droite">
    <div class="titre" >CPourUnQuizz</div>
    <div class="lien">
        
        <?php if(!isset($_SESSION['username'])){ ?>
            <a class="navigate" href="index.php?user=login">Log in</a>
            <a class="navigate" href="index.php?user=register">Register</a>
        <?php }
            else{?>
            <a class="navigate" href="index.php?page=homequizz">Quizz</a>
            <a class="navigate" href="index.php?page=leaderboard">Classement</a>
            <a class="navigate" href="index.php?user=account">Profil</a>
            <a class="navigate" href="index.php?user=logout" id="logout"><img height="60px" width= "75px" src="images/exit.png" alt="Log out"/></a>
            <?php }?>
    </div>
</div>