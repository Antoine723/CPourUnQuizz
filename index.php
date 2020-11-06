<?php


    session_start();
    
    //Initialisation variable connexion BDD +appel du fichier database.php pour pouvoir utiliser les fonctions d'interaction avec la BDD
    include_once 'php/database.php';
    $bdd=new PDO('mysql:host=localhost;dbname=cpourunquizz','root','');


    require('php/checkUser.php'); //On teste si l'utilisateur a saisi des identifiants corrects
    require('php/checkRegister.php'); //On teste si l'utilisateur s'est inscrit correctement
    if (!empty($_GET['user'])) { //Pour accéder aux pages login, register, account et logout(pour la déconnexion), on va utiliser user comme paramètre de l'URL
        switch ($_GET['user']){
            case 'login':
                $page="login";
            break;
            case 'register':
                $page="register";
            break;
            case 'account':
                $page="account";
            break;
            case 'logout':
                $page="logout";
            break;

        }
    }
    else{
        if(isset($_SESSION['username'])) $page = (!empty($_GET['page'])) ? $_GET['page'] : 'home'; //Si une session est en cours et que l'utilisateur n'a pas cliqué sur une page, il est redirigé vers home (c'est pour rediriger l'utilisateur vers home dès la connexion si celle-ci s'est bien effectuée)
    }
    if (!isset($_SESSION['username']) && !isset($page)) $page = 'login'; //Si aucune session n'est en cours, par défaut, l'index dirigera sur login

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <link rel="stylesheet" href="css/header.css"/>
        <link rel="stylesheet" href="css/footer.css"/>
        <link rel="stylesheet" href="css/common.css"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= ucfirst($page) ?></title>
        <?php
        if (file_exists("css/".$page.".css")) { ?>
            <link rel="stylesheet" href="css/<?= htmlspecialchars($page)  ?>.css"/>
        <?php } 
        else{
            switch($page){
                case'login': //login et account utilisent pour l'instant le même CSS que register
                case'account':?>
                    <link rel="stylesheet" href="css/register.css"/>
                <?php
            }
        
        } ?>
    </head>
    <header>
        <?php require_once("php/header.php");?>
    </header>
    <body>
        <?php 
        require(__DIR__."../php/$page.php");
        ?>
        <div class="error_block">
            <?php
            //Affichage des erreurs ou message de validation s'ils existent
                if(isset($err_log)){
                    ?> <div class="err">
                        <?php echo($err_log)?>
                        </div>
                        <?php
                }
                else if(isset($err_reg)){
                    ?> <div class="err">
                        <?php echo($err_reg)?>
                        </div>
                        <?php
                }
                else if(isset($success_reg)){
                    ?> <div class="success">
                        <?php echo($success_reg)?>
                        </div>
                        <?php
                }
            ?>
        </div>
    </body>
    <hr>
    <footer>
        <?php require_once("php/footer.php")?>
    </footer>
</html>