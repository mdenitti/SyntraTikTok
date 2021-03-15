<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Persons</title>
</head>
<?php include 'persons_lib.php' ?>
<body>
<?php 

$stefan = new person();
$jimmy = new person();
$john = new employee();

$stefan->set_name('Stefan Everts');
$jimmy->set_name('Jimmy Joe');
$john->set_name('John Conner');
?>
<div class="container">
    <div class="row">
    <div class="col-md-4"><?php echo $stefan->get_name() ?></div>
    <div class="col-md-4"><?php echo $jimmy->get_name() ?></div>
    <div class="col-md-4"><?php echo $john->get_name() ?></div>
    </div>
</div>
    
</body>
</html>