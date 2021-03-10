<?PHP
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'db.php';

//Load Composer's autoloader
require 'vendor/autoload.php';

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
        $mail = new PHPMailer(true);
        try {
            //Server settings
           // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.mailtrap.io';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = '';                     //SMTP username
            $mail->Password   = '';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
            //Recipients
            $mail->setFrom('tiktak@syntralimburg.be', 'SyntraTikTak');
            $mail->addAddress($email, $name);     //Add a recipient
            //$mail->addAddress('ellen@example.com');               //Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');
        
            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            $mail->addAttachment($target_file, 'uwprofiel.jpg');    //Optional name
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Uw TikTakregistratie: '.$name;
            $mail->Body    = "
            <div style='font-family: Arial, Helvetica, sans-serif'>
                <div style='color:red;font-size:20px'>Hallo $name</div>
                <span style='color:black'>We hebben uw registratie goed ontvangen. U maakt gebruik van volgend e-mail adres in onze database: $email
                </span>
                <div>Met vriendelijke groeten...</div>
            </div>
            ";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            //echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    } else {
        echo mysqli_error($conn);
    }
    // hier dus ook de foutmelding moeten opvangen of te weten komen... 
    // Zoek eens op hoe we hier een foutmelding, waar we iets mee zijn...
}





