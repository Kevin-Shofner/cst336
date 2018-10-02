<?php

$backgroundImage = "img/sea.jpg";
$searched = true;

if ((isset($_GET["keyword"])) && (($_GET["keyword"] != "") ||($_GET["category"] != ""))) {  //checks if the form has been submitted

    include "api/pixabayAPI.php";

    $keyword = $_GET["keyword"];
    if(!empty($_GET['category'])) {
        $keyword = $_GET['category'];
    }
    echo "You searched for:  $keyword";
    if((empty($_GET['category'])) &&(empty($_GET['keyword']))){
        $searched = false;
    }
    else {
        $searched = true;
    }
    
    //echo "Layout: " .  $_GET["layout"];


   $imageURLs = getImageURLs($keyword, $_GET["layout"]);
   //print_r($imageURLs);
   shuffle($imageURLs);

   $backgroundImage = $imageURLs[array_rand($imageURLs)];
    /*if((empty($_GET['category'])) &&(empty($_GET['keyword']))){
        $searched = false;
        $backgroundImage = "img/sea.jpg";
    } */
  
}



?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 4: Pixabay Slideshow </title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        
        <style>
            
            body {
                
                background-image: url(<?=$backgroundImage?>);
                background-size: cover;
                
            }
            
            #carouselExampleIndicators{
                 width:500px;
                 margin:0 auto; 
            }
            
        </style>
        
    </head>


    <body>

        <form method="GET">
            
            <input type="text" name="keyword" size="15" placeholder="Keyword"/>
            
            <input type="radio" name="layout" value="horizontal"> Horizontal
            <input type="radio" name="layout" value="vertical"> Vertical
            <select name = "category">
                <option value="">Select One</option>
                <option>Sea</option>
                <option>Forest</option>
                <option>Mountain</option>
                <option>Snow</option>
                <option>Otter</option>
            </select>
            <?php
            if($_GET["keyword"] == ""){
                $_GET["keyword"] = $_GET["category"];
            }
            ?>
            
            <input type="submit" name="submitBtn" value="Submit!!" />
            
        </form>
<?php
        if($searched == false){
       echo "<h1>You must type a keyword or select a category</h1>";
        }
        else {
            
        

?>        
        <?php
        if(isset($imageURLs)) { 
        ?>
        
       <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <?php
              for ($i=1; $i < 7; $i++) { 
                echo "<li data-target='#carouselExampleIndicators' data-slide-to='$i'></li>";
              }
             ?>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="<?=$imageURLs[0]?>" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="<?=$imageURLs[1]?>" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="<?=$imageURLs[2]?>" alt="Third slide">
            </div>
             <div class="carousel-item">
              <img class="d-block w-100" src="<?=$imageURLs[3]?>" alt="Fourth slide">
            </div>
             <div class="carousel-item">
              <img class="d-block w-100" src="<?=$imageURLs[4]?>" alt="Fifth slide">
            </div>
             <div class="carousel-item">
              <img class="d-block w-100" src="<?=$imageURLs[5]?>" alt="Sixth slide">
            </div>
             <div class="carousel-item">
              <img class="d-block w-100" src="<?=$imageURLs[6]?>" alt="Seventh slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <?php 
        }
        
        
        
         else {
             echo " <h1> Enter a Keyword or Select a Category!</h1>";
         }
         
        }
         ?>
        


       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
       
       <!-- Much of the code was inspired by Professor Miguel Lara's lab 4 code from his cloud9 workspace. -->
       
    </body>
</html>