<?php




require_once __DIR__ . '/vendor/autoload.php'; // Path to Composer autoload file
use Dotenv\Dotenv;

// Specify the directory where your .env file is located
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
$dbPassword1 = $_ENV['DB1_PASSWORD'];
$dbPassword2 = $_ENV['DB2_PASSWORD'];





// Database 1
$host1 = '127.0.0.1';
$dbname1 = 'u811827511_lungcancer';
$username1 = 'u811827511_users';
$password1 = $dbPassword2;

// Database 2
$host2 = '127.0.0.1';
$dbname2 = 'u811827511_appusers';
$username2 = 'u811827511_user';
$password2 = $dbPassword1;

try {
    // Connect to the first database
    $conn1 = new PDO("mysql:host=$host1;dbname=$dbname1", $username1, $password1);
    // Set PDO error mode to exception
    $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Connect to the second database
    $conn2 = new PDO("mysql:host=$host2;dbname=$dbname2", $username2, $password2);
    // Set PDO error mode to exception
    $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Connected successfully to both databases";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>




<?php
if (isset($_POST['action']) && !empty($_POST['action'])) {
  $action = $_POST['action'];
  switch ($action) {
      // case 'myFunction' : myFunction($_POST['valu1']); break;
      // case 'myFunction2' : myFunction2($_POST['valu2']); break;
    case 'selectusersdata':
      selectUsersBar($conn2);
      break;
      
    case 'selectdetectionsdata':
        detections($conn2);
        break;

  }
}







function selectUsersBar($conn2){
    // Initialize variables to store counts
    $numberofUsers = 0;
    $numberofelementsHigh = 0;
    $numberofelementsMedium = 0;
    $numberofelementsLow = 0;

    // SQL queries
    $sqlupnav = "SELECT * FROM detections WHERE position_flag = 1";
    $sqlupnavusers = "SELECT * FROM users";

    // Execute the queries
    $resultupnav = $conn2->query($sqlupnav);
    $resultupnavusers = $conn2->query($sqlupnavusers);

    // Count the number of users
    if($resultupnavusers){
        $numberofUsers = $resultupnavusers->rowCount();
    }

    // Count the number of detections and their levels
    if ($resultupnav) {
        while ($rowTable = $resultupnav->fetch(PDO::FETCH_ASSOC)) {
            if($rowTable['result_Level'] === "High"){
                $numberofelementsHigh++;
            } elseif($rowTable['result_Level'] === "Medium"){
                $numberofelementsMedium++;
            } elseif($rowTable['result_Level'] === "Low"){
                $numberofelementsLow++;
            }
        }
    }

    // <div class="info-value">
    //     <h3>Detected</h3>
    //     <h3><i class="fa-solid fa-check"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="counter">'.($numberofelementsHigh + $numberofelementsMedium + $numberofelementsLow).'</span></h3>
    // </div>
    // Display the results
    echo '
    <div class="info-value">
        <h3>Users</h3>
        <h3><i class="fa-solid fa-users"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="counter">'.$numberofUsers.'</span></h3>
    </div>

    <div class="info-value">
        <h3>High</h3>
        <h3><i class="fa-solid fa-arrow-up"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="counter">'.$numberofelementsHigh.'</span></h3>
    </div>
    <div class="info-value">
        <h3>Medium</h3>
        <h3><i class="fa-solid fa-arrow-turn-up"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="counter">'.$numberofelementsMedium.'</span></h3>
    </div>
    <div class="info-value">
        <h3>Low</h3>
        <h3><i class="fa-solid fa-arrow-down"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="counter">'.$numberofelementsLow.'</span></h3>
    </div>';
}










function detections($conn2){
    


$detectionDataContainer = '';

// Query to fetch data from the specified column
$sqltable = "SELECT * FROM detections WHERE position_flag = 1";
$resultTable = $conn2->query($sqltable);


$countage_levHigh = 0;
$countage_levMedium = 0;
$countage_levLow = 0;

if ($resultTable) {

    // Fetch associative array



    
    
    while ($rowTable = $resultTable->fetch(PDO::FETCH_ASSOC)) {    
        
        
         $fatigueLevel = $rowTable["Fatigue"]; // Assuming fatigue levels range from 1 to 9
    $fatigueStatus = "";
    
    switch ($fatigueLevel) {
        case 1:
            $fatigueStatus = "Very Low";
            break;
        case 2:
            $fatigueStatus = "Low";
            break;
        case 3:
            $fatigueStatus = "Mild";
            break;
        case 4:
            $fatigueStatus = "Moderate";
            break;
        case 5:
            $fatigueStatus = "Moderately High";
            break;
        case 6:
            $fatigueStatus = "High";
            break;
        case 7:
            $fatigueStatus = "Very High";
            break;
        case 8:
            $fatigueStatus = "Extremely High";
            break;
        case 9:
            $fatigueStatus = "Maximum";
            break;
        default:
            $fatigueStatus = "Unknown";
            break;
    }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    $detectionDataContainer.="<tr>
    <td>P" . $rowTable["det_id"] . "</td>
        <td>" . $rowTable["Age"] . "</td>
        <td>" . ($rowTable["Air_Pollution"] == 0 ? "Low" : ($rowTable["Air_Pollution"] == 1 ? "Medium" : "High")) . "</td>
        <td>" . ($rowTable["Alcohol_use"] == 0 ? "Low" : ($rowTable["Alcohol_use"] == 1 ? "Medium" : "High")) . "</td>
        <td>" . ($rowTable["Dust_Allergy"] == 0 ? "Low" : ($rowTable["Dust_Allergy"] == 1 ? "Medium" : "High")) . "</td>
        <td>" . ($rowTable["Genetic_Risk"] == 0 ? "Low" : ($rowTable["Genetic_Risk"] == 1 ? "Medium" : "High")) . "</td>
        <td>" . ($rowTable["Balanced_Diet"] == 0 ? "Low" : ($rowTable["Balanced_Diet"] == 1 ? "Medium" : "High")) . "</td>
        <td>" . ($rowTable["Smoking"] == 0 ? "Low" : ($rowTable["Smoking"] == 1 ? "Medium" : "High")) . "</td>
        <td>" . ($rowTable["Passive_Smoker"] == 0 ? "Low" : ($rowTable["Passive_Smoker"] == 1 ? "Medium" : "High")) . "</td>
        <td>" . ($rowTable["Coughing_of_Blood"] == 0 ? "Low" : ($rowTable["Coughing_of_Blood"] == 1 ? "Medium" : "High")) . "</td>
        <td>" . $fatigueStatus . "</td>
        <td>" . ($rowTable["Shortness_of_Breath"] == 0 ? "Low" : ($rowTable["Shortness_of_Breath"] == 1 ? "Medium" : "High")) . "</td>
        <td>" . ($rowTable["Swallowing_Difficulty"] == 0 ? "Low" : ($rowTable["Swallowing_Difficulty"] == 1 ? "Medium" : "High")) . "</td>
        <td>" . ($rowTable["Clubbing_of_Finger_Nails"] == 0 ? "Low" : ($rowTable["Clubbing_of_Finger_Nails"] == 1 ? "Medium" : "High")) . "</td>
        <td>" . ($rowTable["Frequent_Cold"] == 0 ? "Low" : ($rowTable["Frequent_Cold"] == 1 ? "Medium" : "High")) . "</td>
        <td>" . ($rowTable["Dry_Cough"] == 0 ? "Low" : ($rowTable["Dry_Cough"] == 1 ? "Medium" : "High")) . "</td>
        <td>" . ($rowTable["Snoring"] == 0 ? "Low" : ($rowTable["Snoring"] == 1 ? "Medium" : "High")) . "</td>
        <td>" . $rowTable["result_Level"] . "</td>
    </tr>";
}

    
}
    
    
    
    echo $detectionDataContainer;
    
}










?>



















    <script>
        $(document).ready(function() {

$('.counter').each(function () {
$(this).prop('Counter',0).animate({
Counter: $(this).text()
}, 
});

});  

    </script>