<!DOCTYPE html>

<html lang="fr">
    <link rel="stylesheet" href="../css/quizz1.css"/>
    <?php include("header.php");
    include_once 'database.php';
    
    $questions=getAllQuestionsByIdQuizz(4);

    $num_quizz=$questions[0]['ID_extQuizz'];
    $i=0;

    echo'
        <body>
            <div class="titre_quizz">
                <h1>Quizz n°'.$num_quizz.'</h1>
            </div>
            <form  action="result4.php" method="post">
                <div>
                    <p>
                        <label for="Question 1">Question 1 : '.$questions[$i]['Content'].'?</label> 
                        </br>
                        <div class="reponse">
                            <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Master Flic">Master Flic</input>
                            </br>
                            <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Master SNCF">Master SNCF</input>
                            </br>
                            <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Master Cul">Master Cul</input>
                            </br>
                            <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Master Plomberie">Master Plomberie</input>
                            </br>
                            <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Master Cabrel">Master Cabrel</input>
                        </div>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 2">Question 2 : '.$questions[$i]['Content'].'?</label> 
                        </br>
                        <div class="reponse">
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Elle dispose d\'une isolation fougère remarquable">Elle dispose d\'une isolation fougère remarquable</input>
                            </br>
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Elle est cosy">Elle est cosy</input>
                            </br>
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="L\'air y est pur">L\'air y est pur</input>
                        </div>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 3">Question 3 : '.$questions[$i]['Content'].'?</label> 
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
                        <label for="Question 4">Question 4 : '.$questions[$i]['Content'].'?</label> 
                        </br>
                        <div class="reponse">
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="La Boxe">La Boxe</input>
                            </br>
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Le Mortal Kombat">Le Mortal Kombat</input>
                            </br>
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Judo">Judo</input>
                            </br>
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Le fracasse frère">Le fracasse frère</input>
                        </div>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 5">Question 5 : '.$questions[$i]['Content'].'?</label> 
                        </br>
                        </br>
                        <div class="reponse">
                            <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Menstruation">Menstruation</input>
                            </br>
                            <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Immigration">Immigration</input>
                            </br>
                            <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Pollution">Pollution</input>
                            </br>
                            <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Imagination">Imagination</input> 
                            </br>
                            <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Réparation">Réparation</input>
                            </br>
                            <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Promotion">Promotion</input>
                        </div> 
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 6">Question 6 : '.$questions[$i]['Content'].'</label>
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
                        <label for="Question 7">Question 7 : '.$questions[$i]['Content'].'?</label>
                        </br>
                        <div class="reponse"> 
                            <select name="'.$questions[$i]['Question_ID'].'" id="Question 8">
                                    <option value="Debout, assis, couché">Debout, assis, couché</option>
                                    <option value="Pas de hameçon">Cours, tabasse, tase</option>
                                    <option value="Fléchis, tu frappes, tu cours">Fléchis, tu frappes, tu cours</option>
                            </select>
                        </div>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 8">Question 8 : '.$questions[$i]['Content'].'</label>
                        </br>
                        <div class="reponse">
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="La limonette">La limonette</input>
                            </br>
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="De la bonne bibine">De la bonne bibine</input>
                            </br>
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Du cognac">Du cognac</input>
                            </br>
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Un pastis">Un pastis</input>
                        </div>
                        </br>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 9">Question 9 : '.$questions[$i]['Content'].'</label>
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
                        <label for="Question 10">Question 10 : '.$questions[$i]['Content'].'?</label> 
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