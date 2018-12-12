<?php
session_start();
include 'inc/dbConnection.php';
$dbConn = startConnection("project3");
include 'inc/functions.php';
validateSession();

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Admin Stats</title>
                        <link rel="stylesheet" href="css/styles.css" type="text/css" />

    </head>
    
    <body id = "statsPage">
         <div id="statsDiv">
                        <h1>Current Stats of our database.</h1><br>
                        
                        Max value product: <?php $record = maxValue();
            echo $record['name'];
            echo " $";
            echo $record['price'];
            
            ?>
            <br>
            <br>
            
            Min value product: <?php $record = minValue();
            
            echo $record['name'];
            echo " $";
            echo $record['price'];
            
            ?>
            <br>
            <br>
            
            Average price: $<?php $record = avgValue();
            echo $record['AVG(price)'];
            ?>
            
            
            <br>
            <br>
            
            Sum of prices: $<?php $record = sumValue();
            echo $record['SUM(price)'];
            
            ?>
            <br>
            <br>
                    Number of products : <?php $record = countProduct(); 
                    echo $record['COUNT(*)'];
                    ?>
                    <br>
                    <br>
                    <a href = "admin.php">Back to Admin Page</a>

                    </div>
                    
                    <br>
                               

    </body>
<!-- 1: SELECT AVG(price) FROM `product`
2: SELECT MIN(price) FROM `product`
3: SELECT MAX(price) FROM `product` WHERE 1
4: SELECT COUNT(*) FROM `product` WHERE 1

--> 
</html>

