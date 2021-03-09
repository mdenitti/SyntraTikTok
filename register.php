<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="container">
    <?PHP 
   
    ?>

        <div class="row">
     
        <div class="col-md-12">
        <h2>Register user account</h2>
        
                <form action="registerpost.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>username</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email">
                        </div>

                        <div class="form-group">
                            <label>Avatar</label>
                            <input type="file" class="form-control" name="avatar">
                        </div>

                        <button type="submit" class="btn btn-primary">Register</button>
                </form>
        </div>
        

        </div>
    </div>
</body>
</html>