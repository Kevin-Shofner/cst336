<?php 



 function makeMonth(){
     //echo "<strong> Hello </strong";
     $img_locations;
     $numOfDays;
     $count = 0;
     $indexs;
     $img_locations2;
     $img_places;
     $img_places2;
     if($_GET["country"] == "USA"){
         $img_locations =["img/USA/chicago.png","img/USA/hollywood.png","img/USA/las_vegas.png","img/USA/ny.png","img/USA/yosemite.png"];
         $img_places = ["Chicago", "Hollywood", "Las vegas", "New York", "Ysosemite"];
         //shuffle($img_locations);
     }
     
     if($_GET["country"] == "France"){
         $img_locations = ["img/France/bordeaux.png","img/France/le_havre.png","img/France/lyon.png","img/France/montpellier.png","img/France/paris.png", "img/France/strasbourg.png"];
        //shuffle($img_locations);
        $img_places = ["bordeaux", "le_havre", "lyon", "montpellier", "paris", "strasbourg"];
         
     }
     
     if($_GET["country"] =="Mexico"){
         $img_locations = ["img/Mexico/acapulco.png","img/Mexico/cabos.png","img/Mexico/cancun.png","img/Mexico/chichenitza.png","img/Mexico/huatulco.png","img/Mexico/mexico_city.png"];
         $img_places = ["acapulco", "cabos", "cancun", "chichenitza", "huatulco", "mexico_city"];
     
         //shuffle($img_locations);
     }
     
     if($_GET["days"] == "Three"){
         $numOfDays = 3;
         $spot1 = 1000;
         $spot2 = 1000;
         $spot3 = 1000;
         $max;
            /* if($_GET["month"] == "November") {
            $max = 30;
             }
             if($_GET["month"] == "December"){
                 $max = 31;
             }
             
              if($_GET["month"] == "January"){
                 $max = 31;
             }
             
              if($_GET["month"] == "February"){
                 $max = 28;
             } */
             $spot1 = rand(0, 4);
             $keepgoing = false;
             while(!$keepgoing){
                 $spot2 = rand(0, 4);
                 if($spot2 != $spot1){
                     $keepgoing = true;
                     echo "Stuck here :(";
                 }
             }
             
             $keepgoing = false;
             while(!$keepgoing) {
                 $spot3 = rand(0, 4);
                 if(($spot3 != $spot2 ) && ($spot3 != $spot1)){
                     $keepgoing = true;
                 }
             }
             $img_locations2[0] = $img_locations[$spot1];
             $img_places2[0] = $img_places[$spot1];
             $img_locations2[1] = $img_locations[$spot2];
             $img_places2[1] = $img_places[$spot2];
             $img_locations2[2] = $img_locations[$spot3];
             $img_places2[2] = $img_places[$spot3];
             
             if($_GET["order"] == "A"){
            rsort($img_locations2);
            rsort($img_places2);
             }
             if($_GET["order"] == "Z"){
            sort($img_locations2);
            sort($img_places2);
             }
         
     }
     else if($_GET["days"] =="Four"){
         $numOfDays = 4;
         
     }
     else if($_GET["days"] =="Five"){
         $numOfDays = 5;
     }
     
     echo "<h1> Num of days is </h1>";
     echo $numOfDays;
     
     if($_GET["month"] == "November") {
         echo"<strong>November</strong>";
         echo"<table>";
         $j = 0;
         while($j < $numOfDays){
             
         }
         
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
         $j = 0;
        // $indexs= array();
         while($j < $numOfDays){
             $num = rand(1, 30);
             if(sizeof($indexs) == 0){
               //  array_push($indexs, ["$num"]);
               $indexs[$count] = $num;
               $count+= 1;
               $j++;
             }
             $found = false;
             for($k = 0; $k < sizeof($indexs); $k++){
                 if($num == $indexs[$k]){
                     $found = true;
                 }
             }
             if(!$found){
                // array_push($indexs, ["$num"]);
                $indexs[$count] = $num;
                $count+= 1;
                 $j++;
             }
             
         }

        $count = 0;
         echo count($indexs);
         for($i = 1; $i < 36; $i++){
             echo"<tr>";
             for($j = 0; $j < 7; $j++){
             echo"<td>";
             
             if($i <= 31){
                 echo"$i";
             }
             for($t = 0; $t < sizeof($indexs); $t++){
                 if($i == $indexs[$t]){
                     echo "<h1> did it! </h1>";
                     echo "<img src = \"$img_locations2[$count]\" title = 'place' alt = 'place'>";
                     echo "<br>";
                     echo $img_places2[$count];
                     $count++;
                 }
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
     echo"<img src = \"$img_locations2[0]\" title = 'something' alt ='something'>";
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
                <input type="radio" name="days" value ="Three"/> <strong>Three</strong>
                <input type="radio" name="days" value ="Four"/> <strong>Four</strong>
                <input type="radio" name="days" value ="Five"/> <strong>Five</strong>

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

                <input type = "radio" name="order" value = "A"/> <strong>A-Z</strong>
                <input type = "radio" name="order" value = "Z"/> <strong>Z-A</strong> 

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