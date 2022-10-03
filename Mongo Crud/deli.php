<?php 

include '../vendor/autoload.php';

$con = new MongoDB\Client("mongodb://localhost:27010");

$db = $con -> Library_Management_System;
$conn = $db -> Books;


$udi = $_GET['id'];

$db -> Books ->deleteOne(['_id' => new MongoDB\BSON\ObjectID($udi)]);

header("location:delete.php");


?>