<?php

session_start();
//$_SESSION["my_name"] ="Kevin";
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Setting a Session Variable </title>
    </head>
    
    <body>
        <h1> My name is <?= $_Session["my_name"] ?></h1>
    </body>
</html>