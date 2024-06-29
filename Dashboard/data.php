<?php include 'connection.php';?>

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
      font-family: cursive;
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
#menu li:hover{
    /* background-color:  rgba(12, 86, 117, 0.39); */
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
        width: 100%;
        justify-content: center;

        margin-top: 2rem;
     }


     .gcharts .charts{
        /* background-color: wheat; */
        width:  70%;
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

        margin-top: 3.5rem;
    }

    .levels-container .level-box{
        background-color: rgb(255, 255, 255);
        display: flex;
        gap: 10rem;
        padding: 0.7rem;
        padding-block: 1rem;
        border-style: solid;
        border-radius: 0.5rem;
        border-color: transparent;
        cursor: pointer;
        box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
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
        font-family: cursive;
        color: rgb(5, 6, 45);
        /* color: rgb(231, 125, 37); */
        
    }

    .levels-container .level-box .level-address span{
        font-size: 0.8rem;
        position: relative;
        color: gray;
    }


    .levels-container .level-box .level-value{
        font-size: 1.2rem;
        font-family: cursive;
        color: rgb(18, 116, 143);

    }


    .group-charts{
      margin-top: 2rem;display: flex;gap: 0.6rem; justify-content: center;flex-wrap: wrap;
    }

    .group-charts .charts{
      background-color: transparent; flex: 0 1 30%; border-radius: 1rem;padding: 2rem;box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
    }

    .group-charts .charts select{
      margin-left: 60%;
      width: 40%;
      /* background-color: rgb(255, 255, 255); */
    }



    .group-charts .charts canvas{
      width: 100%;
      height: 100%;

      margin-top: 0.5rem;
    }


    table {
         width: 100% !important;
         /* border: 1px solid blue !important; */
         height: 10% !important;
         text-align: center;
         }
td:nth-child(even){
         border-left: 1px solid gainsboro !important;
         border-right: 1px solid gainsboro !important;
}


table tbody tr td span{
    padding: 0.1rem;padding-inline: 0.5rem;font-weight: 600;
}

table tbody tr:hover td{
    background-color: #f3f3f9;
}
         
         /**/
         
             .datatable {
         width: 100% !important;
         /* border: 1px solid blue !important; */
         height: 10% !important;
         }

         .datatable th:nth-child(odd){
          background-color: rgba(79, 195, 160, 0.886);
         }

         .datatable th:nth-child(even){
          background-color: rgba(50, 73, 96, 0.886);
         }
         
         .datatable th{
          color: white !important;
          font-weight: normal;
          text-transform: uppercase;
         }
 
         .datatable th, td {
         /* border: 1px solid blue !important; */

         text-align: center !important;
         padding: 8px !important;
         /* font-size: 0.9rem !important; */
         }



          .datatable td:nth-child(odd){
          background-color: rgb(243, 243, 243) !important;
         }

         .datatable td:nth-child(even){
          background-color: rgb(255, 255, 255) !important;
         }
         
         /**/

         html{
          overflow-y: hidden;
         }



         .data-blocks{
                    display: flex; flex-wrap: wrap;flex-direction: row;justify-content: space-between;gap: 1rem;  width: 97%;height: 50%;  margin: auto;margin-top: 3rem;
                }
                .data-blocks .data-box{
                    background-color: rgb(255, 255, 255); flex: 40%;padding: 1rem;box-shadow: 0 1px 1px rgb(0 0 0 / 0.2);border-radius: 0.4rem;
                }

                .data-blocks .data-box .block-info{
                    display: flex;flex-direction: row; padding: 0.9rem;background-color:; justify-content: space-between;
                }

                .data-blocks .data-box .block-info h3{
                    font-size: 1.2rem;font-weight: 600;color: rgb(50, 50, 50);
                }

                .data-blocks .data-box .text-success{
                    position: relative;bottom: 3.2%;
                }


                .data-blocks .data-box table tbody tr td h3 span{
                    font-size: 1.6rem;color: rgb(66, 66, 66);
                }


                .data-blocks .data-box table tbody tr td h3 .add-n2{
                
                    font-size: 1.4rem;
                }


                .data-blocks .data-box .table{
                    max-height: 7rem !important;
                }

                .data-blocks .data-box .table tbody tr td{
                    border: none !important;
                }

                .data-blocks .data-box .table thead tr th{
                    background-color: #f3f6f9 ;
                }






         
         .data-top-menu .info-value{
                    padding: 1rem; display: grid; background-color:  rgb(255, 255, 255);
                    
                }

                .data-top-menu .info-value:nth-child(even){
                    border-left-color: gainsboro; border-left-style: solid;border-left-width: 0.1px;
                    border-right-color: gainsboro; border-right-style: solid;border-right-width: 0.1px;
                }

                .data-top-menu{
                    display: grid;grid-template-columns: 25% 25% 25% 25% ;column-gap:0rem;width: 97%;margin: auto; place-content: center;box-shadow: 0 1px 1px rgb(0 0 0 / 0.2);border-radius: 0.4rem;
                }


                .data-top-menu .info-value h3{
                    font-size: 0.9rem;
                    text-transform: uppercase;
                    color: #656565;
                }

                .data-top-menu .info-value h3 i{
                    font-size: 2.3rem;
                }

                .data-top-menu .info-value h3 span{
                    font-size: 2.1rem;
                    color: black;
                }



                @media (max-width: 621px) {
                    .data-top-menu {
                   display: flex;
                   gap: 0.5rem;
                   flex-direction: column;
                    }
                }


                @media (max-width: 820px) {
                    .data-top-menu .info-value h3{
                        font-size: 80%;
                    }


                    .data-top-menu .info-value h3 i{
                        font-size: 80%;

                }

                .data-top-menu .info-value h3 span{
                    font-size: 80%;

                }
                }




                @media (max-width: 768px) {
      /* Adjust the maximum height for smaller screens */
      .data-blocks .data-box
      {
        width: 50%;
      }
    }

                
    </style>
