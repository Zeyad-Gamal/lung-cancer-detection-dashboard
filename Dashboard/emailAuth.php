<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Libraries/Exception.php';
require 'Libraries/PHPMailer.php';
require 'Libraries/SMTP.php';



require_once realpath(__DIR__ . "/vendor/autoload.php");
// use Dotenv\Dotenv;
// $dotenv = Dotenv::createImmutable(__DIR__);
// $dotenv->load();
function sendMail($ParentEmail , $Message){


// $UserName = $_ENV['GMAIL_USERNAME'];
// $PassWord = $_ENV['GMAIL_PASSWORD'];

$UserName = 'lungcancerdetectioncs@gmail.com';
$PassWord = 'zpfrvcqxppeziqga';

$ReceiverMail = $ParentEmail;


$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    // $mail->Username   = getenv('GMAIL_USERNAME'); // Retrieve email from environment variable
    // $mail->Password   = getenv('GMAIL_PASSWORD'); // Retrieve password from environment variable
    $mail->Username   = $UserName; // Retrieve email from environment variable
    $mail->Password   = $PassWord; // Retrieve password from environment variable
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587; // TCP port to connect to

    //Recipients
    $mail->setFrom($UserName, '');
    $mail->addAddress($ReceiverMail, '');

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Lung cancer detection APP CS2010 Team';
    $mail->Body    = $Message;

if($mail->send()){
    return true;
}
else {
        
        if (strpos($mail->ErrorInfo, 'Invalid address') !== false) {
            return 'NOTFOUNDADDRESS';
        } else {
            return false; // Other error occurred
        }
    }
    
    // echo 'Email successfully sent!';
} catch (Exception $e) {
    // echo "Email sending failed: {$mail->ErrorInfo}";
}

}

// sendMail('zeyadabosetta2@gmail.com' , 'test grad app');
?>
