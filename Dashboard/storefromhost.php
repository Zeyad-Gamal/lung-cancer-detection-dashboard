<?php
$conn2 = mysqli_connect("127.0.0.1:3306", "u811827511_user", "@1Am8wwIt", "u811827511_appusers");


$query = "SELECT det_id FROM detections ORDER BY det_id DESC LIMIT 1";
$result = $conn2->query($query);

// Check if the query was successful
if ($result) {
    // Fetch the result into an associative array
    $rowr = $result->fetch_assoc();
    
    // Store the last value in a variable
    $lastValue = (int)$rowr['det_id'];

    // Output or use the value as needed
    echo "Last value: " . $lastValue;
} else {
    echo "Error: " . $conn->error;
}



// Check if the connection was successful
if ($conn2 === false) {
    die("Connection failed: " . mysqli_connect_error());
}

try {
    // Retrieve the array of values from the POST request
    $hValuesString = $_POST['hValues'];

    // Convert the comma-separated string back to an array
    $hValues = explode(',', $hValuesString);

    // Rest of your PHP script logic...
    
    // $pindex = mysqli_real_escape_string($conn2, $hValues[0]);
    // $pid = mysqli_real_escape_string($conn2, $hValues[1]);
    $age = mysqli_real_escape_string($conn2, $hValues[0]);
    $airpoll =  mysqli_real_escape_string($conn2,$hValues[1]);
    $alcohol =  mysqli_real_escape_string($conn2,$hValues[2]);
    $allergy =  mysqli_real_escape_string($conn2,$hValues[3]);
    $geneticrisk =  mysqli_real_escape_string($conn2,$hValues[4]);
    $diet =  mysqli_real_escape_string($conn2,$hValues[5]);
    $smoking = mysqli_real_escape_string($conn2, $hValues[6]);
    $passivesmoke = mysqli_real_escape_string($conn2, $hValues[7]);
    $coughingblood = mysqli_real_escape_string($conn2, $hValues[8]);
    $fatigue = mysqli_real_escape_string($conn2, $hValues[9]);
    $shortnessbreath = mysqli_real_escape_string($conn2, $hValues[10]);
    // $wheezing = mysqli_real_escape_string($conn2, $hValues[11]);
    $swallowing = mysqli_real_escape_string($conn2, $hValues[11]);
    $clubbingfinger = mysqli_real_escape_string($conn2, $hValues[12]);
    $frequentcold =  mysqli_real_escape_string($conn2,$hValues[13]);
    $drycough = mysqli_real_escape_string($conn2, $hValues[14]);
    $snoring = mysqli_real_escape_string($conn2, $hValues[15]);
    $result = mysqli_real_escape_string($conn2, $hValues[16]);
    
    $result = trim($result);
    $lastValue = $lastValue + 1;


    
    
    $sql = "INSERT INTO detections VALUES ('$lastValue' , '$age', '$airpoll','$alcohol','$allergy','$geneticrisk','$diet','$smoking','$passivesmoke','$coughingblood','$fatigue'
    ,'$shortnessbreath','$swallowing','$clubbingfinger','$frequentcold','$drycough','$snoring','$result','0'
    )";

mysqli_query($conn2, $sql);

// Close the database connection
$conn2->close();

    
    
    
    

    echo $hValues[0];  // You can replace this with the actual response you want to send back
} catch (Exception $e) {
    error_log("Error in PHP script: " . $e->getMessage());
    http_response_code(500);  // Set a 500 Internal Server Error status code
    echo "Internal Server Error";
}

?>
