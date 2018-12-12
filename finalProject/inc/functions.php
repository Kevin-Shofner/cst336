<?php

function displayAllProducts(){
    global $dbConn;
    
    $sql = "SELECT * FROM product ORDER BY name";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records

    foreach ($records as $record) {
        echo "<a class='btn btn-primary' role='button' href='updateProduct.php?productId=".$record['productId']."'>Update</a>";
        //echo "[<a href='deleteProduct.php?productId=".$record['productId']."'>Delete</a>]";
        echo "<form action='deleteProduct.php' onsubmit='return confirmDelete()'>";
        echo "   <input type='hidden' name='productId' value='".$record['productId']."'>";
        echo "   <button class='btn btn-outline-danger' type='submit'>Delete</button>";
        echo "</form>";
        
        echo "[<a 
        
        onclick='openModal()' target='productModal'
        href='productInfo.php?productId=".$record['productId']."'>".$record['name']."</a>]  ";
        echo " $" . $record[price]   . "<br><br>";
        
    }
}

function validateSession(){
    if (!isset($_SESSION['adminFullName'])) {
        header("Location: index.php");  //redirects users who haven't logged in 
        exit;
    }
}

function getProductInfo($productId) {
     global $dbConn;
    
    $sql = "SELECT * FROM product WHERE productId = $productId";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting multiple records   
    
    return $record;
     
    
}

function getCategories() {
    global $dbConn;
    
    $sql = "SELECT * FROM categories ORDER BY name ";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records   
    
    //print_r($records);
    
    return $records;
    
}

function maxValue() {
    global $dbConn; 
    
    $sql = "SELECT * FROM product ORDER BY price DESC LIMIT 1";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting multiple records   
    
    return $record;
    
}

function countProduct() {
    global $dbConn;
    
    $sql = "SELECT COUNT(*) from product";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting multiple records   
    
    return $record;
    
}

function minValue() {
    global $dbConn; 
    
    $sql = "SELECT * FROM product ORDER BY price ASC LIMIT 1";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting multiple records   
    
    return $record;
}

function avgValue() {
    global $dbConn; 
    
    $sql = "SELECT AVG(price) FROM product";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting multiple records   
    
    return $record;
}  

function sumValue() {
     global $dbConn; 
    
    $sql = "SELECT SUM(price) FROM product";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting multiple records   
    
    return $record;
}

function filterProducts() {
    global $dbConn;
    
    $namedParameters = array();
    $product = $_GET['name'];
    
  
  
    $sql = "SELECT * FROM product WHERE 1"; //Gettting all records from database
    
    if (!empty($product)){
        //This SQL prevents SQL INJECTION by using a named parameter
         $sql .=  " AND name LIKE :name";
         $namedParameters[':name'] = "%$product%";
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
            
              $sql .= " ORDER BY name";
        }
        
        
    }

    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);  

    echo "<table id = 'userTable' align='center'>";
    foreach ($records as $record) {
        echo "<tr>";
        echo"<td> <img src='".$record['image']."' alt = '".$record['name']."'</td>";
        //echo "<td><a href='productInfo.php?productId=".$record['productId']."'></td>";
        //echo $record['name'];
       // echo "</a> ";
        echo "<td>". $record['description'] . "</td> <td>$" .  $record['price'] .   "</td>";   
        
    }


}




?>