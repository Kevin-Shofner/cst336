<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
    </head>
    <body>
        <?php
        
        function displaySymbol($random_value){
        // $random_vaule = rand(0,2); // generates a random number from 0 to 2
        //echo $random_value;
        
        // if($random_value == 0 ) {
        //     $symbol = "seven";
        // }
        // else if ($random_vaule == 1) {
        //     $symbol = "orange";
        // }
        // else {
        //     $symbol = "cherry";
        // }
         switch($random_value){
             case 0: $symbol = "grapes";
                break;
            case 1: $symbol = "orange";
                break;
            case 2: $symbol = "cherry";
                break;
         }       


        echo "<img src=\"img/$symbol.png\" alt='$symbol' title='".ucfirst($symbol)."'\>";
        }
        
        $random_value1 = rand(0,2);
        displaySymbol($random_value1);
        $random_value2 = rand(0,2);
        displaySymbol($random_value2);
        $random_value3 = rand(0,2);
        displaySymbol($random_value3);
        
        echo "<br> Random Value 1: $random_vaule1 </br>";
        echo "<br> Random Value 2: $random_vaule2 </br>";
        echo "<br> Random Value 3: $random_value3 </br>";
        
        if($random_value1 == $random_value2){
            if($random_value1 == $random_value3){
                echo "<br> Congratulations!!! </br>";
            }
        }

        
        
        
        ?>
        

    </body>
</html>