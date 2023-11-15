<?php
session_start();
define('TITLE', 'Login');

global $showAlert;
$showAlert = false;
include('include/dbcon.php');

//  START To check User logged in or not and redirect to correct page


if (isset($_SESSION['s_name'])) { 
    header('location: dash.php');
  } else {
      
  }

//   END To check User logged in or not and redirect to correct page


if (isset($_POST['login'])) {
  $aEmail = mysqli_real_escape_string($conn, $_POST['username']);
  $aPassword = mysqli_real_escape_string($conn, $_POST['password']);

  $sql = "SELECT * FROM `student` WHERE `username`  = '$aEmail' AND `password` = '$aPassword'";
  $run = mysqli_query($conn, $sql);

  $row = mysqli_num_rows($run);

  if ($row < 1) {

    // display model for valid information
    ?>
    <script>
      alert("Username or Password is wrong");
    </script>


<?php

  } else {

    $data = mysqli_fetch_assoc($run);
    session_start();
    $_SESSION['s_name'] = $data['fname']." ".$data['lname'];

    $_SESSION['s_id'] = $data['student_id'];
    $_SESSION['semester'] = $data['semester'];; 
    $_SESSION['year'] = $data['year'];




    header("Location: dash.php");
  }
}
?>

<!-- HTML CODE -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE; ?></title>
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .log-form label {
            font-weight: bold;

        }
    </style>

</head>

<body>

    <!-- container -->
    <div class="container text-dark"">

        <div class=" text-center p-3 " style=" font-size: 50px;">Student LOGIN</div>

    <form class="log-form" method="POST"  oninput="completeRegi();">

        <!-- Names -->
        <div class="form-row">

            <div class="form-group col-md-4">

            </div>
            <div class="form-group col-md-4">
                <label for="username">Username/Email :</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="form-group col-md-4">

            </div>
        </div>


        <div class="form-row">

            <!-- Password -->
            <div class="form-group col-md-4">

            </div>
            <div class="form-group col-md-4">
                <label for="password">Password :</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                    required ">
             </div>

                <!-- Confirm Password -->
                <div class=" form-group col-md-4">
                
            </div>
            <small class="form-text col-md-12 text-center">We'll never share your email with anyone else.</small>
           
        </div>


        <!-- button Signup -->
        <div class=" text-center p-2">
            <button type="submit" name="login" id="login" class="btn btn-primary" disabled>Login</button>
        </div>
    </form>
    <div class="text-center p-3">
         Don't have an account yet? <br><a class="btn btn-default mt-3 shadow-sm font-weight-bold" href="signup.php">Sign Up</a>
        </div>
    </div>

    

   <!-- Jquery JS -->
   <script src="js/jquery.min.js"></script>

   <!-- Bootstrap JS -->
   <script src="js/bootstrap.min.js"></script>
    

   <script>



// function checking all fields are filled or not
var completeRegi =  function () {
if( 
    $('#username').val() &&
    $('#password').val()
    
    != ''){
    $('#login').prop('disabled',false);
}
else
{
    $('#login').prop('disabled',true);
}

}

   </script>
</body>
</html>