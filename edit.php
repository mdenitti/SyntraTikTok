<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="includes/style.css">
    <title>Edit</title>
</head>
<body>

<?PHP 
session_start();
require 'db.php';

// Haal eerst de data op van de gebruiker
$id = $_GET['id'];
$query = "SELECT * FROM users WHERE id = '$id'";
$query_result = mysqli_fetch_assoc(mysqli_query($conn,$query));

// Daarna gaan we de data in een formulier duwen, klaar om te editeren...
?>


        <div class="container">
            <div class="row">
        
                <form action="editpost.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>username</label>
                                <input type="text" class="form-control" name="username" value="<?PHP echo $query_result['name']?>" required>
                                Hier geef ik onzichtbaar ook de id mee aan het posten van ons formulier naar editpost.php
                                <input type="hidden" name="id" value="<?php echo $query_result['id']?>">
                           </div>
                            <div class="form-group">
                                <label>Password (leave blank if no change)</label>
                                <input type="password" class="form-control" name="password" >
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" value="<?PHP echo $query_result['email']?>">
                            </div>

                            <div class="form-group">
                            <img class="img-fluid avatar" src="<?PHP echo $query_result['avatar']?>">
                                <label>Avatar</label>
                                <input type="file" class="form-control" name="avatar">
                            </div>

                            <button type="submit" class="btn btn-primary">Edit user</button>
                    </form>


            </div>
        </div>
               
    
</body>
</html>