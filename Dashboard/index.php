<?php include 'connection.php';

session_start();




// Check if user is logged in, if not, redirect to login.php
if(!isset($_SESSION['authlog']) || $_SESSION['authlog'] !== true) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
// Your database connection code here...


?>
<!DOCTYPE html>
<html lang="en" >
  <!-- data-bs-theme="dark" -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons.css">

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
  />

    <link rel="stylesheet" href="css/style.css">


    <style>
    
    *{
      margin: 0; padding: 0;
  box-sizing: border-box;
  outline: none; border: none;
  text-decoration: none;
    }
    
    body{

        background-color: #f3f3f9;
    }
    #bar{
        /* background-color: rgb(252, 248, 248) !important; */
        background-color: rgba(28, 47, 66, 0.95) !important;
    }


    #page-address{
      text-align: center;
      color: rgb(4, 0, 16);
    }


    #menu li{
    /* padding-inline: 2rem; */
    border-radius: 1rem;
    border-style: solid;
    border-color: transparent;
    /* background-color: ye; */
    }

    #menu li a{
      color: rgb(221, 221, 221);
    }

#menu li:hover a{
    color: rgb(255, 255, 255);
}

#menu li:focus{
    background-color:  rgba(12, 86, 117, 0.39);
}
#menu li:focus a{
    color: whitesmoke;
}



        
    .gcharts{
        /* background-color: red; */
 
        /* display: grid;
        grid-template-columns: auto auto auto;
        column-gap: 2rem; */
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        gap: 0.2rem;
        width: 70%;
        justify-content: center;

        margin: auto;
     }


     .gcharts .charts{
        /* background-color: wheat; */
        width:  100%;
        /* box-shadow: 0.1rem 0.1rem 0.1rem 0.1rem black; */
     }

    .gcharts .charts canvas{
        width:  100%;
        height: 100%;
        
        /* padding: 0.5rem; */
    }


    .levels-container{
        display: flex;
        gap: 1.2rem;
        justify-content: center;
flex-wrap: wrap;
       
    }

    .levels-container .level-box{
        background-color: rgba(255, 255, 255,0.8);
        display: flex;
        gap: 10rem;
        padding: 0.7rem;
        padding-block: 1rem;
        border-style: solid;
        border-radius: 0.5rem;
        border-color: transparent;
        cursor: pointer;
        box-shadow: 0 1px 1px rgb(0 0 0 / 0.2);
    }

    .levels-container .level-box:hover{
        background-color: rgb(5, 6, 45);
    }

    .levels-container .level-box:hover .level-address{
        color: aliceblue;
    }

    .levels-container .level-box:hover .level-value{
        color: gold;
    }

    .levels-container .level-box .level-address{
        font-size: 1.5rem;
        color: rgb(5, 6, 45);
        /* color: rgb(231, 125, 37); */
        
    }

    .levels-container .level-box .level-address .level-result{
        font-size: 0.8rem;
        position: relative;
        color: gray;
    }


    .levels-container .level-box .level-value{
      position: relative;
        font-size: 1.2rem;
        color: rgb(18, 116, 143);
        right: 2rem;

    }

    table {
         width: 100% !important;
         /* border: 1px solid blue !important; */
         height: 10% !important;
         }

         th:nth-child(odd){
          background-color: rgba(79, 195, 160, 0.886);
         }

         th:nth-child(even){
          background-color: rgba(50, 73, 96, 0.886);
         }
         
         th{
          color: white !important;
          font-weight: normal;
          text-transform: uppercase;
         }
 
         th, td {
         /* border: 1px solid blue !important; */

         text-align: center !important;
         padding: 8px !important;
         /* font-size: 0.9rem !important; */
         }



          td:nth-child(odd){
          background-color: rgb(243, 243, 243) !important;
         }

         td:nth-child(even){
          background-color: rgb(255, 255, 255) !important;
         }


         

         html{
          overflow-y: hidden;
         }



         
.group-charts{
  margin-top: 2rem;display: flex;flex-direction:row; gap: 1rem; justify-content: center;flex-wrap: wrap;
}

