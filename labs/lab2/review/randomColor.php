<?php
    function getLuckyNumber(){
        do {
                    $lucky =rand(1,10);

        } while($lucky == 4);
        echo $lucky;

    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <style>
        
        body{
                    <?php
                        $red = rand(0,255);
        echo "background-color: rgba($red,".rand(0,255).",".rand(0,255).",".(rand(0,10)/10).");";

                    
                    
                    
                             ?>

        }
    
         </style>
         <body>
                My Lucky number is: <?= getLuckyNumber() ?>
      
    </body>
</html>