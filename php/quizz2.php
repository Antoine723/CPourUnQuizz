<!DOCTYPE html>

<html lang="fr">
    <link rel="stylesheet" href="../css/quizz1.css"/>
    <?php include("header.php");
    include_once 'database.php';
    
    $questions=getAllQuestionsByIdQuizz(2);

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
            <form  action="result2.php" method="post">
                <div>
                    <p>
                        <label for="Question 1">Question 1 : '.$questions[$i]['Content'].'?</label> 
                        </br>
                        <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Pour nous faire chier">Pour nous faire chier</input>
                        </br>
                        <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Parce qu\'ils sont trop occupés">Parce qu\'ils sont trop occupés</input>
                        </br>
                        <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Pour se la couler douce">Pour se la couler douce</input>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 2">Question 2 : '.$questions[$i]['Content'].'?</label> 
                        </br>
                        <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="La pizza puante">La pizza puante</input>
                        </br>
                        <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="La pizza dégueulasse">La pizza dégueulasse</input>
                        </br>
                        <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="La pizza dégueulie">La pizza dégueulie</input>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 3">Question 3 : '.$questions[$i]['Content'].'?</label> 
                        </br>
                        <input type="text" name="'.$questions[$i]['Question_ID'].'"></input>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 4">Question 4 : '.$questions[$i]['Content'].'?</label> 
                        </br>
                        <select name="'.$questions[$i]['Question_ID'].'" id="Question 4">
                            <option value="J-Zel">J-Zel</option>
                            <option value="D-Zel">D-Zel</option>
                            <option value="Enz&Syd">Enz&Syd</option>
                            <option value="G-Zel">G-Zel</option>
                        </select>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 5">Question 5 : '.$questions[$i]['Content'].'?</label> 
                        </br>
                        <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Les petits roms">Les petits roms</input>
                        </br>
                        <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Les petits gitans">Les petits gitans</input>
                        </br>
                        <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Les petits singes">Les petits singes</input>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 6">Question 6 : '.$questions[$i]['Content'].'</label>
                        </br>
                        <input type="text" name="'.$questions[$i]['Question_ID'].'"></input>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                    <label for="Question 7">Question 7 : '.$questions[$i]['Content'].'?</label> 
                    </br>
                    <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Le piment d\'Espelette">Le piment d\'Espelette</input>
                    </br>
                    <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Le thym">Le thym</input>
                    </br>
                    <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="La côte de porc">La côte de porc</input>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 8">Question 8 : '.$questions[$i]['Content'].'</label>
                        </br>
                        <select name="'.$questions[$i]['Question_ID'].'" id="Question 8">
                            <option value="Pas de ver">Pas de ver</option>
                            <option value="Pas de moulinette">Pas de moulinette</option>
                            <option value="Pas de hameçon">Pas de hameçon</option>
                            <option value="Pas de canne">Pas de canne</option>
                        </select>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 9">Question 9 : '.$questions[$i]['Content'].'</label>
                        </br>
                        <input type="text" name="'.$questions[$i]['Question_ID'].'"></input>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 10">Question 10 : '.$questions[$i]['Content'].'?</label> 
                        </br>
                        <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="A 12">12</input>
                        </br>
                    <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="A 1000">1000</input>
                        </br>
                        <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="A 7">7</input>
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