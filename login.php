<?php
include("register.php");
    $host="localhost";
    $user="root";
    $pass="";
    $db="adminlogin";

   $conn= mysqli_connect($host, $user, $pass, $db);
   
   session_start();
   //Student Login
   if(isset($_POST['save']))
   {
       extract($_POST);
       $sql=mysqli_query($conn,"SELECT * FROM student_login_table where emailid='$username' and passkey='$pass'");
       $row  = mysqli_fetch_array($sql);
       
       if(is_array($row))
       {
           $_SESSION["id"] = $row['id'];
           $_SESSION["fname"]=$row['fname'];
           $_SESSION["lame"]=$row['lname']; 
           $_SESSION["emailid"]=$row['emailid'];
           header("Location: student.php"); 
       }
       //Admin Login
       elseif(isset($_POST['save']))
       {
           extract($_POST);
           $sql=mysqli_query($conn,"SELECT * FROM admin_login_table where email='$username' and password='$pass'");
           $row  = mysqli_fetch_array($sql);
           
           if(is_array($row))
           {
               $_SESSION["id"] = $row['id'];
               $_SESSION["email"]=$row['email'];
               header("Location: admindashboard.php"); 
           }
           else
           {
               echo "Invalid Email ID/Password";
           }
        }
        else
        {
            echo "Invalid Details";
        }
    }
    
?>
<!DOCTYPE html>

    <html>
    <head>    
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    </head>
<body>
    <div class="full-page">
        
        <div id="login-form" class="login-page" style="display: block;">
            <div class="form-box">
                <div class="button-box">
                    <div id="btn" style="left: 0px;"></div>
                    <button type="button" onclick="login()" class="toggle-btn">Log In</button>
                    <button type="button" onclick="register()" class="toggle-btn">Register</button>
                </div>
            <form action="#" method="post" id="login" class="input-group-login" style="left: 50px;">
                <input type="text" name="username"class="input-field" placeholder="Email Id" required="">
		        <input type="password"  name="pass" class="input-field" placeholder="Enter Password" required="">
		        <button type="submit" name="save" class="submit-btn">Log in</button>
		    </form>
		    <form action="register.php" method="post" id="register" class="input-group-register" style="left: 450px;">
                <input type="text" name="fname" class="input-field" placeholder="First Name" required="">
                <input type="text" name="lname" class="input-field" placeholder="Last Name " required="">
                <input type="email" name="emailid" class="input-field" placeholder="Email Id" required="">
                <input type="password"name="passphrase" class="input-field" placeholder="Enter Password" required="">
                <input type="password" name="cpass"class="input-field" placeholder="Confirm Password">
                <input type="checkbox" class="check-box"><span>I agree to the terms and conditions</span>
                <button type="submit" name="submit" class="submit-btn">Register</button>
	         </form>
            </div>
        </div>
    </div>
    <script>
        var x=document.getElementById('login');
		var y=document.getElementById('register');
		var z=document.getElementById('btn');
		function register()
		{
			x.style.left='-400px';
			y.style.left='50px';
			z.style.left='110px';
		}
		function login()
		{
			x.style.left='50px';
			y.style.left='450px';
			z.style.left='0px';
		}
	</script>
	<script>
        var modal = document.getElementById('login-form');
        window.onclick = function(event) 
        {
            if (event.target == modal) 
            {
                modal.style.display = "none";
            }
        }
    </script>

</body>
</html>