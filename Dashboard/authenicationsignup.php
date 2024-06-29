<?php

require 'emailAuth.php';
require 'security.php';

require_once __DIR__ . '/vendor/autoload.php'; // Path to Composer autoload file
use Dotenv\Dotenv;

// Specify the directory where your .env file is located
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
$dbPassword1 = $_ENV['DB1_PASSWORD'];
$dbPassword2 = $_ENV['DB2_PASSWORD'];




try{

$signupemail = $_POST['signupemail'];
$signuppassword = $_POST['signuppassword'];

$signuppasswordn = $signuppassword;

// echo $signuppassword;

        
$conn2 = mysqli_connect("127.0.0.1:3306", "u811827511_user", "$dbPassword1", "u811827511_appusers");

$counter=0;
$sqlCheck = "SELECT * FROM users WHERE u_email = '$signupemail'";

// Execute the query
$resultCheck = mysqli_query($conn2, $sqlCheck);

// Check if the query was successful
if ($resultCheck) {
    
while ($rowCheck = mysqli_fetch_assoc($resultCheck)){
    $counter = $counter + 1;
}
}


if($counter == 0){
    $FMessage = 'Now, you are registring into Lung Cancer Detecion App, Please wait until you receive another email to confirm registration';
    
    // NOTFOUNDADDRESS
    $FirstMail = sendMail($signupemail , $FMessage);
    if( $FirstMail === true){
        
        $storedSignupemail = encryptData($signupemail);
        $storedPassword = encryptData($signuppassword);
        
        $sql = "INSERT INTO users VALUES ('','$storedSignupemail','$signuppassword', 'not active')";
        mysqli_query($conn2, $sql);
        
        // Close the database connection
        $conn2->close();
        
        $confirmationLink = 'https://lungcancerdetection2010.com/Dashboard/confirm.php?id='.encryptData($signupemail);
        $Message = 'Your new account has been created on the lung cancer detection application. You can log in through this email but you should confirm account through this link: '.$confirmationLink;
        
        if(sendMail($signupemail , $Message)){
            echo 'success';
        }
    


    }
    elseif ($result === 'NOTFOUNDADDRESS') {
        echo 'wrongemail';
    }
    
   
}
else if($counter > 0){
echo 'notallowed';    
}
 




} catch (Exception $e) {
    error_log("Error in PHP script: " . $e->getMessage());
    http_response_code(500);  // Set a 500 Internal Server Error status code
    echo "Internal Server Error";
}

?>