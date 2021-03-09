<?PHP
require 'db.php';
$id = $_GET['id'];
$query = "DELETE FROM users WHERE id ='$id'";
mysqli_query($conn, $query);
header('Refresh:1; url=protected.php');
echo "<img src='https://hackernoon.com/images/0*4Gzjgh9Y7Gu8KEtZ.gif' width='350px'>";