.group-charts .charts{
 flex: 0 1 30%; padding: 2rem;
  background-color: rgb(255, 255, 255); box-shadow: 0 1px 1px rgb(0 0 0 / 0.2);border-radius: 0.4rem;
}

.group-charts .charts select{
  margin-left: 60%;
      width: 40%;
      /* background-color: rgb(255, 255, 255); */
}

.group-charts .charts h2{
    font-size: 1.5rem;
    
}




/*.mainBar{*/
/*    margin:auto;*/
/*    height:100% !important;*/
    /*width:52rem !important;*/
/*}*/

/* For the chart container */
.gcharts {
    width: 100%; /* Take full width of the parent container */
    max-width: 1000px; /* Limit the maximum width for better readability */
    margin: 0 auto; /* Center the container horizontally */
}

/* For the chart canvas */
.charts canvas {
    width: 100%; /* Take full width of the container */
    height: auto; /* Automatically adjust height to maintain aspect ratio */
}



@media (max-width: 768px) {

.group-charts{
  flex-direction:column; align-items:center;
}


 .levels-container .level-box{
     
 }
    }
    
@media (max-width: 532px) {
      /* Adjust the maximum height for smaller screens */
      .group-charts .charts{
        width: 90%;
      }

      .levels-container{
        padding: 0;
      }

      .levels-container .level-box{
        width: 80%;
      }
    }

    @media (max-width: 446px) {
      .levels-container .level-box .level-value{
        position: relative;
        display: block;
      }
    }

    @media (max-width: 410px) {
      .levels-container .level-box .level-value{
        right: 70%;
      }


    }
    </style>
</head>
<body >
    
  
    <div class="container-fluid" >
        <div class="row flex-nowrap">
            <div id="bar" class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100 buttons-li">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Welcome</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link align-middle px-0">
                                <i class="fa-solid fa-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="data.php"  class="nav-link px-0 align-middle">
                                <i class="fa-solid fa-chart-line"></i> <span class="ms-1 d-none d-sm-inline">Analytics</span> </a>
                            <ul class="collapse  nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 1 </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 2 </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="team.php"  class="nav-link px-0 align-middle">
                                <i class="fa-solid fa-people-group"></i> <span class="ms-1 d-none d-sm-inline">Our team</span> </a>

                        </li>
               
                        <li>
                            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                              <i class="fa-regular fa-circle-user"></i> <span class="ms-1 d-none d-sm-inline">Authentication</span></a>
                            <ul class="collapse nav flex-column ms-1" id="submenu2" style="list-style-type: circle !important;" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="login.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Sign in</span></a>
                                </li>
                                <li>
                                    <a href="signup.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Sign up</span></a>
                                </li>
                            </ul>
                        </li>
                        <!--<li>-->
                        <!--    <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">-->
                        <!--      <i class="fa-solid fa-code"></i> <span class="ms-1 d-none d-sm-inline">Developing team</span> </a>-->
                        <!--        <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">-->
                        <!--        <li class="w-100">-->
                        <!--            <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 1</a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 2</a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 3</a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 4</a>-->
                        <!--        </li>-->
                        <!--    </ul>-->
                        <!--</li>-->
                        <li>
                            <!--<a href="#" class="nav-link px-0 align-middle">-->
                            <!--    <i class="fa-solid fa-gear"></i> <span class="ms-1 d-none d-sm-inline">Settings</span> </a>-->
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown pb-4">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <!--<img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">-->
                            <span class="d-none d-sm-inline mx-1"><?php echo $username; ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <!--<li><a class="dropdown-item" href="#">New project...</a></li>-->
                            <!--<li><a class="dropdown-item" href="#">Settings</a></li>-->
                            <!--<li><a class="dropdown-item" href="#">Profile</a></li>-->
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col py-3" style="overflow-y: auto !important; height: 100vh !important;">
               <!-- <table class="table">
  <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th><th scope="col">Last</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th><th scope="col">Last</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td><td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td><td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table> -->


