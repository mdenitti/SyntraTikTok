<?PHP 
session_start();
require 'db.php';
//Dit komt mee uit de browser
$username = $_POST['username'];
$password = $_POST['password'];

// Hier ga ik controleren als de gebruiker bestaat...
$query = "SELECT * FROM users WHERE name = '$username'";

if (mysqli_num_rows(mysqli_query($conn,$query)) != 0) {
    
        // Uitvoeren van de SQL
            $result = mysqli_fetch_assoc(mysqli_query($conn,$query));
            if ($username == $result['name'] && password_verify($password, $result['password'])) {
                                                    
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $result['role'];
                header('Refresh:2; url=protected.php');
                echo "<img src='https://hackernoon.com/images/0*4Gzjgh9Y7Gu8KEtZ.gif' width='350px'>";
                
            } else {
                echo "no access...";
            }

} else {
    echo "user does not exist...";
}




?>