</head>
<body >
    
  
    <div class="container-fluid" >
        <div class="row flex-nowrap" >
            <div  id="bar" class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
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
                   
                </div>

            </div>
            <div class="col py-3" style="overflow-y: auto !important; height: 100vh !important;">
            
                
                <section class="data-top-menu" id="nav-up-data">


                   
                </section>



                

                <section class="data-blocks">
                    <div class="data-box">
                        <div class="block-info">
                            <h3>Coughing of blood</h3>
                            </div>

                            <div class="text-success">
                                <hr>
                              </div>

                              <table><tbody id="scatter-percentage"></tbody>
                            
                            </table>
                        
                        <canvas id="scatter-page2" style="width: 100% !important;height: 100% !important;"></canvas>
                    </div>



                <!--    <div class="data-box" style="flex: 25%;">-->
                <!--        <div class="block-info">-->
                <!--            <h3>Gender</h3>-->
                <!--            </div>-->

                <!--            <div class="text-success">-->
                <!--                <hr>-->
                <!--              </div>-->

                          
                <!--    <canvas id="pie-page2" style="width: 100% !important;height: 100% !important;"></canvas>-->
                <!--</div>-->
                    
                    
                    
                    

            <!--    <div class="data-box" style="flex: 25%;">-->
            <!--        <div class="block-info">-->
            <!--            <h3>Dust allergy</h3>-->
            <!--            </div>-->

            <!--            <div class="text-success">-->
            <!--                <hr>-->
            <!--              </div>-->

                    
            <!--    <canvas id="doughnut-page2" style="width: 100% !important;height: 100% !important;"></canvas>-->
                
            <!--</div>-->





            <div class="data-box" style="flex: 50%;">
                <div class="block-info">
                    <h3>Alcohol use</h3>
                    </div>

                    <div class="text-success">
                        <hr>
                      </div>

                
            <canvas id="bar-page2" style="width: 100% !important;height: 100% !important;"></canvas>
            
        </div>

         


    
    <div class="data-box" style="flex: 25%;">
        <div class="block-info">
            <h3>Coughing of blood</h3>
            </div>

            <div class="text-success">
                <hr>
              </div>

        
    <canvas id="pie2-page2" style="width: 100% !important;height: 100% !important;"></canvas>
    
</div>
                    
