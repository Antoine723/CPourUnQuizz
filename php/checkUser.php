<?php


if(isset($_POST['username_log']) and isset($_POST['password_log'])){ //Si l'utilisateur a saisi username et mot de passe pour se connecter
    $user=getAllByUserName($_POST['username_log']); //On récupère le nom d'utilisateur et le mot de passe correspondat à ce nom (par la même occasion on vérifie donc si le username est enregistré dans la BDD donc si l'utilisateur s'est bien créé un compte)
    if(!empty($user)){ //S'il existe, on vérifie que le mot de passe est le bon
        if(password_verify($_POST['password_log'],$user[0]['Password'])){
            $_SESSION['user_id']=$user[0]['Player_ID'];
            $_SESSION['username']=$user[0]['Username'];
            $_SESSION['mail']=$user[0]['Mail'];

            
        }
        else{
            $err_log='Votre nom de compte ou votre mot de passe est incorrect'; //Voir pour utiliser password_verify
        }
    }
    else if(empty($user)) $err_log='Votre nom de compte ou votre mot de passe est incorrect';

}
