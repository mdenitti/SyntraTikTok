<?PHP
require 'vendor/autoload.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$name = "Massimo";
$mypdf = "
<body style='font-family: Arial, Helvetica, sans-serif'>
<h1>User registration aplication</h1>
<h2>Personal use only</h2>
<h3>Username: $name</h3>


</body>

";


$dompdf->loadHtml($mypdf);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($name.".pdf");

// Save the file to the server
$output = $dompdf->output();
file_put_contents('uploads/pdf/'.$name.'.pdf', $output);