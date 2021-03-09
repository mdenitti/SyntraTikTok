<?PHP
session_start();
session_destroy();
echo "Logging out...";
header('Refresh:2; url=login.php');
echo "<img src='https://hackernoon.com/images/0*4Gzjgh9Y7Gu8KEtZ.gif' width='350px'>";