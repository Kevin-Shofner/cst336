<?php

include 'inc/dbConnection.php';
$dbConn = startConnection("project3");

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

function filterProducts() {
    global $dbConn;
    
    $namedParameters = array();
    $product = $_GET['name'];
    
  
  
    $sql = "SELECT * FROM product WHERE 1"; //Gettting all records from database
    
    if (!empty($product)){
        //This SQL prevents SQL INJECTION by using a named parameter
         $sql .=  " AND product LIKE :product";
         $namedParameters[':product'] = "%$product%";
    }
    
    if (!empty($_GET['category'])){
        //This SQL prevents SQL INJECTION by using a named parameter
         $sql .=  " AND categoryId =  :category";
          $namedParameters[':category'] = $_GET['category'] ;
    }
   if(!empty($_GET['priceFrom'])){
       $sql .= " AND price >= :priceFrom";
       $namedParameters[":priceFrom"] = $_GET['priceFrom'];
   }
   
   if (!empty($_GET['priceTo'])) {
       $sql .= " AND price <= :priceTo";
       $namedParameters[":priceTo"] = $_GET['priceTo'];
   }
    //echo $sql;
    
    if (isset($_GET['orderBy'])) {
        
        if ($_GET['orderBy'] == "productPrice") {
            
            $sql .= " ORDER BY price";
        } else {
            
              $sql .= " ORDER BY productName";
        }
        
        
    }

    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);  

    echo "<table>";
    foreach ($records as $record) {
        echo "<tr>";
        echo"<th> <img src='".$record['image']."' alt = '".$record['name']."'</th>";
        echo "<th><a href='productInfo.php?productId=".$record['productId']."'></th>";
        //echo $record['name'];
       // echo "</a> ";
        echo "<th>". $record['description'] . "</th> <th>$" .  $record['price'] .   "</th>";   
        
    }


}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 6: Ottermart Product Search</title>
                <link rel="stylesheet" href="css/styles.css" type="text/css" />

    </head>
    <body>
        
        <h1 id = 'mainMenu'> Ottermart Product Search </h1>
        
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
        <hr>
        
        <?= filterProducts() ?>
        
    


    </body>
</html>