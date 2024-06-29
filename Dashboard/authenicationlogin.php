
<?php
error_reporting(0);

require 'security.php';



require_once __DIR__ . '/vendor/autoload.php'; // Path to Composer autoload file
use Dotenv\Dotenv;

// Specify the directory where your .env file is located
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
$dbPassword1 = $_ENV['DB1_PASSWORD'];



$conn2 = mysqli_connect("127.0.0.1:3306", "u811827511_user", "$dbPassword1", "u811827511_appusers");

$email = $_POST["loginemail"];
$password = $_POST["loginpassword"];


$sqlu = "SELECT * FROM users WHERE u_activation = 'active'";
$resultu = mysqli_query($conn2, $sqlu);

if ($resultu) {
    
while ($rowCheck = mysqli_fetch_assoc($resultu)){
    if(decryptData($rowCheck['u_email']) == $email && $rowCheck['u_password'] == $password){
        echo 'success';
        break;
    }
    
}
    
}

// // If the user exists, log them in
// if (mysqli_num_rows($resultu) > 0) {
//   // Get the user data
// //   $row = mysqli_fetch_assoc($resultu);
  
//   echo 'success';

// } 


mysqli_close($conn2);

?>