<!-- Start charts and search input -->


<!-- <div class="input-group rounded" style="width: 100%;">
  <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
  <span class="input-group-text border-0" id="search-addon">
    <i class="fas fa-search"></i>
  </span>
</div>
<div class="gcharts" >
    <div class="charts">
        <canvas id="myBarChart" width="400" height="300"></canvas>
    </div>
    <div class="charts">
        <canvas id="myBarChart2" width="400" height="300"></canvas>


    </div>
    <div class="charts">
        <canvas id="myBarChart" width="400" height="300"></canvas>


    </div>
</div> -->


<!-- End charts and search input -->



<h1 style="text-align: center;color:  #172431 ;">Lung cancer detection</h1>

<div class="levels-container" style="margin-top: 2rem;">
    <div class="level-box">

        <h2 class="level-address"><span class="level-result">High</span><br> <span id="levelhigh"></span>  </h2>
        <h2 class="counter level-value" id="levelhighvalue"> </h2>

    </div>

    <div class="level-box">

        <h2 class="level-address"><span class="level-result">Medium</span><br><span id="levelmedium"></span> </h2>
        <h2 class="counter level-value" id="levelmediumvalue"></h2>

    </div>

    <div class="level-box">

        <h2 class="level-address"><span  class="level-result">Low</span><br> <span id="levellow"></span> </h2>
        <h2 class="counter level-value" id="levellowvalue"></h2>

    </div>

</div>


<!-- Search input start -->
<!-- <div class="input-group rounded" style="width: 50%;margin: auto;margin-top: 3rem;">
  <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
  <span class="input-group-text border-0" id="search-addon">
    <i class="fas fa-search"></i>
  </span>
</div> -->
<!-- Search input end -->



<div class="gcharts" style="margin-top: 2rem;">
    <!-- <div class="charts">
        <canvas id="myBarChart" width="400" height="300"></canvas>
    </div> -->
    <div class="charts">
        <canvas id="bar-page1" class="mainBar" ></canvas>
    </div>
    

 
</div>







<div class="group-charts" >
    <div class="charts" >
    <h2>Level</h2>

    <!--  <select class="form-select" name="" id=""><option value="">select chart type:</option>-->
    <!--  <option value="">bar</option>-->
    <!--  <option value="">pie</option>-->
    <!--  <option value="">line</option>-->
    <!--</select>  -->
    
      <canvas id="pie-page1" style="width: 100%;height: 100%;"></canvas>
        <!-- <img src="spiro.jpg" alt="" style="width: 100%;"> -->
    </div>
    <div class="charts" >
        <h2>Age and Level (Average)</h2>

      <!--<select class="form-select" name="" id=""><option value="">select chart type:</option>-->
      <!--  <option value="">bar</option>-->
      <!--  <option value="">pie</option>-->
      <!--  <option value="">line</option>-->
      <!--</select> -->
        <canvas id="line-page1" style="width: 100%;height: 100%;"></canvas>
        <!-- <img src="spiro.jpg" alt="" style="width: 100%;"> -->
    </div>
    <div class="charts" >
        <h2>Clubbing of finger nails</h2>

      <!--<select class="form-select" name="" id=""><option value="">select chart type:</option>-->
      <!--  <option value="">bar</option>-->
      <!--  <option value="">pie</option>-->
      <!--  <option value="">line</option>-->
      <!--</select> -->
        <canvas id="scatter-page1" style="width: 100%;height: 100%;"></canvas>
        <!-- <img src="spiro.jpg" alt="" style="width: 100%;"> -->
    </div>
    
    <div class="charts" >
        <h2>Smoking</h2>

      <!--<select class="form-select" name="" id=""><option value="">select chart type:</option>-->
      <!--  <option value="">bar</option>-->
      <!--  <option value="">pie</option>-->
      <!--  <option value="">line</option>-->
      <!--</select> -->
        <canvas id="smoking-page1" style="width: 100%;height: 100%;"></canvas>
        <!-- <img src="spiro.jpg" alt="" style="width: 100%;"> -->
    </div>
