<!DOCTYPE html>
<html>
    <head>
        <title>Quizz n°2</title>
        <link rel="stylesheet" href="quizz2.css">
    </head>
    <body>
        <div>
            ^<p>
                <img src="logo.png" alt=""><br>
                <h1>Quizz n°2</h1>
            </p>
        </div>
        <form action="result2.php" method="post">
            <div>
                <p>
                    <label for="Question 1">Question 1 : Complétez la phrase : "DjaDja tu m'as roulé...</label><br>
                    <input type="text" name='Question 1' placeholder="complétez"></input>
                </p>
            </div>
            <div>
                <p>
                    <label for="Question 2">Question 2 : Quelle(s) arme(s) redoutable(s) possède Morgan?</label><br>
                    <input type="checkbox" name="un magnum 76">un magnum 76</input><br>
                    <input type="checkbox" name="un physique que tu peux pas test">un physique que tu peux pas test</input><br>
                    <input type="checkbox" name="un balai-brosse dans la bouche">un balai-brosse dans la bouche</input><br>
                    <input type="checkbox" name="la maîtrise de la flûte">la maîtrise de la flûte</input>
                </p>
            </div>
            <div>
                <p>
                    <label for="Question 3">Question 3 : Elle est où Jeanne?</label><br>
                    <input type="text" name='Question 3' placeholder="on se le demande bien"></input>
                </p>
            </div>
            <div>
                <p>
                    <label for="Question 4">Question 4 : La question est dans la réponse</label><br>
                    <select name="Question 4" id="Question 4">
                        <option value=""></option>
                        <option value="j'ai menti">j'ai menti</option>
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
</html>