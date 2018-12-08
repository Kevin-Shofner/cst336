<?php
session_start();

include 'inc/dbConnection.php';
$dbConn = startConnection("project3");
include 'inc/functions.php';
validateSession();

if (isset($_GET['addProduct'])) { //checks whether the form was submitted
    
    $name = $_GET['name'];
    $description =  $_GET['description'];
    $price =  $_GET['price'];
    $categoryId =  $_GET['categoryId'];
    $image = $_GET['image'];
    $editedBy = $_GET['editedBy'];
    
    
    $sql = "INSERT INTO product (name, description, image, price, categoryId, editedBy) 
            VALUES (:name, :description, :image, :price, :categoryId, :editedBy);";
    $np = array();
    $np[":name"] = $name;
    $np[":description"] = $description;
    $np[":image"] = $image;
    $np[":price"] = $price;
    $np[":categoryId"] = $categoryId;
    $np[":editedBy"] = $editedBy;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    echo "New Product was added!";
    
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section: Add New Product </title>
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
                             $("#editedBy").val( "Added from an unknown location.");
                           }
                           else{
                           //alert(data.city);
                           //alert("true");
                           $("#editedBy").val("Added from " + data.county + ".");
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
        
        <h1> Adding New Product </h1>
        
        <form>
           Product name: <input type="text" name="name"><br>
           Description: <textarea name="description" cols="50" rows="4"></textarea><br>
           Price: <input type="text" name="price"><br>
           Category: 
           <select name="categoryId">
              <option value="">Select One</option>
              <?php
              
              $categories = getCategories();
              
              foreach ($categories as $category) {
                  
                  echo "<option value='".$category['categoryId']."'>" . $category['name'] . "</option>";
                  
              }
              
              ?>
           </select> <br />
           Set Image Url: <input type="text" name="image"><br>
           
             Zip added from: <input type = "text" name= "zip" id = "zip">
           <input type = "hidden" id = "editedBy" name = "editedBy" value= "Added from an unknown location." >        
        <br>

         <br>



            <br><br>
            <a href = "admin.php">Back to Admin Page</a>
        
           
           <input type="submit" name="addProduct" value="Add Product">
                       </form>

        </form>

    </body>
</html>