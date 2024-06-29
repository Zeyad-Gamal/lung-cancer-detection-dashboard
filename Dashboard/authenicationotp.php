<?php

require 'emailAuth.php';

try{

$otpemail = $_POST['otpemail'];


        
$conn2 = mysqli_connect("127.0.0.1:3306", "u811827511_user", "@1Am8wwIt", "u811827511_appusers");

$counter=0;
$sql = "SELECT * FROM users WHERE u_email = '$otpemail'";

// Execute the query
$result = mysqli_query($conn2, $sql);

// Check if the query was successful
if ($result) {
    
while ($row = mysqli_fetch_assoc($result)){
$randomNumber = generateRandomNumber();
$counter = $counter+1;

$sql2 = "INSERT INTO otpcodes (otp , useremail) VALUES ('$randomNumber' , '$otpemail')";
mysqli_query($conn2, $sql2);
    
$Message = $randomNumber.' is your one time password (OTP) for user authentication from Message Central, POWERED BY: LungCancerDetection2010 Mobile app';
sendMail($otpemail , $Message);

echo 'otpsuccess';
exit();
}
}

if($counter==0)
{
    echo 'This email is not linked to any account';
}

// Close the database connection
$conn2->close();


    




} catch (Exception $e) {
    error_log("Error in PHP script: " . $e->getMessage());
    http_response_code(500);  // Set a 500 Internal Server Error status code
    echo "Internal Server Error";
}

?>




    <?php
function generateRandomNumber() {

    return rand(100000, 999999);

    
}


?>
