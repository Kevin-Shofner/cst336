<?php 



 function makeMonth(){
     //echo "<strong> Hello </strong";
     $img_locations;
     if($_GET["country"] == "USA"){
         $img_locations =["img/USA/chicago.png","img/USA/hollywood.png","img/USA/las_vegas.png","img/USA/ny.png","img/USA/yosemite.png"];
     }
     
     if($_GET["country"] == "France"){
         $img_locations = ["img/France/bordeaux.png","img/France/le_havre.png","img/France/lyon.png","img/France/montpellier.png","img/France/paris.png", "img/France/strasbourg.png"];
     }
     
     if($_GET["country"] =="Mexico"){
         $img_locations = ["img/Mexico/acapulco.png"];
     }
     
     if($_GET["month"] == "November") {
         echo"<strong>November</strong>";
         echo"<table>";
         
         for($i = 1; $i < 36; $i++){
             echo"<tr>";
             for($j = 0; $j < 7; $j++){
             echo"<td>";
             if($i <= 30){
                 echo"$i";
             }
             $i++;
             }
             $i--;
         }
     }
     
     if($_GET["month"] == "December") {
         echo"<strong>December</strong>";
         echo"<table>";
         
         for($i = 1; $i < 36; $i++){
             echo"<tr>";
             for($j = 0; $j < 7; $j++){
             echo"<td>";
             if($i <= 31){
                 echo"$i";
             }
             $i++;
             }
             $i--;
         }
     }
     
     if($_GET["month"] == "January") {
         echo"<strong>January</strong>";
         echo"<table>";
         
         for($i = 1; $i < 36; $i++){
             echo"<tr>";
             for($j = 0; $j < 7; $j++){
             echo"<td>";
             if($i <= 31){
                 echo"$i";
             }
             $i++;
             }
             $i--;
         }
     }
     
     if($_GET["month"] == "February") {
         echo"<strong>February</strong>";
         echo"<table>";
         
         for($i = 1; $i < 29; $i++){
             echo"<tr>";
             for($j = 0; $j < 7; $j++){
             echo"<td>";
             if($i <= 28){
                 echo"$i";
             }
             $i++;
             }
             $i--;
         }
     }
     
     echo"</table>";
     echo"<img src = \"$img_locations[0]\" title = 'something' alt ='something'>";
 }



?>


<html>
    <head>
        <title>Winter Vacation Planner!</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>

    </head>
<body>
    <main>
        <div>
            
        </div>
        <strong>Select Month:</strong>
        <form>
        <select name = "month">
            <option value ="">Select</option>
            <option value = "November">November</option>
            <option>December</option>
            <option>January</option>
            <option>February</option>
            
        </select>
        
        <div>
            
                Number of locations:
                <input type="radio" name="Three" value ="days"/> <strong>Three</strong>
                <input type="radio" name="Four" value ="days"/> <strong>Four</strong>
                <input type="radio" name="Five" value ="days"/> <strong>Five</strong>

        </div>
        <div>
            <strong>Select country</strong>
            <select name = "country">
                <option>USA</option>
                <option>Mexico</option>
                <option>France</option>
            </select>
        </div>
        
        <div>
                <strong>Visit locations in alaphabetical order:</strong>

                <input type = "radio" name"A" value = "order"/> <strong>A-Z</strong>
                <input type = "radio" name"Z" value = "order"/> <strong>Z-A</strong> 

        </div>
        <div>

            
                <input type="submit" value="Submit"/>
            </form>

        </div>
        
        <?php
        makeMonth();
        ?>
        
    </main>
</body>    
</html>