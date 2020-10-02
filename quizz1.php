<!DOCTYPE html>

<html>
    <body>
        <form  action="/result1.php" method="post">
            <div>
                <p>
                    <label for="Question 1">Question 1: Quel est le vrai nom de Bibo ?</label> 
                    </br>
                    <input type="radio" name="Question 1" id="Tibeauld Blacel" value="Tibeauld Blacel">Tibeauld Blacel</input>
                    </br>
                    <input type="radio" name="Question 1" id="Thibaut Blasselle" value="Thibaut Blasselle">Thibaut Blasselle</input>
                    </br>
                    <input type="radio" name="Question 1" id="Bhibaut Tlasselle" value="Bhibaut Tlasselle">Bhibaut Tlasselle</input>
                </p>
            </div>
            <div>
                <p>
                    <label for="Question 2">Question 2: Qui est membre du BDS ?</label>
                    </br>
                    <input type="checkbox" name="Erwan" id="Erwan">Erwan</input>
                    </br>
                    <input type="checkbox" name="Mathias" id="Mathias">Mathias</input>
                    </br>
                    <input type="checkbox" name="Antoine" id="Antoine">Antoine</input>
                    </br>
                    <input type="checkbox" name="Thibaut" id="Thibaut">Thibaut</input>
                </p>
            </div>
            <div>
                <p>
                    <label for="Question 3">Question 3: Où habite Antoine ?</label>
                    </br>
                    <input type="text" name="Question 3" id="Question 3" placeholder="Ville"></input>
                </p>
            </div>
            <div>
                <p>
                    <label for="Question 4">Question 4: Combien de down Nico fait-il en un zombie ?</label>
                    </br>
                    <select name="Question 4" id="Question 4">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="15">15</option>
                        <option value="Beaucoup trop">Beaucoup trop</option>
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