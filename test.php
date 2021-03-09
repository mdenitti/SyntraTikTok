<?PHP

// In dit script wil ik mijn database gaan aanspreken en de users weergeven...

// Deelproblemen
// DB connectie
// Query met select en query uitvoeren
// Conversie naar een array
// Foreach...of een while
// DB connectie
require 'db.php';

// Query
$query = "SELECT * FROM users";

// Uitvoeren van de SQL
$result = mysqli_query($conn,$query);

// het fetchen van het sql object naar een array... 
// en dan loopen tot einde object
while($array = mysqli_fetch_assoc($result)){
    echo $array['name']."-".$array['id']."<hr>";
};

$time = date("Y/m/d h:i:s");
echo $time;
$insert = "INSERT INTO registrations VALUES (NULL,1,'$time')";
if (mysqli_query($conn,$insert)){
    //
} else {
    echo mysqli_error($conn);
}