<div class="data-box" style="flex: 50%;max-height: 150%;">
    <div class="block-info">
        <h3>Coughing of blood</h3>
        </div>

        <div class="text-success">
            <hr>
          </div>

    
          <div style="display: flex;flex-direction: column; height: 80%;background-color: ;">
            <!--<div class="input-group rounded" style="width: 100%;margin: auto;margin-bottom: 1rem;">-->
            <!--    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />-->
            <!--    <span class="input-group-text border-0" id="search-addon">-->
            <!--      <i class="fas fa-search"></i>-->
            <!--    </span>-->
            <!--  </div>-->
            <div style="flex: 100%; height: 100% !important; background-color: ;overflow: auto !important;max-height: 100% !important;">
             <table class="table table-responsive " style="" >
                 <thead>
                  <tr>
                      <th># Patient id</th>
                      <th>Age</th>
                      <th>Coughing of blood</th>
                      <th>Result</th>
                  </tr>
                 </thead>
      
      
                 <tbody id="bloodTable">
      
      
                  <tr>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td><span style="background-color: rgba(229, 160, 64, 0.292);color: rgb(215, 129, 0);padding: 0.1rem;padding-inline: 0.5rem;font-weight: 600;">Medium</span></td>
                  </tr>
                  <tr>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td><span style="background-color: rgba(64, 229, 78, 0.292);color: rgb(0, 147, 12);padding: 0.1rem;padding-inline: 0.5rem;font-weight: 600;">Low</span></td>
                  </tr>
                  <tr>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td><span style="background-color: rgba(229, 64, 64, 0.292);color: rgb(221, 0, 0);padding: 0.1rem;padding-inline: 0.5rem;font-weight: 600;">High</span></td>
                  </tr>
      
                  <tr>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td><span style="background-color: rgba(229, 160, 64, 0.292);color: rgb(215, 129, 0);padding: 0.1rem;padding-inline: 0.5rem;font-weight: 600;">Medium</span></td>
                  </tr>
                  <tr>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td><span style="background-color: rgba(64, 229, 78, 0.292);color: rgb(0, 147, 12);padding: 0.1rem;padding-inline: 0.5rem;font-weight: 600;">Low</span></td>
                  </tr>
                  <tr>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td><span style="background-color: rgba(229, 64, 64, 0.292);color: rgb(221, 0, 0);padding: 0.1rem;padding-inline: 0.5rem;font-weight: 600;">High</span></td>
                  </tr>
      
                  <tr>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td><span style="background-color: rgba(229, 160, 64, 0.292);color: rgb(215, 129, 0);padding: 0.1rem;padding-inline: 0.5rem;font-weight: 600;">Medium</span></td>
                  </tr>
                  <tr>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td><span style="background-color: rgba(64, 229, 78, 0.292);color: rgb(0, 147, 12);padding: 0.1rem;padding-inline: 0.5rem;font-weight: 600;">Low</span></td>
                  </tr>
                  <tr>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td><span style="background-color: rgba(229, 64, 64, 0.292);color: rgb(221, 0, 0);padding: 0.1rem;padding-inline: 0.5rem;font-weight: 600;">High</span></td>
                  </tr><tr>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td><span style="background-color: rgba(229, 64, 64, 0.292);color: rgb(221, 0, 0);padding: 0.1rem;padding-inline: 0.5rem;font-weight: 600;">High</span></td>
                  </tr>
 
                  <tr>
                     <td>-</td>
                     <td>-</td>
                     <td>-</td>
                     <td><span style="background-color: rgba(229, 64, 64, 0.292);color: rgb(221, 0, 0);padding: 0.1rem;padding-inline: 0.5rem;font-weight: 600;">High</span></td>
                 </tr><tr>
                     <td>-</td>
                     <td>-</td>
                     <td>-</td>
                     <td><span style="background-color: rgba(229, 64, 64, 0.292);color: rgb(221, 0, 0);padding: 0.1rem;padding-inline: 0.5rem;font-weight: 600;">High</span></td>
                 </tr><tr>
                     <td>-</td>
                     <td>-</td>
                     <td>-</td>
                     <td><span style="background-color: rgba(229, 64, 64, 0.292);color: rgb(221, 0, 0);padding: 0.1rem;padding-inline: 0.5rem;font-weight: 600;">High</span></td>
                 </tr><tr>
                     <td>-</td>
                     <td>-</td>
                     <td>-</td>
                     <td><span style="background-color: rgba(229, 64, 64, 0.292);color: rgb(221, 0, 0);padding: 0.1rem;padding-inline: 0.5rem;font-weight: 600;">High</span></td>
                 </tr><tr>
                     <td>-</td>
                     <td>-</td>
                     <td>-</td>
                     <td><span style="background-color: rgba(229, 64, 64, 0.292);color: rgb(221, 0, 0);padding: 0.1rem;padding-inline: 0.5rem;font-weight: 600;">High</span></td>
                 </tr><tr>
                     <td>-</td>
                     <td>-</td>
                     <td>-</td>
                     <td><span style="background-color: rgba(229, 64, 64, 0.292);color: rgb(221, 0, 0);padding: 0.1rem;padding-inline: 0.5rem;font-weight: 600;">High</span></td>
                 </tr>
                  
                 </tbody>
      
              </table>
            </div>
         </div>
         
