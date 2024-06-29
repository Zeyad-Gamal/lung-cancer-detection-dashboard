<?php

require 'emailAuth.php';

try{


$usermail = $_POST['usermail'];
$newpassword = $_POST['usernpassword'];

        
$conn2 = mysqli_connect("127.0.0.1:3306", "u811827511_user", "@1Am8wwIt", "u811827511_appusers");






$sql = "UPDATE users SET u_password = '$newpassword' WHERE u_email = '$usermail'";

// Execute the query
// $result = $conn2->query($sql);
mysqli_query($conn2, $sql);

    
   


// Close the database connection
$conn2->close();

 $Message = 'Your password has been updated';
    sendMail($usermail , $Message);
    
echo 'success';



} catch (Exception $e) {
    error_log("Error in PHP script: " . $e->getMessage());
    http_response_code(500);  // Set a 500 Internal Server Error status code
    echo "Internal Server Error";
}

?>

