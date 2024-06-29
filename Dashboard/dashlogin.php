
<?php

 session_start();
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons.css">

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
  />
    <link rel="icon" type="image/png" href="images/logorusukh.png">

<style>
    body{
        background-image: linear-gradient(to right, rgb(2, 80, 102), rgb(236, 236, 236));
    }

    label{
        color: white;
    }

    #side{
      background-color: transparent;border-radius: 0.5rem; margin: auto;padding: 4rem;width: 50%;
    }


    #pass-vali{
      color: transparent;text-align: center;font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }


    @media only screen and (max-width: 600px) {
            #side{
              width: 150%;
            }
        }
        
        
        
        
   
</style>

</head>

<body>




    <section style="display: flex;gap: 1rem; justify-content: center;margin-top: 5rem;padding: 0.5rem;">
    
        


        <div id="side" class="side">
            <div style="text-align:center;margin-bottom:1rem;"><img src="" style="margin:0;background-color:transparent;border-radius:50%;padding:0.2rem;" alt="#image space" width="80" height="80"></div>

        <h1 style="text-align: center; color: whitesmoke; font-weight: 600;">Sign in</h1>
            <form method="post" class="row g-3" style="justify-content: center;">
                  
           
            <div class="col-md-9">
                  <label for="signupemail" class="form-label">Username</label>
                  <input type="text" class="form-control" id="signupemail" name="loginuser" placeholder="Enter your username" required>
                </div>
           
           
           
           
            <div class="col-md-9">
                  <label for="signuppassword" class="form-label">Password</label>
                  <input type="password" class="form-control" id="signuppassword" name="loginpassword" placeholder="Password" required>
                </div>
               
           
<div class="col-md-4">
                  <a href="" class="link-warning">I don't have account</a>
                </div>
                
                
                <div class="col-md-4">
                  <button style="float: right;" type="submit" class="btn btn-dark" id="loginbutton" name="signinbutton">login</button>
                </div>


                
                <div class="col-md-8">
                    <p  id="pass-vali">Wrong Email or password</p>
                  </div>
                

              </form>
        </div>
    
    </section>
    


</body>
</html>











<?php

error_reporting(0);
if (isset($_POST['signinbutton'])) {

$loginuser = $_POST['loginuser'];
$loginpassword = $_POST['loginpassword'];



// Check if the id and password are valid
$sql = "SELECT * FROM dashboard_auth WHERE u_name='$loginuser' AND u_password='$loginpassword' AND u_activation='1' OR u_activation='2'";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
  
  $row = mysqli_fetch_assoc($result);


  $uid = $row["u_id"];
  $uname = $row["u_name"];
  $utype = $row["u_activation"];


 
  // $_SESSION['uid'] = $uid;
  // $_SESSION['uname'] = $uname;
  // $_SESSION['utype'] = $utype;
  // $_SESSION['authlog']=true;
  header("Location: index.php");
    exit;

    
}
else{
  echo '<script>
  document.getElementById("pass-vali").style.color="red";

</script>';
}
}


?>