</div>



<!-- Search input start -->
<div class="input-group rounded" style="width: 50%;margin: auto;margin-top: 3rem;">
  <input onkeyup="myFunction()" id="search-table-page1" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
  <span class="input-group-text border-0" id="search-addon">
    <i class="fas fa-search"></i>
  </span>
</div>
<!-- Search input end -->
<div class="container mt-5" style="overflow-x: auto;height: 70% !important; width: 90% !important; padding: 0;border-style: solid;border-color: transparent;box-shadow: 0 1px 1px rgb(0 0 0 / 0.2);">
  
  <table class="table table-responsive" id="table-page1">
    <thead>
      <tr>
        
        <th>index</th>
        <th>patient&nbsp;id</th>
        <th>age</th>
        <th>gender</th>
        <th>air&nbsp;pollution</th>
        <th>alcohol&nbsp;use</th>
        <th>dust&nbsp;Allergy</th>
        <th>OccuPational&nbsp;Hazards</th>
        <th>Genetic&nbsp;Risk</th>
        <th>chronic&nbsp;Lung&nbsp;Disease</th>
        <th>Balanced&nbsp;Diet</th>
        <th>Obesity</th>
        <th>Smoking</th>
        <th>Passive&nbsp;Smoker</th>
        <th>Chest&nbsp;Pain</th>
        <th>Coughing&nbsp;of&nbsp;Blood</th>
        <th>Fatigue</th>
        <th>Weight&nbsp;Loss</th>
        <th>Shortness&nbsp;of&nbsp;Breath</th>
        <th>Wheezing</th>
        <th>Swallowing&nbsp;Difficulty</th>
        <th>Clubbing&nbsp;of&nbsp;Finger&nbsp;Nails</th>
        <th>Frequent&nbsp;Cold</th>
        <th>Dry&nbsp;Cough</th>
        <th>Snoring</th>
        <th>Level</th>
      </tr>
    </thead>
    <tbody>
      <!-- Rows with hardcoded values -->
    
      

<?php


// Query to fetch data from the specified column
$sqltable = "SELECT * FROM detections WHERE position_flag = 0";
$resultTable = $conn->query($sqltable);


$countage_levHigh = 0;
$countage_levMedium = 0;
$countage_levLow = 0;

if ($resultTable) {

    // Fetch associative array
    while ($rowTable = $resultTable->fetch_assoc()) {
        // Store the values in the array
        if($rowTable['result_Level'] === "High"){
            $countage_levHigh = $countage_levHigh + $rowTable['Age'];
        }

        elseif($rowTable['result_Level'] === "Medium"){
            $countage_levMedium = $countage_levMedium + $rowTable['Age'];
        }

        elseif($rowTable['result_Level'] === "Low"){
            $countage_levLow = $countage_levLow + $rowTable['Age'];
        }
        

        echo "<tr><td>" . $rowTable["pindex"] . "</td><td>" . $rowTable["Patient_Id"] . "</td><td>" . $rowTable["Age"] . "</td>
        <td>" . $rowTable["Gender"] . "</td><td>" . $rowTable["Air_Pollution"] . "</td><td>" . $rowTable["Alcohol_use"] . "</td>
        <td>" . $rowTable["Dust_Allergy"] . "</td><td>" . $rowTable["OccuPational_Hazards"] . "</td><td>" . $rowTable["Genetic_Risk"] . "</td>
        <td>" . $rowTable["chronic_Lung_Disease"] . "</td><td>" . $rowTable["Balanced_Diet"] . "</td><td>" . $rowTable["Obesity"] . "</td>
        <td>" . $rowTable["Smoking"] . "</td><td>" . $rowTable["Passive_Smoker"] . "</td><td>" . $rowTable["Chest_Pain"] . "</td>
        <td>" . $rowTable["Coughing_of_Blood"] . "</td><td>" . $rowTable["Fatigue"] . "</td><td>" . $rowTable["Weight_Loss"] . "</td>
        <td>" . $rowTable["Shortness_of_Breath"] . "</td><td>" . $rowTable["Wheezing"] . "</td><td>" . $rowTable["Swallowing_Difficulty"] . "</td>
        <td>" . $rowTable["Clubbing_of_Finger_Nails"] . "</td><td>" . $rowTable["Frequent_Cold"] . "</td><td>" . $rowTable["Dry_Cough"] . "</td>
        <td>" . $rowTable["Snoring"] . "</td><td>" . $rowTable["result_Level"] . "</td>
        </tr>";

    }}
        ?>
       





     
      <!-- Repeat similar rows for the total number of rows (10 in this case) -->
      <!-- ... -->
    </tbody>
  </table>
