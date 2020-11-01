<!DOCTYPE html>

<html lang="fr">
    <link rel="stylesheet" href="../css/quizz1.css"/>
    <?php include("header.php");
    include_once 'database.php';
    
    $questions=getAllQuestionsByIdQuizz(1);
    

    $num_quizz=$questions[0]['ID_extQuizz'];
    $i=0;
    
    echo'
        <body>
            <div class="titre_quizz">
                    <h1>Quizz n°'.$num_quizz.'</h1>
            </div>
            <form  action="result1.php" method="post">
                <div>
                    <p>
                        <label for="Question 1"><b>Question 1 : '.$questions[$i]['Content'].'?</b></label> 
                        </br>
                        <div class="reponse">
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Marquez des buts !">Marquez des buts !</input>
                            </br>
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Gagnez la coupe">Gagnez la coupe</input>
                            </br>
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Sortez-vous les doigts du cul">Sortez-vous les doigts du cul</input>
                        </div>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 2"><b>Question 2 : '.$questions[$i]['Content'].'?</b></label> 
                        </br>
                        <div class="reponse">
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Un petit écureuil">Un petit écureuil</input>
                            </br>
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Une souris verte">Une souris verte</input>
                            </br>
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Pomme de reinette et pomme d\'api">Pomme de reinette et pomme d\'api</input>
                        </div>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 3"><b>Question 3 : '.$questions[$i]['Content'].'?</b></label> 
                        </br>
                        <div class="reponse">
                            <input type="text" name="'.$questions[$i]['Question_ID'].'"></input>
                        </div>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 4"><b>Question 4 : '.$questions[$i]['Content'].'?</b></label> 
                        </br>
                        <div class="reponse">
                            <input type="text" name="'.$questions[$i]['Question_ID'].'"></input>
                        </div>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 5"><b>Question 5 : '.$questions[$i]['Content'].'?</b></label> 
                        </br>
                        <div class="reponse">
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Des fêtards mais des sacrés soiffards">Des fêtards mais des sacrés soiffards</input>
                            </br>
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Des ringards mais des sacrés fêtards">Des ringards mais des sacrés fêtards</input>
                            </br>
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Des ringards mais des sacrés soiffards">Des ringards mais des sacrés soiffards</input>
                        </div>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 6"><b>Question 6 : '.$questions[$i]['Content'].'?</b></label>
                        </br>
                        <div class="reponse">
                            <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Denis">Denis</input>
                            </br>
                            <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Lionel">Lionel</input>
                            </br>
                            <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Serge" >Serge</input>
                            </br>
                            <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Francis" >Francis</input>
                        </div>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 7"><b>Question 7 : '.$questions[$i]['Content'].'</b></label>
                        </br>
                        <div class="reponse">
                            <input type="text" name="'.$questions[$i]['Question_ID'].'"></input>
                        </div>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 8"><b>Question 8 : '.$questions[$i]['Content'].'</b></label>
                        </br>
                        <div class="reponse">
                            <select name="'.$questions[$i]['Question_ID'].'" id="Question 8">
                                <option value="Le samedi">Le samedi</option>
                                <option value="Ton zizi">Ton zizi</option>
                                <option value="Ton esprit">Ton esprit</option>
                                <option value="Le tapis">Le tapis</option>
                            </select>
                        </div>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 9"><b>Question 9 : '.$questions[$i]['Content'].'?</b></label> 
                        </br>
                        <div class="reponse">
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Mais la mienne est décédée">Mais la mienne est décédée</input>
                            </br>
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Et la mienne a des CD">Et la mienne a des CD</input>
                            </br>
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Mais la mienne m\'a tout cédé">Mais la mienne m\'a tout cédé</input>
                        </div>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 10"><b>Question 10 : '.$questions[$i]['Content'].'</b></label>
                        </br>
                        <div class="reponse">
                            <input type="text" name="'.$questions[$i]['Question_ID'].'"></input>
                        </div>
                    </p>
                </div>';
                echo'
                <div>
                    <p>
                        <button type="reset">Reset</button>
                        <button type="submit">Submit</button>
                    </p>
                </div>
            </form>
        </body>

    <br>';
    include("footer.php");
    echo'
</html>';