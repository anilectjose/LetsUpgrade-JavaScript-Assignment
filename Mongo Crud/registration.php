<?php 

include '../vendor/autoload.php';

$con = new MongoDB\Client("mongodb://localhost:27010");
$db = $con->Library_Management_System;
$conn = $db->Books;

$uid = $_GET['id'];

if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];

    $ar = array(
        "BookName"=>"$fname",
        "Author"=>"$lname",
        "Publisher"=>"$email"
    );
    $conn->insertOne($ar);
    $conn -> updateOne(['_id'=>new MongoDB\BSON\ObjectID($uid)],
        ['$set'=>["BookName"=>"$fname", "Author"=>"$lname", "Publisher"=>"$email"]]
);
    header("Location:delete.php");
}
else{
    echo "Collection failed to insert";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration</title>
</head>
<body>
    <center>
        <form method="POST">
        <h1>Registration</h1><br>
        <label for="fname">First Name</label>
        <input type="text" name="fname" placeholder="First Name"><br>
        <label for="lname">Last Name</label>
        <input type="text" name="lname" placeholder="Last Name"><br>
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Email"><br>
        <input type="submit" name="submit" value="Submit"> 
    </form>
    </center>
</body>
</html>
