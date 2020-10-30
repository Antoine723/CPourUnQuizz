<?php

function getAllQuestionsByIdQuizz($idQuizz){
    $query='SELECT * FROM questions WHERE questions.ID_extQuizz=?';
    return executeQuery($query,$idQuizz);
}

function getAllAnswersByIdQuizz($idQuizz){
    $query='SELECT * FROM answers INNER JOIN questions ON answers.ID_extQuestions=questions.Question_ID WHERE questions.ID_extQuizz=?';
    return executeQuery($query,$idQuizz);
}

function executeQuery($query,$param){
    $bdd=new PDO('mysql:host=localhost;dbname=cpourunquizz','root','');
    try{
        $answers=$bdd->prepare($query);
        if(is_array($param)) $answers->execute($param);
        
        else $answers->execute(array($param));
        
        $datas=$answers->fetchall();
        $answers->closeCursor();

        return $datas;
    }
    catch(PDOException $e){
        var_dump($e);

    }

}

function getUsernameAndPasswordByUserName($username){
    $query='SELECT Username,Password FROM player WHERE player.Username=?';
    return executeQuery($query,$username);
}

function addUser($username,$password,$mail){
    $query='INSERT INTO player(Username,Password,Mail) VALUES(?,?,?)';
    $infos=array($username,$password,$mail);
    return executeQuery($query,$infos);
}