</div>



<!-- Search input start -->
<div class="input-group rounded" style="width: 50%;margin: auto;margin-top: 3rem;">
  <input onkeyup="myFunction()" id="search-table-page2" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
  <span class="input-group-text border-0" id="search-addon">
    <i class="fas fa-search"></i>
  </span>
</div>
<!-- Search input end -->
<div class="container mt-5" style="overflow-x: auto;height: 30rem !important; width: 90% !important; padding: 0;border-style: solid;border-color: transparent;box-shadow: 0 1px 1px rgb(0 0 0 / 0.2);">
  
  <table class="table table-responsive datatable" id="table-page2">
    <thead>
      <tr>
        
       <th>PID</th>
        <th>age</th>
        <th>air&nbsp;pollution</th>
        <th>alcohol&nbsp;use</th>
        <th>dust&nbsp;Allergy</th>
        <th>Genetic&nbsp;Risk</th>
        <th>Balanced&nbsp;Diet</th>
        <th>Smoking</th>
        <th>Passive&nbsp;Smoker</th>
        <th>Coughing&nbsp;of&nbsp;Blood</th>
        <th>Fatigue</th>
        <th>Shortness&nbsp;of&nbsp;Breath</th>
        <th>Swallowing&nbsp;Difficulty</th>
        <th>Clubbing&nbsp;of&nbsp;Finger&nbsp;Nails</th>
        <th>Frequent&nbsp;Cold</th>
        <th>Dry&nbsp;Cough</th>
        <th>Snoring</th>
        <th>Level</th>
      </tr>
    </thead>
    <tbody id="selectdetectionsData">
      <!-- Rows with hardcoded values -->
    
      



     
      <!-- Repeat similar rows for the total number of rows (10 in this case) -->
      <!-- ... -->
    </tbody>
  </table>
</div>

                  

<footer style="background-color: transparent !important; width: 100%; " class="text-center text-lg-start bg-body-tertiary text-muted">


    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: transparent;">
      © 2024 Copyright:
      <a class="text-reset fw-bold" href="#">All rights reserved to the Developer</a>
    </div>
    <!-- Copyright -->
  </footer>

                </section>













                
            
            </div>
            
            
        </div>
        
    </div>










    












<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search-table-page2");
            filter = input.value.toUpperCase();
            table = document.getElementById("table-page2");

            tr = table.getElementsByTagName("tr");


            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[17];

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
      

<?php
        
$sqltableblood = "SELECT * FROM detections  WHERE position_flag = 1";
$resultTableblood = $conn2->query($sqltableblood);


 if ($resultTableblood) {
    // Fetch associative array
    $cartona = "";

    while ($rowTable = $resultTableblood->fetch_assoc()) {
        if($rowTable['result_Level'] === "High"){
            $cartcolor = 'style=\"background-color: rgba(229, 64, 64, 0.292);color: rgb(221, 0, 0);\"';
        }

        elseif($rowTable['result_Level'] === "Medium"){
            $cartcolor = 'style=\"background-color: rgba(229, 160, 64, 0.292); color: rgb(215, 129, 0);\"';
        }

        elseif($rowTable['result_Level'] === "Low"){
            $cartcolor = 'style=\"background-color: rgba(64, 229, 78, 0.292);color: rgb(0, 147, 12)\"';
        }
        $cartona .= "<tr><td>P" . $rowTable["det_id"] . "</td><td>" . $rowTable["Age"] . "</td><td>" . ($rowTable["Coughing_of_Blood"] == 0 ? '<span style="color:green;">Low or may Never</span>' : ($rowTable["Coughing_of_Blood"] == 1 ? '<span style="color:orange;">Medium</span>' : '<span style="color:darkred;">High</span>')) . "</td>
        <td><span ".$cartcolor.">" . $rowTable["result_Level"] . "</span></td></tr>";
    }

    // Escape newlines in the $cartona variable
    $cartona = str_replace(["\r", "\n"], ['', '\n'], $cartona);

    echo '<script>
        // alert("' . $cartcolor . '");
        document.getElementById("bloodTable").innerHTML = \'' . $cartona . '\';
    </script>';
}
?>


<script>




