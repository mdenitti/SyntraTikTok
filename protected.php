<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="includes/style.css">
    <title>Secure area</title>


</head>

<body>
<div class="container">
    <?PHP 
session_start();
require 'db.php';
if (isset($_SESSION['username'])) {

    // sessie van de rol in een traditionele var duwen;
    $role = $_SESSION['role'];
    // Onze login zone...
    echo "<h2>Welcome ".$_SESSION['username']."</h2>";
    echo "<a class='btn btn-success mb-4' href='logout.php'>Logout</a><br>";
    echo "Hier zit wel gevoelige informatie in... die mogen enkel users te zien krijgen...<br><br>";
    
    $query = "SELECT * FROM users ORDER BY id DESC";
    $query_result = mysqli_query($conn,$query);
    ?>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Avatar</th>
            <?PHP if ($role == 0) { echo "<th scope='col'>Actions</th>";} ?>
            </tr>
        </thead>
        <tbody>
   <?PHP
    
    while($row = mysqli_fetch_assoc($query_result)){

       $id = $row['id'];
       echo"<tr>";
       echo"<td>".$row['id']."</td>";
       echo"<td>".$row['name']."</td>";
       echo"<td>".$row['email']."</td>";
       if ($row['role'] == 0 ) {
        echo"<td>Admin</td>";
       } else {
        echo"<td>User</td>";
       }
       echo"<td><img class='img-fluid avatar' src='".$row['avatar']."'></td>";
       if ($role == 0) {
                        echo"<td>
                        <a class='btn btn-primary mr-1' href='edit.php?id=$id'>Edit</a>
                        <a class='btn btn-danger' href='delete.php?id=$id'>Delete</a>
                        </td>";
                       }
       echo"</tr>";  
    }
    ?>
    </tbody>
    </table>
    <?PHP

} else {
    header('Refresh:2; url=login.php');
    echo "Access denied, redirecting to login page";
    echo "<img src='https://hackernoon.com/images/0*4Gzjgh9Y7Gu8KEtZ.gif' width='350px'>";
}
?>
</div>
</body>

</html>