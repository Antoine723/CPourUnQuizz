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
    $infos=array($username,password_hash($password,PASSWORD_DEFAULT),$mail);
    return executeQuery($query,$infos);
}

function addScoreToUser($id_user,$id_quizz,$score)
{
    $query='INSERT INTO did(ID_extPlayer,ID_extQuizz,Score) VALUES(?,?,?)';
    $infos=array($id_user,$id_quizz,$score);
    return executeQuery($query,$infos);
}

function updateScore($id_user,$id_quizz,$updateScore)
{
    $query = 'UPDATE did SET Score =? WHERE ID_extPlayer = ? AND ID_extQuizz = ?';
    $infos=array($updateScore,$id_user,$id_quizz);
    return executeQuery($query,$infos);
}

function getScoreByIdPlayerAndIdQuizz($id_user,$id_quizz)
{
    $query='SELECT * FROM did WHERE did.ID_extPlayer=? AND did.ID_extQuizz=?';
    $infos=array($id_user,$id_quizz);
    return executeQuery($query,$infos);
}

function getThemeByIdQuizz($id_quizz)
{
    $query='SELECT Theme FROM quizz WHERE quizz.Quizz_ID=?';
    return executeQuery($query,$id_quizz);
}