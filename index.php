<?php


//Initialisation de la session
session_start();
if (!isset($_SESSION['user'])) $page = 'login';
else $page='login';
require(__DIR__."../php/$page.php");

?>
<!DOCTYPE html>
    <link rel="stylesheet" href="css/header.css"/>
    <link rel="stylesheet" href="css/footer.css"/>
    <link rel="stylesheet" href="css/common.css"/>

<?php if (file_exists("css/".$page.".css")) { ?>
        <link rel="stylesheet" href="css/<?= htmlspecialchars($page) ?>.css"/>
    <?php } ?>
<?php

//Connexion BDD

include_once 'php/database.php';
// $database=databaseConnexion();

require('php/checkUser.php');


