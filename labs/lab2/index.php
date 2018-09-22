<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
    <div id = "main">
        <?php
        function displaySymbol($random_value, $count){
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

        if($count == 0){
             echo "<img id = 'reel1' src=\"img/$symbol.png\" alt='$symbol' title='".ucfirst($symbol)." ' width = '70' > ";
        }
        if($count == 1) {
            echo "<img id = 'reel2' src=\"img/$symbol.png\" alt='$symbol' title='".ucfirst($symbol)." ' width = '70'> ";

        }
        if($count == 2) {
            echo "<img id = 'reel3' src=\"img/$symbol.png\" alt='$symbol' title='".ucfirst($symbol)." ' width = '70'> ";

        }
       // echo "<img src=\"img/$symbol.png\" alt='$symbol' title='".ucfirst($symbol)."'\>";
        }
        $count = 0;
        $random_value1 = rand(0,3);
        displaySymbol($random_value1, $count);
        $count = 1;
        $random_value2 = rand(0,3);
        displaySymbol($random_value2, $count);
        $count = 2;
        $random_value3 = rand(0,3);
        displaySymbol($random_value3, $count);
        
        
      //  echo "<br> Random Value 1: $random_value1 </br>";
        //echo "<br> Random Value 2: $random_value2 </br>";
        //echo "<br> Random Value 3: $random_value3 </br>";

        if($random_value1 == $random_value2){
            if($random_value1 == $random_value3){
                switch($random_value1){
                    case 0: $points = 300;
                        break;
                    case 1: $points = 400;
                        break;
                    case 2: $points = 750;
                        break;
                    case 3: $points = 1000;
                        break;
                }
                echo "<br> ";
                 echo "<br> ";
                  echo "<br> ";
                   echo "<br> ";
                    echo "<br> ";
                     echo "<br> ";
                      echo "<br> ";
                      
                echo "<br> Congratulations!!! You won $points points! ";
                
            
            } else{
             echo "<br>  ";
                 echo "<br>  ";
                  echo "<br>  ";
                   echo "<br>  ";
                    echo "<br> ";
                     echo "<br>  ";
                      echo "<br>  ";
            echo"<br> Try Again!  ";
        }
            
        }
        else{
             echo "<br>  ";
                 echo "<br>  ";
                  echo "<br> ";
                   echo "<br> ";
                    echo "<br> ";
                     echo "<br> ";
                      echo "<br>  ";
            echo"<br> Try Again! ";
        }

        
        
        
        ?>
        
        <form>
            <input type="submit" value="Spin"/>
        </form>
        
        <footer>
        </footer>
        </div>
    </body>
</html>