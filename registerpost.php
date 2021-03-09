<?PHP
require 'db.php';

$name = $_POST['username'];
$password_nohash = $_POST['password'];
$password = password_hash($password_nohash, PASSWORD_DEFAULT);
$email = $_POST['email'];
// Hier gaan we de bestaat al check loslaten:
$query_check = "SELECT * FROM users WHERE email = '$email'";
$query_check_result = mysqli_fetch_assoc(mysqli_query($conn,$query_check));

// Retrieve data for file
// Get the unix time voor unieke filenames...
$time = time();

// Concatenatie van mijn unix time met mijn filename en pad
$target_file = "uploads/".$time."_file.jpg";

move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);

if (!empty($query_check_result)) {
    // als de array niet leeg is, dan bestaat de gebruiker en moeten we niet toevoegen!
    echo "user alreay exist...";
    header('Refresh:2; url=register.php');
    echo "<img src='https://hackernoon.com/images/0*4Gzjgh9Y7Gu8KEtZ.gif' width='350px'>";
} else {
    // Insert - Voor dat we hier zijn, moeten we een verificatie hebben...
    $query = "INSERT INTO `users` VALUES (NULL, '$name', '$password', '$target_file', '$email', 1)";
    if (mysqli_query($conn,$query)){
        echo "insert ok";
    } else {
        echo mysqli_error($conn);
    }
    // hier dus ook de foutmelding moeten opvangen of te weten komen... 
    // Zoek eens op hoe we hier een foutmelding, waar we iets mee zijn...
}





