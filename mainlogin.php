<?php

$host="localhost";
$user="root";
$pass="";
$db="maindb";

$conn1= mysqli_connect($host, $user, $pass, $db);

if(isset($_POST['submit']))
{
    $username=$_POST["email"];
    $password=$_POST["password"];

    $query = "SELECT * FROM `faculty` WHERE `username` = '$username'  AND `password` =  '$password'";

    $result=mysqli_query($conn1, $query);
   
    
    if(mysqli_num_rows($result) < 1)
    {
        echo "<script> alert('Wrong Password')</script>";
           
        
    }
    else{
       
        
        session_start();
        $row = mysqli_fetch_assoc($result);

        $_SESSION["mainlogin"] = true;
        $_SESSION['id'] = $row["fid"];
        $_SESSION['name'] = $row['fname']." ".$row['lname'];
        header("Location:admindashboard.php");
    }
}   

?>

<!doctype html>
<html lang="en">
  <head>
 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Login</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            background-color:rgb(219,226,226);
        }
        .row{
        
            background: white;
            border-radius: 30px;
            box-shadow: 12px 15px 25px;
        }
        img{
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
           
        }
        .btn1{
            border: none;
            outline: none;
            height: 50px;
            width: 100%;
            background-color: black;
            color: white;
            border-radius: 4px;
            font-weight: bold;

        }
        .btn1:hover{
            background: white;
            color: black;
            border: 1px solid;
        
        }
    </style>
  </head>
  <body>
   
    <section class="form my-4 mx-5">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-5">
                    <img src="./logo.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-7 px-5 pt-5">
                    <h1 class="font-weight-bold py-3">Login</h1>
                    <h4>Sign into your account!</h4>
                    <form action="" method="post">
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="text" placeholder="Enter Username" class="form-control my-3 p-4" name="email" required="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="password" placeholder="Enter Password" class="form-control my-3 p-4" name="password" required="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <button type="submit" class="btn1 mt-2" name="submit">Login</button>
                            </div>
                        </div>
                        <!-- <a href="#">Forgot Password</a> -->
                        <p>Don't have an account? <a href="registerstu.php">Resigter here</a></p>
                        </form>
                </div>
            </div>
        </div>

    </section>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>