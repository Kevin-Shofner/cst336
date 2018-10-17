<!DOCTYPE html>

<?php


function quizSubmit(){
    
    if($_GET["math"] == "" || $_GET["class"] == "" || $_GET["who"] == "" || $_GET["school"] == "" || $_GET["word"] == ""){
        echo   "<h1 id = 'important'>Make sure to answer every question before submitting!</h1>";
    }
    
    else{
        $myScore = 0;
        if($_GET["math"] == 4){
            $myScore = ($myScore + 20);
            echo "<h3 class = 'correct'> You got question 1 correct! </h3>";
        }
        else {
            echo "<h3 class = 'wrong'> You got question 1 wrong. The correct answer was 4.</h3>";
        }
        echo"<br>";
        if($_GET["class"] == "CST 338 Internet Programming"){
            $myScore = ($myScore + 20);
            echo "<h3 class = 'correct'> You got question 2 correct! </h3>";
        }
        else {
            echo "<h3 class = 'wrong'> You got question 2 wrong. The correct answer was CST 338 Internet Programming.</h3>";
        }
                echo"<br>";

        
         if($_GET["who"] == "Darth_Vader"){
            $myScore = ($myScore + 20);
            echo "<h3 class = 'correct'> You got question 3 correct! </h3>";
        }
        else {
            echo "<h3 class = 'wrong'> You got question 3 wrong. The correct answer was Darth Vader. </h3>";
        }
                echo"<br>";

         if($_GET["school"] == "CSUMB"){
            $myScore = ($myScore + 20);
            echo "<h3 class = 'correct'> You got question 4 correct! </h3>";
        }
        else {
            echo "<h3 class = 'wrong'> You got question 4 wrong. The correct answer was CSUMB.</h3>";
        }
                echo"<br>";

        if($_GET["word"] == "fun"){
            $myScore = ($myScore + 20);
            echo "<h3 class = 'correct'> You got question 5 correct! </h3>";
        }
        else {
            echo "<h3 class = 'wrong'> You got question 5 wrong. The correct answer was fun. </h3>";
        }
        
        echo"<br>";

        echo"<hr>";
        
        echo "<h2 id ='yourScore'> You got a $myScore% </h2>";
                echo"<br>";

        if($myScore == 100) {
            echo "<h2 id = 'congrats'> WOW YOU ARE VERY SMART! </h2>";
        }
        if($myScore >= 20 && $myScore < 100) {
            echo "<h2 id ='okay'> You need to try harder next time. </h2> ";
        }
        if($myScore < 20) {
            echo "<h2 id ='bad'> You did very poorly and need to study more. </h2>";
        }
        
    }
}
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Homework 3: Quiz</title>
        <link rel="stylesheet" href="css/styles.css" type="text/css" />

    </head>
    <body>
        
        <h1 id="title">How well can you do on this random quiz?</h1>
        
        <div>
            <form method="GET">
                <h2>Question 1: What is 2 + 2?</h2>
                <input type="number" name="math" placeholder="#" value="<?php echo isset($_GET["math"]) ? $_GET["math"] : '' ?>"/>
                <!-- Source from where this code helped me https://stackoverflow.com/questions/5198304/how-to-keep-form-values-after-post -->
                </div>
                
                <hr>
                <div>
                    <h2>Question 2: What is this class called?</h2>
                    <select name = "class" >
                        <option value ="" <?php if ($_GET["class"] == "" )  { 
                            echo "selected"; 
                        }
                        ?> >Select one</option>
                        <option <?php if ($_GET["class"] == "CST 338 Internet Programming" )  { 
                            echo "selected"; 
                        }
                        ?> >CST 338 Internet Programming</option>
                        <option <?php if ($_GET["class"] == "CST 9999 Make The Websites" )  { 
                            echo "selected"; 
                        }
                        ?>
                        >CST 9999 Make The Websites</option>
                        <option <?php if ($_GET["class"] == "MATH 570 Advanced Calculus" )  { 
                            echo "selected"; 
                        }
                        ?>
                        >MATH 570 Advanced Calculus</option>
                        <option <?php if ($_GET["class"] == "PE 101 Beginning Weightlifting" )  { 
                            echo "selected"; 
                        }
                        ?>
                        >PE 101 Beginning Weightlifting</option>
                    </select>
                    
                    <!-- Source on what inspired me for prefilled select option https://stackoverflow.com/questions/2246227/keep-values-selected-after-form-submission -->
                </div>
                <br>
                <hr>
                <div>
                    <h2>Question 3: Who is this?</h2>
                <br>
                <br>
                <img src = "img/darth_vader.jpg" alt="Who is this?" title="Who is this?" id= "Vader">
                <br>
                <br>
                <strong>Luke Skywalker</strong>
                <input type ="radio" name = "who" value = "Luke_Skywalker"
                <?php
              
                if ($_GET["who"] == "Luke_Skywalker") {
                    echo " checked";
                }
                ?>
                >
                
                <br>
                <strong>Darth Vader</strong>
                <input type="radio" name ="who" value ="Darth_Vader"
                
                <?php
              
                if ($_GET["who"] == "Darth_Vader") {
                    echo " checked";
                }
                ?>
                    >
                    <br>
                <strong>Elton John</strong>
                <input type="radio" name="who" value ="Elton_John"
                
                <?php
              
                if ($_GET["who"] == "Elton_John") {
                    echo " checked";
                }
                ?>
                >
                <br>
                <strong>Spongebob</strong>
                <input type ="radio" name = "who" value="Spongebob"
                <?php
              
                if ($_GET["who"] == "Spongebob") {
                    echo " checked";
                }
                ?>
                >
                </div>
                <br>
                <hr>
                <div>
                    <h2>Question 4: What is the name of the school that this library is at?</h2>
                    <br>
                    <img src = "img/csumb_library.jpg" alt="library" title="library" id = "library">
                    <br>
                    <select name = "school">
                        <option value =""<?php if ($_GET["school"] == "" )  { 
                            echo "selected"; 
                        }
                        ?> >Select one</option>
                        <option <?php if ($_GET["school"] == "UCLA" )  { 
                            echo "selected"; 
                        }
                        ?>
                        >UCLA</option>
                        <option <?php if ($_GET["school"] == "Hogwarts" )  { 
                            echo "selected"; 
                        }
                        ?>>Hogwarts</option>
                        <option <?php if ($_GET["school"] == "The Jedi Training Academy" )  { 
                            echo "selected"; 
                        }
                        ?>
                        >The Jedi Training Academy</option>
                        <option <?php if ($_GET["school"] == "Xavier's School for Gifted Youngsters" )  { 
                            echo "selected"; 
                        }
                        ?>
                        >Xavier's School for Gifted Youngsters</option>
                        <option <?php if ($_GET["school"] == "CSUMB" )  { 
                            echo "selected"; 
                        }
                        ?>
                        >CSUMB</option>
                    </select>
                    <br>
                    
                </div>
                <br>
                <hr>
                <div>
                    <br>
                    <h2>Question 5: Finish the Phrase: Time flies when you are having "___".</h2>
                    <br>
                    <input type = "text" name = "word" placeholder ="keyword" value="<?php echo isset($_GET["word"]) ? $_GET["word"] : '' ?>">
                </div>
                
                
                <div>
                    <br>

                    <br>
                    
                <input type="submit" value="Submit"/>
                
                </div>
                
            </form>
            <br>
            <br>
            <hr>


        <?php
        
        quizSubmit();
        
        ?>
        
        <details id = "footer">
            <summary>Sources Used</summary>
            <a href="https://www.starwars.com/databank/darth-vader" class = "link"> Darth Vader</a>
            <br>
            <a href="https://stackoverflow.com/questions/5198304/how-to-keep-form-values-after-post" class = "link"> Code that helped me with prefilled values</a>
            <br>
            <a href="https://stackoverflow.com/questions/2246227/keep-values-selected-after-form-submission" class = "link"> Code that helped me with select option prefilled values</a>
            <br>
            <a href= "http://www.theriddler.org/Background.png" class = "link">Riddler ? site </a>
            <br>
            <a href = "https://www.thoughtco.com/thmb/R1sbn_p9dsVl47alY4eXVqXBi0Q=/768x0/filters:no_upscale():max_bytes(150000):strip_icc()/csumb-CSU-Monterey-Bay-flickr-56a186fa5f9b58b7d0c065be.jpg" class= "link"> CSUMB Library</a>
        </details>

    </body>
    
    
</html>