document.addEventListener('DOMContentLoaded', function () {
      <?php
        
$sqltable = "SELECT * FROM detections  WHERE position_flag = 1";
$resultTable = $conn->query($sqltable);


if ($resultTable) {

    // Fetch associative array
        
        
      echo "loadCharts([";
            while ($rowTable = $resultTable->fetch_assoc()) {


                if($rowTable['result_Level'] === "High"){
                    $coughbloodflag = 0;
                }
        
                elseif($rowTable['result_Level'] === "Medium"){
                    $coughbloodflag = 1;
                }
        
                elseif($rowTable['result_Level'] === "Low"){
                    $coughbloodflag = 2.5;
                }
                echo "{
                    x: ".$coughbloodflag.",
                    y: ".$rowTable['Coughing_of_Blood']."
                  },";
            }
            
        

echo"] ,'scatter',['ch1','ch2','ch3','ch4','ch5','ch6','ch4','ch5','ch6'],'Coughing of blood','scatter-page2','flagType'); ";  
        }?>
        
        
        
        
        
        
        
    //   loadCharts([10,20,30,40,50,60,70,22,55],'pie',['ch1','ch2','ch3','ch4','ch5','ch6','ch4','ch5','ch6'],'header pie','pie-page2');    
    //   loadCharts([10,20,30,40,50,60,70,22,55],'doughnut',['ch1','ch2','ch3','ch4','ch5','ch6','ch4','ch5','ch6'],'header doughnut','doughnut-page2');    
    //   loadCharts([10,20,30,40,50,60,70,22,55],'bar',['ch1','ch2','ch3','ch4','ch5','ch6','ch4','ch5','ch6'],'header bar','bar-page2');    
    //   loadCharts([10,20,30,40,50,60,70,22,55],'pie',['ch1','ch2','ch3','ch4','ch5','ch6','ch4','ch5','ch6'],'header pie2','pie2-page2');    
   });



</script>









<?php
        
$sqlupnav = "SELECT * FROM detections WHERE position_flag = 1";
$sqlupnavusers = "SELECT * FROM users";
$resultupnav = $conn2->query($sqlupnav);
$resultupnavusers = $conn2->query($sqlupnavusers);


if($resultupnavusers){
    $numberofUsers=0;
       while ($rowTable = $resultupnavusers->fetch_assoc()) {
       $numberofUsers= $numberofUsers + 1;
        
    }
}

 if ($resultupnav) {
   

    $numberofelementsHigh = 0;
    $numberofelementsMedium = 0;
    $numberofelementsLow = 0;
    
    
  
    
    
    
    while ($rowTable = $resultupnav->fetch_assoc()) {
        if($rowTable['result_Level'] === "High" ){
            $numberofelementsHigh= $numberofelementsHigh + 1;
        }

        elseif($rowTable['result_Level'] === "Medium" ){
            $numberofelementsMedium= $numberofelementsMedium + 1;

        }

        elseif($rowTable['result_Level'] === "Low" ){
            $numberofelementsLow= $numberofelementsLow + 1;
            
        }
        
    }

    // echo '<script>
    
    // document.getElementById("nav-up-data").innerHTML = ` <div class="info-value" > 
    // <h3>Users</h3>
    // <h3><i class="fa-solid fa-users"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="counter">     '.$numberofUsers.'</span></h3>
    // </div>
    // <div class="info-value" > 
    //     <h3>Detected</h3>
    //             <h3><i class="fa-solid fa-check"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="counter">     '.$numberofelementsHigh+$numberofelementsMedium+$numberofelementsLow.'</span></h3>
    // </div>
    // <div class="info-value" > 
    //     <h3>High</h3>
    //     <h3><i class="fa-solid fa-arrow-up"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="counter">     '.$numberofelementsHigh.'</span></h3>
    // </div>
    // <div class="info-value" > 
    //     <h3>Medium</h3>
    //     <h3><i class="fa-solid fa-arrow-turn-up"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="counter">     '.$numberofelementsMedium.'</span></h3>
    // </div>
    // <div class="info-value" > 
    //     <h3>Low</h3>
    //     <h3><i class="fa-solid fa-arrow-down"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="counter">     '.$numberofelementsLow.'</span></h3>
    // </div>`
    
    // </script>';
}
?>



<?php

