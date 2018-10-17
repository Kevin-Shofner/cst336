<?php



    function yearList($startYear, $endYear){
        $sumOfYears;
        $count = 0;
        for($year = $startYear; $year <= $endYear; $year+= 1){
             echo "<li> Year $year ";
        if($year == 1776){
            echo " <strong> USA INDEPENDENCE!!!! </strong>";
        }
        if(($year % 100 ) == 0){
            echo "<strong> HAPPY NEW CENTURY!!! </strong>";
        }
        echo"</li>";
        $sum += $year;
        if($count == 0){
            echo "<img src ='zodiac/rat.png' alt = 'rat' title= 'rat'>";
        }
        if($count == 1) {
        echo "<img src ='zodiac/ox.png' alt = 'ox' title= 'ox'>";
        }
        if($count == 2) {
        echo "<img src ='zodiac/tiger.png' alt = 'tiger' title= 'tiger'>";
        }
        if($count == 3) {
        echo "<img src ='zodiac/rabbit.png' alt = 'ox' title= 'ox'>";
        }
        if($count == 4) {
        echo "<img src ='zodiac/dragon.png' alt = 'ox' title= 'ox'>";
        }
        if($count == 5) {
        echo "<img src ='zodiac/snake.png' alt = 'ox' title= 'ox'>";
        }
        if($count == 6) {
        echo "<img src ='zodiac/horse.png' alt = 'ox' title= 'ox'>";
        }
        if($count == 7) {
        echo "<img src ='zodiac/goat.png' alt = 'ox' title= 'ox'>";
        }
        
        if($count == 8) {
        echo "<img src ='zodiac/monkey.png' alt = 'ox' title= 'ox'>";
        }
        
        if($count == 9) {
        echo "<img src ='zodiac/rooster.png' alt = 'ox' title= 'ox'>";
        }
        if($count == 10) {
        echo "<img src ='zodiac/dog.png' alt = 'ox' title= 'ox'>";
        }
        
        if($count == 11) {
        echo "<img src ='zodiac/pig.png' alt = 'ox' title= 'ox'>";
        }
        $count += 1;
        if($count == 12){
            $count = 0;
        }
        //echo "$count";
        
    }
   // echo "<h1>Year Sum: $sum </h1>";
   return $sum;
        }
    
?>

<!DOCTYPE html>
<html>
    <body>
        <form method="GET">
        <input type="text" name="start" size="15" placeholder="start"/>
        <input type="text" name="end" size="15" placeholder="end"/>
        <input type="submit" name="submit" placeholder="submit"/>
        
        </form>
        <ul>
            
        <?php
        $startYear = $_GET["start"];
        $endYear = $_GET["end"];
        
        
/*        $startYear = 1800;
        $endYear = 1810;
        $sum = 0;
    for($year = $startYear; $year <= $endYear; $year++){
        echo "<li> Year $year ";
        if($year == 1776){
            echo " <strong> USA INDEPENDENCE!!!! </strong>";
        }
        if(($year % 100 ) == 0){
            echo "<strong> HAPPY NEW CENTURY!!! </strong>";
        }
        echo"</li>";
        $sum += $year;
    }
    echo "<h1>Year Sum: $sum </h1>"; */
    $starter = 2020;
    echo "<table>";
    for($i = 0; $i < $startYear; $i++){
        echo "<tr>";
    for($j = 0; $j < $endYear; $j++){
        echo "<th>";
        $sum = yearList($starter, $starter);
       $starter++;
       echo "</th>";
    }
    echo "</tr>";
    }
    echo "</table>";

    ?>
        </ul>
    </body>
   
</html>