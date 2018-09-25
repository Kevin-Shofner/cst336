<?php

$foods = array("omelette", "pizza", "steak", "salad", "wings");
$time = 0;
function chooseMeal($time){
    global $foods;
    $drinks = array("water", "coffee");
    array_push($drinks, "coke", "dr.pepper", "gatorade"); //first array function
    sort($foods); // second array function
   // $tempFood = $foods[rand(0, 4)];
   // $tempDrink = $drinks[rand(0,4)];
   $new_food = false;
   $tempFood;
   $tempDrink;
   while($new_food == false){ // first loop
      $tempFood = $foods[rand(0,4)]; 
      $tempDrink = $drinks[rand(0,4)];
      if($tempFood != "used"){ // first condition
          $new_food = true;
      }
   }
    for($i = 0; $i < 5; $i++){ // second loop
        if($foods[$i] == $tempFood){
            $foods[$i] = "used"; // Can't eat the same thing in 1 day, but drinking the same thing is fine.
        }
    }
    
        if($time == 0){
            echo "<img src =\"img/$tempFood.jpg\" alt ='$tempFood' title = '".ucfirst($tempFood)." '>";
            echo "<img src =\"img/$tempDrink.jpg\" alt ='$tempDrink' title = '".ucfirst($tempDrink)."'>";
            echo "<h1> Breakfast you will have $tempFood with $tempDrink. </h1>";
        }
        if($time == 1){
            echo "<img src =\"img/$tempFood.jpg\" alt ='$tempFood' title = '".ucfirst($tempFood)." '>";
            echo "<img src =\"img/$tempDrink.jpg\" alt ='$tempDrink' title = '".ucfirst($tempDrink)." '>";
            echo "<h2> Lunch you will have $tempFood with $tempDrink. </h2>";
        }
            
        if($time == 2){
            echo "<img src =\"img/$tempFood.jpg\" alt ='$tempFood' title = '".ucfirst($tempFood)." '>";
            echo "<img src =\"img/$tempDrink.jpg\" alt ='$tempDrink' title = '".ucfirst($tempDrink)." '>";
            echo "<h3> Dinner you will have $tempFood with $tempDrink. </h3>";
        }
    
    
}
?>


<!DOCTYPE html>
<html>
    <head>
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
        <title>Your next 3 meals.</title>
    </head>
    <body>
        
    <?php        
    global $foods;
    $amount = count($foods); // 3rd array function 
    echo "<h1 id=topText> Out of  $amount food choices, 3 food and drink choices will be made!</h1>";

    $time = 0;
        chooseMeal($time);
        
        ?>
        <br>
        <br>
        <br>
        <?php 
        $time = 1;
        chooseMeal($time);
        
        ?>
        
        
        <br>
        <br>
        <br>
        <?php 
        $time = 2;
        chooseMeal($time);
        
        ?>
        
        
        
        
        
    </body>
    
    <footer id = "buddy" >
        <br>
        <br>
        <br>
        <img src ="img/buddy_verified.png" alt = "Buddy_verification" title="Buddy_verification">
        
        <img  src ="img/csumb_logo.png" id = "csumb" alt = "CSUMB" title="CSUMB">
    </footer>
    
</html>