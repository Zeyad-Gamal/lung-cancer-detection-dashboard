<?php

require 'security.php';

$conn2 = mysqli_connect("127.0.0.1:3306", "u811827511_user", "@1Am8wwIt", "u811827511_appusers");

$UpdateDot = 500;
if($_GET['id']){
$Receivedemail = $_GET['id'];
$ReceivedemailDecrypt = decryptData($_GET['id']);

$counter=0;
$sqlCheck = "SELECT * FROM users";

// Execute the query
$resultCheck = mysqli_query($conn2, $sqlCheck);

// Check if the query was successful
if ($resultCheck) {
    
while ($rowCheck = mysqli_fetch_assoc($resultCheck)){
    if($rowCheck['u_activation'] == 'active' && decryptData($rowCheck['u_email']) == $ReceivedemailDecrypt){
        $UpdateDot = 205;
            $counter = $counter + 1;

    }
    elseif($rowCheck['u_activation'] == 'not active' && decryptData($rowCheck['u_email']) == $ReceivedemailDecrypt){
        $UpdateDot = 207;
            $counter = $counter + 1;

    }
}
}

if($counter == 0){
    $UpdateDot = 500;
}

else if($counter > 0 && $UpdateDot == 207){



$sqlCheck2 = "SELECT * FROM users";

// Execute the query
$resultCheck2 = mysqli_query($conn2, $sqlCheck2);

// Check if the query was successful
if ($resultCheck2) {
    
while ($rowCheck2 = mysqli_fetch_assoc($resultCheck2)){
    if($rowCheck2['u_activation'] == 'not active' && decryptData($rowCheck2['u_email']) == $ReceivedemailDecrypt){
        $requiredConf = $rowCheck2['u_email'];
        
$sql = "UPDATE users SET u_activation = 'active' WHERE u_email = '$requiredConf'";


if(mysqli_query($conn2, $sql)){
    $UpdateDot = 200;
}
    }
    
}

}




        

}

else if($counter > 0 && $UpdateDot == 205){
    $UpdateDot == 205;
}












if($UpdateDot == 200){
    $MessageContent = 'Your account confirmed';
    $IconC = '<i style="font-size: 6rem;color: green;" class="bi bi-check2-circle"></i>';
}

elseif($UpdateDot == 205){
    $MessageContent = 'Your account is already active';
    $IconC = '<i style="font-size: 6rem;color: rgb(0, 76, 228);" class="bi bi-check-circle-fill"></i>';
}


elseif($UpdateDot == 500){
    $MessageContent = 'Something is wrong';
    $IconC = '<i style="font-size: 6rem;color: red;"  class="bi bi-x-circle"></i>';
}


}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>

    <div style="display: flex;flex-direction: column;justify-content: center;margin-top: 17%;">

        <div style="width: fit-content;margin: auto;">
            <?php echo $IconC; ?> 
        </div>

<div style="margin: auto;"><h4 style="font-size: 4vh;text-align: center;">  <?php echo $MessageContent; ?>  </h4></div>
    </div>

</body>
</html>

