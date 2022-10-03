<?php

include '../vendor/autoload.php';

$m = new MongoDB\Client("mongodb://localhost:27010");
   echo "\n Connection to database successfully \n";

   $db = $m->Library_Management_System;
   echo "\n Database Library_Management_System selected \n";

   $collection = $db->Books;
   echo "\n Collection selected succsessfully \n";
?>