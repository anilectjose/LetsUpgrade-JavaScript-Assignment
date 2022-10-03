<!DOCTYPE html>
<html lang="en">
<head>
    <title>Select UserData</title>
</head>
<body>
    <form method="GET">
    <center>
        <h1>View User Data</h1>
        <table border="2" cellspacing="2" cellpadding="2"> 
            <thead>
                <tr>
                    <th>Bname</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connection.php';
                $data = $collection->find();
                foreach($data as $row){ ?>
                <tr>
                    <td><?php echo $row['BookName']; ?></td>
                    <td><?php echo $row['Author']; ?></td>
                    <td><?php echo $row['Publisher']; ?></td>
                    <td>
                    <button><a href="deli.php?id=<?php echo $row['_id']; ?>" style="text-decoration:none; color:white;">Delete</a></button>
                        <button><a href="registration.php?id=<?php echo $row['_id']; ?>" style="text-decoration:none; color:white;">Edit</a></button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </center>
                </form>
</body>
</html>