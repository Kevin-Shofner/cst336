<?php
session_start();

include 'inc/dbConnection.php';
$dbConn = startConnection("project3");
include 'inc/functions.php';
validateSession();

if (isset($_GET['productId'])) {

  $productInfo = getProductInfo($_GET['productId']);    
  //print_r($productInfo);
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Product Info </title>
    </head>
    <body>
    
    <h3><?=$productInfo['name']?></h3>
     <?=$productInfo['description']?><br>
     <img src='<?=$productInfo['image']?>' height='75'/>
 
    <br>
    <br>
    <?=$productInfo['editedBy']?><br>
    </body>
</html>