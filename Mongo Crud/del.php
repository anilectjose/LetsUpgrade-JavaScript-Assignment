<?php
include 'connection.php';

@$uid = $_GET['id'];

$db->Books->deleteOne(['_id' => new MongoDB\BSON\ObjectID($uid)]);

header("location:delete.php");
?>