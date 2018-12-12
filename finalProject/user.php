<?php

include 'inc/dbConnection.php';
$dbConn = startConnection("project3");
include 'inc/functions.php';
function displayCategories() { 
    global $dbConn;
    
    $sql = "SELECT * FROM categories ORDER BY name";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
    foreach ($records as $record) {
        echo "<option value='".$record['categoryId']."'>" . $record['name'] . "</option>";
    }
}



?>

<!DOCTYPE html>
<html>
    <head>
        <title>Product Search</title>
                <link rel="stylesheet" href="css/styles.css" type="text/css" />

    </head>
    <body id = "userpage">
        
        <h1 id = 'mainMenu'>Product Search </h1>
        
        <form id = "formCenter">
            
            Product: <input type="text" name="name" placeholder="Product keyword" /> <br />
            <br>
            
            Category: 
            <select name="category">
               <option value=""> Select one </option>  
               <?=displayCategories()?>
            </select>
            <br>
            <br>
            Price: From: <input type="number" name="priceFrom"  /> 
             To: <input type="number" name="priceTo"  />
            <br>
            <br>
            Order By:
           <strong> Price </strong> <input type="radio" name="orderBy" value="productPrice">
            <strong>Name</strong> <input type="radio" name="orderBy" value="productName">
            <br>
            <br>
            <input type="submit" name="submit" value="Search!"/>
        </form>
        <br>
        <a href= "index.php">Home Page</a>
        <br>
        <br>
        <hr>
        
        <?= filterProducts() ?>
        
    


    </body>
</html>