<?php
session_start();

include 'inc/dbConnection.php';
$dbConn = startConnection("project3");
include 'inc/functions.php';
validateSession();


if (isset($_GET['updateProduct'])){  //user has submitted update form
    $productName = $_GET['name'];
    $description = $_GET['description'];
    $price =  $_GET['price'];
    $categoryId =  $_GET['categoryId'];
    $image = $_GET['image'];
    $editedBy = $_GET['editedBy'];
    
    $sql = "UPDATE product SET name= :name, description = :description, price = :price, categoryId = :categoryId, image = :image, editedBy = :editedBy WHERE productId = " . $_GET['productId'];
    $np = array();
    $np[":name"] = $productName;
    $np[":description"] = $description;
    $np[":image"] = $image;
    $np[":price"] = $price;
    $np[":categoryId"] = $categoryId;
    $np[":editedBy"] = $editedBy;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    echo " Product was edited!";
         
    
}


if (isset($_GET['productId'])) {

  $productInfo = getProductInfo($_GET['productId']);    
  
 // print_r($productInfo);
    
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update Products! </title>
            <script src="https://code.jquery.com/jquery-3.1.0.js"></script>

        <script>
             $("document").ready(function() {

            $("#zip").change(function() {

                $.ajax({

                    type: "GET",
                    url: "http://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php",
                    dataType: "json",
                    data: { "zip": $("#zip").val() },
                    success: function(data, status) {

                        //alert(data.city);
                       if(data == false){
                           
                           //alert("false");
                             $("#editedBy").val( "Edited from an unknown location.");
                           }
                           else{
                           //alert(data.city);
                           //alert("true");
                           $("#editedBy").val("Edited from " + data.county + ".");
                           }
                    },
                    complete: function(data, status) { //optional, used for debugging purposes
                        //alert(status);
                    }

                }); //ajax

            });
            });//zipEvent
        </script>
    </head>
    <body>

        <h1> Updating a Product </h1>
        
        <form>
            <input type="hidden" name="productId" value="<?=$productInfo['productId']?>">
           Product name: <input type="text" name="name" value="<?=$productInfo['name']?>"><br>
           Description: <textarea name="description" cols="50" rows="4"><?=$productInfo['description']?> </textarea><br>
           Price: <input type="text" name="price" value="<?=$productInfo['price']?>"><br>
           Category: 
           <select name="categoryId">
              <option value="">Select One</option>
              <?php
              
              $categories = getCategories();
              
              foreach ($categories as $category) {
                  
                  echo "<option  "; 
                  echo  ($category['categoryId']==$productInfo['categoryId'])?"selected":"";
                  echo " value='".$category['categoryId']."'>" . $category['name'] . "</option>";
                  
              }
              
              ?>
           </select> <br />
           Set Image Url: <input type="text" name="image" value="<?=$productInfo['image']?>"><br>
           <br>
           Zip edited from: <input type = "text" name= "zip" id = "zip">
           <input type = "hidden" id = "editedBy" name = "editedBy" >        
        <br>
         <?=$productInfo['editedBy']?>
         
         <br>
                    <input type="submit" name="updateProduct" value="Update Product">

            </form>


            <br><br>
            <a href = "admin.php">Back to Admin Page</a>
        
    </body>
</html>