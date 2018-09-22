<?php


function displayArray(){
    global $symbols;
    echo"<hr>";
    print_r($symbols);
    for($i = 0; $i < count($symbols); $i++){
        echo $symbols[$i] .", ";
    }
}

    $symbols = array("seven");
    print_r($symbols);
    array_push($symbols, "orange", "grapes");
    print_r($symbols);
    displayArray(); //reference to arrays in php https://www.w3schools.com/php/php_ref_array.asp 
    
    echo "<hr>";
    shuffle($symbols);
    $points = array("orange" => 250, "cherry"=> 500);
    //echo $points["orange"]; // displays 250
    $points["seven"] = 1000;

    for($i = 0; $i < 3; $i++){
            $indexes[] = $symbols[ array_rand($symbols)];

            echo "random element: " . '<img src = "../lab2/img/'.$indexes[$i].'.png">'; //displays random image

    }
    
    if($indexes[0] == $indexes[1] and $indexes[0] == $indexes[2]){
        echo "congrats. you won " .$points[$indexes[0]];
    }
   // echo "random element: " . '<img src = "../lab2/img/'.$indexes.'.png">'; //displays random image
    

?>




<!DOCTYPE html>
<html>
    <head>
        <title> Review: Arrays </title>
    </head>
    <body>

    </body>
</html>