<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/style.css">
    <title>Edit</title>
</head>
<body>
<?PHP
session_start();
require 'db.php';

// Retrieven van de values
$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

// Controle doen op het wachtwoord

if (isset($_POST['password'])) {
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $update = "UPDATE `users` SET `name` = '$username', `password` = '$password_hash', `avatar` = 'uploads/1615279677_file.jpg', `email` = '$email' WHERE `id` = '$id'";
    mysqli_query($conn,$update);

} else {

    $update = "UPDATE `users` SET `name` = '$username', `avatar` = 'uploads/1615279677_file.jpg', `email` = '$email' WHERE `id` = '$id'";
    mysqli_query($conn,$update);
   
}

header('Refresh:2; url=protected.php');
    echo "<img src='https://hackernoon.com/images/0*4Gzjgh9Y7Gu8KEtZ.gif' width='350px'>";


?>


</body>
</html>
