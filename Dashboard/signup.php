<?php

require_once 'connection.php';
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل جديد</title>

    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <style>
        body {
            /*background-image: url(images/Yellow\ Minimalistic\ Background.jpeg);*/
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            background-color: #7AB2B2 !important;
        }

        #side {
            background-color: rgba(255, 255, 255, 0.8); /* Light semi-transparent background */
            border-radius: 10px; /* Rounded corners */
            padding: 40px;
            width: 50%;
            margin: auto;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3); /* Box shadow for depth */
        }

        #side h1 {
            color: #333; /* Dark text color */
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px; /* Spacing below the heading */
        }

        #side img {
            display: block;
            margin: 0 auto;
            border-radius: 50%; /* Make the image round */
            border: 2px solid #fff; /* White border around the image */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3); /* Box shadow for depth */
        }

        label {
            color: #555; /* Medium dark text color */
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="date"],
        select {
            border: 1px solid #ccc; /* Light gray border */
            border-radius: 5px; /* Rounded corners */
            padding: 10px; /* Spacing inside input fields */
            margin-bottom: 20px; /* Spacing below input fields */
            width: 100%;
            box-sizing: border-box; /* Include padding and border in width */
        }

        select {
            background-color: #f9f9f9; /* Light gray background for select dropdown */
        }

        .btn-dark {
            background-color: #333; /* Dark background color for buttons */
            border: none;
            border-radius: 5px; /* Rounded corners */
            color: #fff; /* White text color */
            padding: 12px 20px; /* Padding inside buttons */
            cursor: pointer;
            width: 100%;
        }

        .btn-dark:hover {
            background-color: #555; /* Darken button on hover */
        }

        @media only screen and (max-width: 600px) {
            #side {
                width: 100%; /* Make the form full width on small screens */
            }
        }
    </style>

</head>

<body>

    <section style="display: flex; justify-content: center; margin-top: 5rem; padding: 0 10px;">

        <div id="side">
            <!--<div style="text-align:center;margin-bottom:1rem;"><img-->
            <!--        src="images/WhatsApp Image 2024-03-05 at 12.42.15 AM.jpeg"-->
            <!--        style="margin:0;background-color:white;border-radius:50%;padding:0.2rem;"-->
            <!--        alt="Description of the image" width="80" height="80"></div>-->

            <h1>Signup</h1>

            <form action="signUpProcess.php" method="post" enctype="multipart/form-data" class="row g-3">

                


                <div class="col-md-12">
                    <label for="signupuname" class="form-label">Username</label>
                    <input type="text" class="form-control" id="signupuname" name="signupuname" required>
                </div>

                <div class="col-md-12">
                    <label for="signupmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="signupmail" name="signupmail" required>
                </div>

                <div class="col-md-12">
                    <label for="signuppassword" class="form-label">Password</label>
                    <div style="display: flex;flex-direction: row;">
                        <input type="password" class="form-control" id="password-field" name="signuppassword" required
                            >
                     

                    </div>
                </div>
               
                
                
                

                <div class="col-12">
                    <div style="margin: auto;display: flex;justify-content: center;">
                        <button type="submit" class="btn btn-dark" id="signupbutton" name="signupbutton">Signup</button>
                    </div>
                </div>
            </form>
        </div>

    </section>
    
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="js/script.js"></script>

    
    
    
</body>

</html>