</div>


<footer style="background-color: transparent !important;" class="text-center text-lg-start bg-body-tertiary text-muted">


  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: transparent;">
    © 2024 Copyright:
    <a class="text-reset fw-bold" href="#">All rights reserved to the Developer</a>
  </div>
  <!-- Copyright -->
</footer>

            </div>
        </div>
    </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

$('.counter').each(function () {
$(this).prop('Counter',0).animate({
Counter: $(this).text()
}, {
duration: 3000,
easing: 'swing',
step: function (now) {
    $(this).text(Math.ceil(now));
}
});
});

});  

    </script>







<script>
    function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search-table-page1");
            filter = input.value.toUpperCase();
            table = document.getElementById("table-page1");

            tr = table.getElementsByTagName("tr");


            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[25];

                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }


            }

            
        }
        
</script>



<script>








    document.addEventListener('DOMContentLoaded', function () {
      
      loadCharts([100,95,92,92,88,77,60,45,40,20,16,16,15],'bar',
      ['Coughing of blood','Clubbing of finger nails','Swallowing difficulty','Passive smoker','Fatigue','Smoking',
      'Air pollution','Shortness of breath','Alcohol use',
      'Age','Snoring','Dust allergy','Genetic risk'],'Weights of features','bar-page1',"flagType");    
     
      // loadCharts([10,20,30,40,50,60,70,22,55],'pie',['ch1','ch2','ch3','ch4','ch5','ch6','ch4','ch5','ch6'],'header pie','pie-page1');    
     
    //   loadCharts([10,20,30,40,50,60,70,22,55],'line',['ch1','ch2','ch3','ch4','ch5','ch6','ch4','ch5','ch9'],'header line','line-page1',"flagType");
      // loadCharts([10,20,30,40,50,60,70,22,55],'scatter',['ch1','ch2','ch3','ch4','ch5','ch6','ch4','ch5','ch6'],'header scatter','scatter-page1');    

});




</script>



<?php

// Query to fetch data from the specified column
$sqlLevels = "SELECT result_Level FROM detections";
$resultLevels = $conn2->query($sqlLevels);

if ($resultLevels) {
    $dataResults = array();

    // Fetch associative array
    while ($rowResults = $resultLevels->fetch_assoc()) {
        // Store the values in the array
        $dataResults[] = $rowResults['result_Level'];
    }

    $highCounter = 0;
    $lowCounter = 0;
    $mediumCounter = 0;
    $numberOfElements = count($dataResults);
    foreach ($dataResults as &$value) {
        if ($value === "High") {
            $highCounter++;
        } elseif ($value === "Low") {
            $lowCounter++;
        }
        elseif($value === "Medium"){
            $mediumCounter++;
        }
    }

    
  
    
    echo '<script>
    document.getElementById("levelhigh").innerHTML="'.number_format((($highCounter/$numberOfElements)*100),1).' %";
    document.getElementById("levelmedium").innerHTML="'.number_format((($mediumCounter/$numberOfElements)*100),1).' %";
    document.getElementById("levellow").innerHTML="'.number_format((($lowCounter/$numberOfElements)*100),1).' %";

    document.getElementById("levelhighvalue").innerHTML="'.(($highCounter)).'";
    document.getElementById("levelmediumvalue").innerHTML="'.(($mediumCounter)).'";
    document.getElementById("levellowvalue").innerHTML="'.(($lowCounter)).'";
    </script>';
}