echo '<script> document.getElementById("scatter-percentage").innerHTML=`<tr>
                              <td>
                                <h3><span >High</span> <span class="add-n2"> '. number_format((($numberofelementsHigh)/($numberofelementsHigh+$numberofelementsMedium+$numberofelementsLow))*100,1) .'%</span></h3>
                              </td>
                              
                              <td>
                                <h3><span >Medium</span> <span class="add-n2"> '. number_format((($numberofelementsMedium)/($numberofelementsHigh+$numberofelementsMedium+$numberofelementsLow))*100,1) .'% </span></h3>
                              </td>


                              <td>
                                <h3><span >Low</span> <span class="add-n2"> '. number_format((($numberofelementsLow)/($numberofelementsHigh+$numberofelementsMedium+$numberofelementsLow))*100,1) .'% </span></h3>
                              </td>

                            </tr>`
</script>';


?>




<?php 

$coughinglow=0;
$coughingmedium=0;
$coughinghigh=0;

// Specify the column you want to retrieve
$columnName = "Coughing_of_Blood";

// Query to fetch data from the specified column
$sql = "SELECT $columnName FROM detections WHERE position_flag = 1";
$result = $conn2->query($sql);

// Check if the query was successful
if ($result) {
    $dataArray = array();

    // Fetch associative array
    while ($row = $result->fetch_assoc()) {
        // Store the values in the array
        $dataArray[] = $row[$columnName];
        
        if($row['Coughing_of_Blood'] == 0){
            $coughinglow = $coughinglow + 1;
        }
        else if($row['Coughing_of_Blood'] == 1){
            $coughingmedium = $coughingmedium + 1;
        }
        else if($row['Coughing_of_Blood'] == 2 || $row['Coughing_of_Blood'] == 3){
            $coughinghigh = $coughinghigh + 1;
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
$typesofc[0]= 'Low';
$typesofc[1]= 'Medium';
$typesofc[2]= 'High';
// // Loop through each entry in $countArray and extract 'type' values
// foreach ($countArray as $entry) {
//     if (isset($entry['type'])) {
//         $typesofc[] = strval($entry['type']); // Convert to string if not already
//     }
// }

// Enclose each value in double quotes
$typesofcString = json_encode(array_map('strval', $typesofc));




    echo '<script>
    
    document.addEventListener("DOMContentLoaded", function () {
    loadCharts((['.$coughinglow.','.$coughingmedium.','.$coughinghigh.']),"pie",'.json_encode($typesofcString).',"header pie2","pie2-page2","php");    

    });
    
    
    </script>';



} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



// Close the database connection



?>




<?php 
$alcoholhigh = 0;
$alcoholmedium = 0;
$alcohollow = 0;


// Specify the column you want to retrieve
$columnName2 = "Alcohol_use";

// Query to fetch data from the specified column
$sql2 = "SELECT $columnName2 FROM detections WHERE position_flag = 1";
$result2 = $conn2->query($sql2);

// Check if the query was successful
if ($result2) {
    $dataArray2 = array();

    // Fetch associative array
    while ($row2 = $result2->fetch_assoc()) {
        // Store the values in the array
        $dataArray2[] = $row2[$columnName2];
        
        if($row2['Alcohol_use'] == 0){
            $alcohollow = $alcohollow + 1;
        }
        else if($row2['Alcohol_use'] == 1){
            $alcoholmedium = $alcoholmedium + 1;
        }
        
        else if($row2['Alcohol_use'] == 2 || $row2['Alcohol_use'] == 3){
            $alcoholhigh = $alcoholhigh + 1;
        }
    }

    // Count occurrences of each unique gender
    $genderCount2 = array_count_values($dataArray2);
    $countArray12 = array_values($genderCount2);
    // Create an array with gender types and their counts
    $countArray2 = array();
    foreach ($genderCount2 as $gender2 => $count2) {
        $countArray2[] = array('type' => $gender2, 'count' => $count2);
    }
    
    $typesofc2 = array();
$typesofc2[0]="Not drink";
$typesofc2[1]= "Some times";
$typesofc2[2]= "Drink a lot";
// Loop through each entry in $countArray and extract 'type' values
// foreach ($countArray2 as $entry2) {
//     if (isset($entry2['type'])) {
//         $typesofc2[] = strval($entry2['type']); // Convert to string if not already
//     }
// }

// Enclose each value in double quotes
$typesofcString2 = json_encode(array_map('strval', $typesofc2));




    echo '<script>
    
    document.addEventListener("DOMContentLoaded", function () {
    loadCharts((['.$alcohollow.','.$alcoholmedium.','.$alcoholhigh.']),"bar",'.json_encode($typesofcString2).',"Alcohol use","bar-page2","php");

    });
    
    
    </script>';



} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



// Close the database connection
$conn->close();



?>

<script src="js/jquery-3.7.1.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/bootstrapbundlemin.js"></script>
    <script src="js/select.js"></script>
    
    <script src="js/script.js"></script>
</body>
</html>