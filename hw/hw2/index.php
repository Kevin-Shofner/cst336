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
<html lang = "en">
    <head>
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
        <title>Your next 3 meals.</title>
    </head>
    <body>
        
    <?php        
    global $foods;
    $amount = count($foods); // 3rd array function 
    echo "<h1 id=topText> Out of  $amount food choices, 3 food and drink choices will be made!</h1>";
    echo "<br>";
    

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
        
        
        
        
        
    
    
    <footer>
        <br>
        <br>
        <br>
        
         <details>
                <summary>Citations:</summary>
                
 <a href ="https://static1.squarespace.com/static/583ca2f2d482e9bbbef7dad9/58863361d2b857a1707bf488/588677d403596ebc5f1d798b/1534376808162/iStock-5078775151900.jpg?format=1500w"> water.jpg</a>
<br>
<a href ="https://upload.wikimedia.org/wikipedia/commons/thumb/4/45/A_small_cup_of_coffee.JPG/1200px-A_small_cup_of_coffee.JPG"> coffee.jpg</a>
<br>
<a href ="https://us-east-1.tchyn.io/snopes-production/uploads/2018/08/gatoradead.jpg"> gatorade.jpg</a>
<br>
<a href ="https://cdn.shopify.com/s/files/1/1752/6725/products/smokea-stash-cans-smokea-dr-pepper-stash-can-20673625409_1400x.jpg?v=1518055462"> Dr.Pepper</a>
<br>
<a href ="https://target.scene7.com/is/image/Target/12953529?wid=488&hei=488&fmt=pjpeg"> coke.jpg</a>
<br>
<a href ="https://www.incredibleegg.org/wp-content/uploads/basic-french-omelet-930x550.jpg"> omelette.jpg</a>
<br>
<a href ="https://upload.wikimedia.org/wikipedia/commons/a/a3/Eq_it-na_pizza-margherita_sep2005_sml.jpg"> pizza.jpg</a>
<br>
<a href = "https://upload.wikimedia.org/wikipedia/commons/9/94/Salad_platter.jpg"> salad.jpg</a>
<br>
<a href = "https://hips.hearstapps.com/del.h-cdn.co/assets/18/08/1519155106-flank-steak-horizontal.jpg">steak.jpg</a>
<br>
<a href ="https://cdn-image.foodandwine.com/sites/default/files/styles/medium_2x/public/201403-xl-pineapple-teriyaki-glazed-chicken-wings.jpg?itok=HQJJGht_">wings.jpg</a>
<br>

            </details>
        
        <strong>Note: You can drink the same thing throughout the day, but you can't eat the same thing all day.</strong>
        <br>
        <br>
        <img src ="img/buddy_verified.png" id="buddy" alt = "Buddy_verification" title="Buddy_verification">
        
        <img  src ="img/csumb_logo.png" id = "csumb" alt = "CSUMB" title="CSUMB">
    </footer>
    </body>
</html>