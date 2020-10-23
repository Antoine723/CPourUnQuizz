<!DOCTYPE html>

<html lang="fr">
    <link rel="stylesheet" href="../css/quizz1.css"/>
    <?php include("header.php");
    include_once 'database.php';
    
    $questions=getAllQuestionsByIdQuizz(3);
    $num_quizz=$questions[0]['ID_extQuizz'];
    $i=0;

    echo'
        <body>
            <div class="titre_quizz">
                <h1>Quizz n°'.$num_quizz.'</h1>
            </div>
            <form  action="result3.php" method="post">
                <div>
                    <p>
                        <label for="Question 1">Question 1 : '.$questions[$i]['Content'].'?</label> 
                        </br>
                        <div class="reponse">
                            <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Pas de chatte">Pas de chatte</input>
                            </br>
                            <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Pas de couilles">Pas de couilles</input>
                            </br>
                            <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Pas de cul">Pas de cul</input>
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
                            <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Jonathan Barré">Jonathan Barré</input>
                            </br>
                            <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="David Marsais">David Marsais</input>
                            </br>
                            <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Grégoire Ludig">Grégoire Ludig</input>
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
                            <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Ils auraient mieux fait de porter des doudounes">Ils auraient mieux fait de porter des doudounes</input>
                            </br>
                            <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="C\'était en hiver">C\'était en hiver</input>
                            </br>
                            <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Aux alentours de 0 degré Celsius">Aux alentours de 0 degré Celsius</input>
                            </br>
                            <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Il n\'y avait pas de combat">Il n\'y avait pas de combat</input>
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
                            <input type="text" name="'.$questions[$i]['Question_ID'].'"></input>
                        </div>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 5">Question 5 : '.$questions[$i]['Content'].'?</label> 
                        </br>
                        <div class="reponse">
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Xavier Bolan">Xavier Bolan</input>
                            </br>
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Jonathan Barré">Jonathan Barré</input>
                            </br>
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Michael Bay">Michael Bay</input>
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
                            <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Des petits clous rouillés avec le tétanos">Des petits clous rouillés avec le tétanos</input>
                            </br>
                            <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Des fourmis rouges">Des fourmis rouges</input>
                            </br>
                            <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Des petites braises">Des petites braises</input>
                            </br>
                            <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Sur une jambe">Sur une jambe</input>
                            </br>
                            <input type="checkbox" name="'.$questions[$i]['Question_ID'].'[]" value="Sur une main">Sur une main</input>
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
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Couscous">Couscous</input>
                            </br>
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Andouillette">Andouillette</input>
                            </br>
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Saucisse lentilles">Saucisse lentilles</input>
                            </br>
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Piment d\'Espelette">Piment d\'Espelette</input>
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
                            <select name="'.$questions[$i]['Question_ID'].'" id="Question 8">
                                <option value="Sur RTL">Sur RTL</option>
                                <option value="Sur Autoroute radio">Sur Autoroute radio</option>
                                <option value="Sur Radio Bretagne">Sur Radio Bretagne</option>
                                <option value="Sur Radio Vinci">Sur Radio Vinci</option>
                            </select>
                        </div>
                    </p>
                </div>';
                $i++;
                echo'
                <div>
                    <p>
                        <label for="Question 9">Question 9 : '.$questions[$i]['Content'].'</label>
                        </br>
                        <div class="reponse">
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Harissa">Harissa</input>
                            </br>
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="C\'est du pipi">C\'est du pipi</input>
                            </br>
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Hannibal">Hannibal</input>
                            </br>
                            <input type="radio" name="'.$questions[$i]['Question_ID'].'" value="Dégueulie">Dégueulie</input>
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
                            <select name="'.$questions[$i]['Question_ID'].'" id="Question 10">
                                <option value="Elle vient du glacier quésevich">Elle vient du glacier quésevich</option>
                                <option value="Y\'a des bubulles">Y\'a des bubulles</option>
                                <option value="Elle est bio pour la santé">Elle est bio pour la santé</option>
                            </select>
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