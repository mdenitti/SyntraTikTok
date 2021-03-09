<?PHP
$db_host = "freedb.tech";
$db_database = "freedbtech_massimodn";
$db_user = "freedbtech_massimodn";
$db_password = "welcome123";

if ($conn = mysqli_connect($db_host, $db_user, $db_password,$db_database)){
    //echo "connection ok";
    // volgorde is hier important!
} else {
    echo mysqli_connect_error();
}




//  
