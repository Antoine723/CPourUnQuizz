<?php


if(isset($_POST['username']) and isset($_POST['password'])){ //Si l'utilisateur a saisi username et mot de passe pour se connecter
    $user=getUsernameAndPasswordByUserName($_POST['username']); //On récupère le nom d'utilisateur et le mot de passe correspondat à ce nom (par la même occasion on vérifie donc si le username est enregistré dans la BDD donc si l'utilisateur s'est bien créé un compte)
    if(!empty($user)){ //S'il existe, on vérifie que le mot de passe est le bon
        if($user[0]['Password']==$_POST['password']){
            $_SESSION['username']=$user[0]['Username'];
        }
        else{
            echo'Votre nom de compte ou votre mot de passe est incorrect'; //Voir pour utiliser password_verify
        }
    }
    else if(empty($user)) echo'Votre nom de compte ou votre mot de passe est incorrect';

}