?>


<?php 
// Smoking


$smoke0 = 0;
$smoke1 = 0;
$smoke2 = 0;

$sqlsmoke = "SELECT Smoking FROM detections";
$resultsmoke  = $conn2->query($sqlsmoke);

// Check if the query was successful
if ($resultsmoke) {
    $dataArraysmoke  = array();

    // Fetch associative array
    while ($rowsmoke  = $resultsmoke ->fetch_assoc()) {
        // Store the values in the array
        if($rowsmoke ['Smoking'] == 0){
            $smoke0 = $smoke0 + 1 ;
        }
        else if($rowsmoke ['Smoking'] == 1){
            $smoke1 = $smoke1 + 1 ;
        }
        else if($rowsmoke ['Smoking'] == 2){
            $smoke2 = $smoke2 + 1 ;
        }
        
    }



}






    $typesofsmoking = array();
    $typesofsmoking[0] = "Never";
    $typesofsmoking[1] = "Not much";
    $typesofsmoking[2] = "Heavily";
    
$typesofsmokingString = json_encode(array_map('strval', $typesofsmoking));
















// Clubbing
$clubbing0 = 0;
$clubbing1 = 0;

// Specify the column you want to retrieve
$columnName = "Clubbing_of_Finger_Nails";

// Query to fetch data from the specified column
$sql = "SELECT $columnName FROM detections";
$result = $conn2->query($sql);

// Check if the query was successful
if ($result) {
    $dataArray = array();

    // Fetch associative array
    while ($row = $result->fetch_assoc()) {
        // Store the values in the array
        $dataArray[] = $row[$columnName];
        if($row['Clubbing_of_Finger_Nails'] == 0){
            $clubbing0 = $clubbing0 + 1;
        }
        else if($row['Clubbing_of_Finger_Nails'] == 1){
            $clubbing1 = $clubbing1 + 1;
        }
        
    }

    // Count occurrences of each unique gender
    $genderCount = array_count_values($dataArray);
    $countArray1 = array_values($genderCount);
    // Create an array with gender types and their counts
    $countArray = array();
    foreach ($genderCount as $gender => $count) {
        $countArray[] = array('type' => $gender, 'count' => $count);
    }
    
    $typesofc = array();
$typesofc[0]='No';
$typesofc[1] = "Yes";
// // Loop through each entry in $countArray and extract 'type' values
// foreach ($countArray as $entry) {
//     if (isset($entry['type'])) {
//         $typesofc[] = strval($entry['type']); // Convert to string if not already
//     }
// }

// Enclose each value in double quotes
$typesofcString = json_encode(array_map('strval', $typesofc));


$countage_levHigh_av = $countage_levHigh / $numberOfElements;
$countage_levMedium_av = $countage_levMedium / $numberOfElements;
$countage_levLow_av = $countage_levLow / $numberOfElements;


    echo '<script>
    
    document.addEventListener("DOMContentLoaded", function () {
    loadCharts(['.$clubbing0.','.$clubbing1.'],"doughnut",'.json_encode($typesofcString).',"Clubbing nail","scatter-page1","php");    

    loadCharts(['.$highCounter.','.$mediumCounter.','.$lowCounter.'],"pie",(["High","Medium","Low"]),"Results","pie-page1","flagtype");
 
    loadCharts(['.$countage_levHigh_av.','.$countage_levMedium_av.','.$countage_levLow_av.'],"bar",(["High","Medium","Low"]),"Age and level","line-page1","flagType");
    
    loadCharts(['.$smoke0.','.$smoke1.','.$smoke2.'],"bar",(["Never","Not much","Heavily"]),"Age and level","smoking-page1","flagType");

    });
    
    
    </script>';



} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



// Close the database connection
$conn->close();



?>

<script src="js/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/bootstrapbundlemin.js"></script>
    <script type= "text/javascript" src="js/script.js"></script>
    <!--  -->
</body>
</html>