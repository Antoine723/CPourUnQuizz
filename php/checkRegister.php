<?php 
$taille_min_mdp=8;
if(isset($_POST['username_reg'])  and isset($_POST['password_reg']) and isset($_POST['password_conf']) and isset($_POST['mail'])){ //Si l'utilisateur a bien saisi des données dans chaque case (car elles sont toutes obligatoires), on va vérifier si le compte peut être créé
    $user_by_username=getUsernameAndPasswordAndMailByUserName($_POST['username_reg']);
    $user_by_mail=getUsernameAndPasswordAndMailByMail($_POST['mail']);
    if(!empty($user_by_username)){
        $page="register"; //Permet de rediriger l'utilisateur vers la page actuelle (register) pour qu'il puisse s'inscrire correctement, on fait ça pour toutes les erreurs rencontrées
        $err_reg="Ce nom d'utilisateur est déjà utilisé";
    }
    else if($_POST['password_reg']!=$_POST['password_conf']){
        $page="register";
        $err_reg="Les mots de passe ne correspondent pas";
    }   
    else if(strlen($_POST['password_reg'])<$taille_min_mdp){
        $page="register";
        $err_reg="Votre mot de passe doit comporter au minimum ".$taille_min_mdp." caractères";
    } 
    else if(!empty($user_by_mail)){
        $err_reg="Cet adresse mail est déjà utilisée";
        $page="register";

    } 
    else if(!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){ //Si l'adresse mail n'est pas au bon format
        $err_reg="Veuillez saisir une adresse mail valide";
        $page="register";
    } 
    else{ //Après avoir vérifié tous les types d'erreur possible, si aucune n'est survenue on peut ajouter l'utilisateur
        addUser($_POST['username_reg'],$_POST['password_reg'],$_POST['mail']);
        $success_reg="Votre inscription a bien été prise en compte";
    }
}