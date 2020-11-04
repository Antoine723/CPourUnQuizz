<?php

function getAllQuestionsByIdQuizz($idQuizz){
    $query='SELECT * FROM questions WHERE questions.ID_extQuizz=?';
    return executeQuery($query,$idQuizz);
}

function getAllAnswersByIdQuizz($idQuizz){
    $query='SELECT * FROM answers INNER JOIN questions ON answers.ID_extQuestions=questions.Question_ID WHERE questions.ID_extQuizz=?';
    return executeQuery($query,$idQuizz);
}
function getAllGoodAnswersByIdQuizz($idQuizz){
    $query='SELECT * FROM answers INNER JOIN questions ON answers.ID_extQuestions=questions.Question_ID WHERE questions.ID_extQuizz=? AND answers.is_correct_answer=1';
    return executeQuery($query,$idQuizz);
}

function executeQuery($query,$param){
    global $bdd; //On utilise la variable globale bdd qui a été initialisée au début de l'index (variable qui se connecte à la bdd)
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

function getAllByUserName($username){
    $query='SELECT * FROM player WHERE player.Username=?';
    return executeQuery($query,$username);
}
function getUsernameAndPasswordAndMailByMail($mail){
    $query='SELECT Username,Password,Mail FROM player WHERE player.Mail=?';
    return executeQuery($query,$mail);
}

function addUser($username,$password,$mail){
    $query='INSERT INTO player(Username,Password,Mail) VALUES(?,?,?)';
    $infos=array($username,$password,$mail);
    return executeQuery($query,$infos);
}