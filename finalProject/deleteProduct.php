<?php
session_start();

include 'inc/dbConnection.php';
$dbConn = startConnection("project3");
include 'inc/functions.php';
validateSession();

$sql = "DELETE FROM product WHERE productId = " . $_GET['productId'];
$stmt=$dbConn->prepare($sql);
$stmt->execute();

header("Location: admin.php");



?>