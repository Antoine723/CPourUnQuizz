<!DOCTYPE html>

<html lang="fr">
    <link rel="stylesheet" href="../css/quizz1.css"/>
    <?php include("header.php");
    include_once 'database.php';
    
    $questions=getAllQuestionsByIdQuizz(5);

    $num_quizz=$questions[0]['ID_extQuizz'];
    $i=0;

    echo'
        <body>
            <div>
                <p>
                    <img src="../images/logo_palmashow.jpg"/>
                    </br>
                    <h1>Quizz n°'.$num_quizz.'</h1>
                </p>
            </div>
            <form  action="result5.php" method="post">
                <div>
                    <p>
                        <label for="Question 1">Question 1 : '.$questions[$i]['Content'].'?</label> 
                        </br>
                        <input type="text" name="'.$questions[$i]['Question_ID'].'"></input>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 2">Question 2 : '.$questions[$i]['Content'].'?</label> 
                        </br>
                        <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Il faut réserver sur Booking.yes">Il faut réserver sur Booking.yes</input>
                        </br>
                        <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Il faut réserver sur VoyageAdvisor">Il faut réserver sur VoyageAdvisor</input>
                        </br>
                        <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Il faut réserver sur Trivapart">Il faut réserver sur Trivapart</input>
                        </br>
                        <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Il faut réserver sur Canoë">Il faut réserver sur Canoë</input>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 3">Question 3 : '.$questions[$i]['Content'].'?</label> 
                        </br>
                        <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Ça fait des Ray-ban">Ça fait des Ray-ban</input>
                        </br>
                        <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Ça fait éléphant">Ça fait éléphant</input>
                        </br>
                        <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Ça fait dégueulasse">Ça fait dégueulasse</input>
                        </br>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 4">Question 4 : '.$questions[$i]['Content'].'?</label> 
                        </br>
                        <input type="text" name="'.$questions[$i]['Question_ID'].'"></input>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 5">Question 5 : '.$questions[$i]['Content'].'?</label> 
                        </br>
                        <input type="text" name="'.$questions[$i]['Question_ID'].'"></input>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 6">Question 6 : '.$questions[$i]['Content'].'</label>
                        </br>
                        <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Dieser Satz ist kompliziert">Dieser Satz ist kompliziert</input>
                        </br>
                        <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="这句话很复杂">这句话很复杂</input>
                        </br>
                        <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="The phrase is a bit too long">The phrase is a bit too long</input>
                        </br>
                        <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="The sentence is too complicated">The sentence is too complicated</input>
                        </br>
                        <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Questa frase è complicata">Questa frase è complicata</input>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 7">Question 7 : '.$questions[$i]['Content'].'?</label> 
                        </br>
                        <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="On utilise des béquilles">On utilise des béquilles</input>
                        </br>
                        <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="On installe un monte escalier Stallah">On installe un monte escalier Stallah</input>
                        </br>
                        <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="On utilise un fauteuil roulant">On utilise un fauteuil roulant</input>
                        </br>
                        <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="On se coupe les jambes">On se coupe les jambes</input>
                        </br>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 8">Question 8 : '.$questions[$i]['Content'].'</label>
                        </br>
                        <input type="text" name="'.$questions[$i]['Question_ID'].'"></input>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 9">Question 9 : '.$questions[$i]['Content'].'</label>
                        </br>
                        <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Des cahuètes">Des cahuètes</input>
                        </br>
                        <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Des petits crackers">Des petits crackers</input>
                        </br>
                        <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Des olives">Des olives</input> 
                        </br>
                        <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Des petites langues qui piquent sa mère">Des petites langues qui piquent sa mère</input> 
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 10">Question 10 : '.$questions[$i]['Content'].'?</label> 
                        </br>
                        <input type="text" name="'.$questions[$i]['Question_ID'].'"></input>
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