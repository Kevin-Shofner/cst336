 
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
            case 3: $symbol = "seven";
                break;
         }
 }
 
 function displayPoints($random_value1, $random_value2, $random_value3){
     if($random_value1 == $random_value2){
         if($random_value2 == $random_value3) {
             switch(@random_value1) {
                 case 0: $points = 300;
                        break;
                    case 1: $points = 400;
                        break;
                    case 2: $points = 900;
                        break;
                    case 3: $points = 1000;
                        break;
             }
             echo "<br> Congratulations!!! You won $points points! </br>";
         }
     }
     else{
         echo "<br> Try Again </h3>";
     }
 }
         
?>