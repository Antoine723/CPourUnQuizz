<!DOCTYPE html>

<html>
<?php include("header.php")?>
    <head>
        <title>Quizz n°1</title>
        <link rel="stylesheet" href="../css/quizz1.css"/>
    </head>
    <body>
        <div>
            <p>
                <img src="../images/logo_palmashow.jpg"/>
                </br>
                <h1>Quizz n°1</h1>
            </p>
        </div>
        <form  action="result1.php" method="post">
            <div>
                <p>
                    <label for="Question 1">Question 1: Qui est le plus fort ?</label> 
                    </br>
                    <input type="radio" name="Question 1" value="Petit Ours Brun">Petit Ours Brun</input>
                    </br>
                    <input type="radio" name="Question 1" value="Trotro">Trotro</input>
                </p>
            </div>
            <div>
                <p>
                    <label for="Question 2">Question 2: Que propose à ses employés le patron de chez Saint-Clou se faisant passer pour un stagiaire ?</label>
                    </br>
                    <input type="checkbox" name="alcool" >Alcool</input>
                    </br>
                    <input type="checkbox" name="spaghettis" >Spaghettis</input>
                    </br>
                    <input type="checkbox" name="stupefiants" >Stupéfiants</input>
                    </br>
                    <input type="checkbox" name="charentaises" >Charentaises</input>
                </p>
            </div>
            <div>
                <p>
                    <label for="Question 3">Question 3: Complétez cette phrase : "Un indien ?" </label>
                    </br>
                    <input type="text" name="Question 3"></input>
                </p>
            </div>
            <div>
                <p>
                    <label for="Question 4">Question 4: Comment s'écrit "Nico" ?</label>
                    </br>
                    <select name="Question 4" id="Question 4">
                        <option value="0">Avec un "N" comme "Nounours"</option>
                        <option value="1">Ça s'écrit pas ça se dit</option>
                        <option value="2">Avec un "Q" comme "Connard"</option>
                        <option value="3">Il doit y avoir un "p" quelque part</option>
                        <option value="15">Je connais un Nico</option>
                        <option value="Beaucoup trop">C'est quoi "Nico" ?</option>
                    </select>
                </p>
            </div>
            <div>
                <p>
                    <button type="reset">Reset</button>
                    <button type="submit">Submit</button>
                </p>
            </div>
        </form>
    </body>

<br>
<?php include("footer.php")?>
</html>