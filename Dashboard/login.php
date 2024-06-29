

<?php

// Database 1
$host1 = '127.0.0.1';
$dbname1 = 'u811827511_lungcancer';
$username1 = 'u811827511_users';
$password1 = '49]x4>xA';

// Database 2
$host2 = '127.0.0.1';
$dbname2 = 'u811827511_appusers';
$username2 = 'u811827511_user';
$password2 = '@1Am8wwIt';

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

session_start();


//

// Function to sanitize input data
function sanitize($input) {
    return htmlspecialchars(trim($input));
}




// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//   Sanitize input data
  $usermail = sanitize($_POST['signupname']);
  $password = $_POST['signuppassword'];

  // Prepare SQL statement
  $stmt = $conn1->prepare("SELECT * FROM dashboard_auth WHERE u_email = '$usermail'");
  $stmt->execute();
  $user = $stmt->fetch();

  // Verify user exists and password is correct
  if ($user && $user['u_password'] == $password) {
      // Password is correct, set session variables
      $_SESSION['user_id'] = $user['u_id'];
      $_SESSION['user_mail'] = $user['u_email'];
      $_SESSION['username'] = $user['u_name'];
      $_SESSION['authlog']=true;

      
      // Redirect to dashboard
      header("Location: index.php");
      exit();
  } else {
      // Invalid username or password
      echo "<script>
      alert('Wrong email or password');
    </script>";
  }
}



 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
  />

<style>
    body{
        background-position: center;

background-size: cover;
background-repeat: no-repeat;

background-color:#7AB2B2 !important;
}

    label{
        color: white;
    }


    #side{
      background-color: rgba(109, 109, 109, 0.498);border-radius: 0.5rem; margin: auto;padding: 4rem;width: 50%;
    }



    @media only screen and (max-width: 600px) {
            #side{
              width: 150%;
            }
        }
        
        input{
            height:3rem;
            border-radius:1.2rem !important;
        }
</style>

</head>

<body>


    <section style="display: flex;gap: 1rem; justify-content: center;margin-top: 7rem;padding: 0.5rem;">
    
        


        <div id="side" class="side" >
          
          <?php if (isset($error)) : ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
        <h1 style="text-align: center; color: whitesmoke; font-weight: 600;">Login</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="row g-3" style="justify-content: center;margin-top: 3rem;">
                <div class="col-md-8">
                    <label for="signupname" class="form-label">Email</label>
                    <input type="email" class="form-control" id="signupname" name="signupname" required>
                  </div>

                  
                <div class="col-md-8">
                  <label for="signuppassword" class="form-label">Password</label>
                  <div style="display: flex;flex-direction: row;">
                    <input type="password" class="form-control"  id="password-field" name="signuppassword" required>

                  </div>
                </div>

                
                <!-- <div class="col-md-8">
                    <p style="color: red;" id="pass-vali">jkjk</p>
                  </div> -->
 

                  
                
               
                <div class="col-12" style="margin-top:2rem;">
                  <div style="margin: auto;display: flex;justify-content: center;">
                    <button type="submit" style="width:8rem;" class="btn btn-dark" id="signupbutton" name="signupbutton">Login</button>
                  </div>
                  </div>
                  
                  
              </form>
        </div>
    
    </section>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="js/script.js"></script>
     <script>
window.onload = function() {
  history.pushState({}, null, ''); // Clear history stack
  window.addEventListener('popstate', function() {
    window.location.href = 'login.php'; // Redirect to login on back button
  });
};
</script> 
</body>
</html>
