<?php
define('TITLE', 'Registration');

global $showAlert;
$showAlert = false;
include('include/dbcon.php');

if(isset($_POST['signup']))
{
    $FName = ucwords($_POST['FName']);
    $MName = ucwords($_POST['MName']);
    $SName = ucwords($_POST['SName']);
    $username = $_POST['username'];
    $addresss = $_POST['address'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $prn = $_POST['prn'];
    $year = $_POST['year'];
    $semester = $_POST['semester'];
    $pass = $_POST['password'];

    $sql = 'INSERT INTO `student`(`prn_no`, `fname`, `mname`, `sname`, `username`, `password`, `year`, `semester`, `ph_no`, `address`, `dob`, `gender`) VALUES ("'.$prn.'" , "'.$FName.'","'.$MName.'","'.$SName.'","'.$username.'","'.$pass.'","'.$year.'","'.$semester.'","'.$phone.'","'.$addresss.'","'.$dob.'","'.$gender.'")';

    if(mysqli_query($conn, $sql)){
        $showAlert = true;
    }
    else{
        echo "ERROR:".$sql."<br>".$conn->error;
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
.reg-form label{
    font-weight: bold;
    
}
</style>

</head>
<body>

<section> 
<!-- container 1 -->    

    <div class="container-fluid">
        <div class="row">    <!-- ROW -->
                <div class="col-md-3 text-center" style="margin-top: 30px;margin-bottom: 55px;">                 <!-- first col -->
                    <a class="text-primary">Already have an Account !!!</a>  <br><br>
                    <a href="index.php"  class="btn btn-info" role="button">Login</a>

                </div>

                <div class="col-md-6">                 <!-- Sec col -->

                <div class="text-center p-3 " style="font-size: 50px;" >Student Registration Form</div>
                    <?php if($showAlert){ echo ' 
                                                        <div class="pt-4">
                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                <strong>Registration Successful! Now You can Login</strong>
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                        </div>
                ';}    
                ?>
                </div>

            <div class="col-md-3"></div>         <!-- Third col -->

        </div>      <!-- ROW END -->

    </div>

</section>

<section> 
<!-- container 2 -->

    <div class="container text-dark"">
   
        
        
        <form class="reg-form" method="POST" oninput="completeRegi()" >
            
            <!-- Names -->
            <div class="form-row">
                
                <div class="form-group col-md-4">
                <label for="FName">First Name :</label>
                <input type="text" class="form-control" id="FName" name="FName" placeholder="First Name" required>
                </div>
                <div class="form-group col-md-4">
                <label for="MName">Middle Name :</label>
                <input type="text" class="form-control" id="MName" name="MName" placeholder="Middle Name" required>
                </div>
                <div class="form-group col-md-4">
                <label for="SName">Surname :</label>
                <input type="text" class="form-control" id="SName" name="SName" placeholder="Surname" required>
                </div>
            </div>


            <!-- email -->
            <div class="form-group"> 
                <label for="email">Email Address/Username :</label>
                <input type="text" class="form-control " id="username" name="username" placeholder="pqr@gmail.com" required >
            </div>
                <!-- Address -->
            <div class="form-group">
                <label for="address">Address :</label>
                <input type="text" class="form-control " name="address" id="address" placeholder="Apartment, studio, or floor" required >
            </div>
        
            <div class="form-row">
            <!-- Phone Number -->
                <div class="form-group col-md-4">
                    <label for="tel">Phone Number :</label>
                    <input type="text" class="form-control" id="phone" name="phone"  placeholder="e.g. 0123456789"
                    required pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$">
                </div>

                <!-- Gender -->
                <div class="form-group col-md-4">
                    <label for="gender">Gender :</label>
                        <select id="gender" name="gender" class="form-control" >
                            <option disabled selected>Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                </div>

                <!-- Date of Birth -->
                <div class="form-group col-md-4">
                    <label for="dob">Date of Birth :</label>
                    <input type="date" class="form-control" id="dob" name="dob">
                </div> 
            </div>

            <div class="form-row">
            <!-- PRN -->
                <div class="form-group col-md-4">
                    <label for="prn">PRN :</label>
                    <input type="text" class="form-control" id="prn" name="prn"  placeholder="e.g. 202074824" required>
                </div>
                <div class="form-group col-md-4">
                                <label for="inputYear">Year:</label>
                                <select  class="form-control" name="year" id="year" required>
                                    <option value="">Select Year</option>
                                    <option value="First">First Year</option>
                                    <option value="Second">Second Year</option>
                                    <option value="Third">Third Year</option>
                                    <option value="Fourth">Fourth Year</option>
                                </select>
                        </div>

                        <div class="form-group col-md-4">
                                <label for="inputSemester">Semester:</label>
                                <select class="form-control" name="semester" id="semester" required>
                                        <option value="">Select Semester</option>
                                        <option value="First">SEM 1</option>
                                        <option value="Second">SEM 2</option>
                                        <option value="Third">SEM 3</option>
                                        <option value="Fourth">SEM 4</option>
                                        <option value="Fifth">SEM 5</option>
                                        <option value="Sixth">SEM 6</option>
                                        <option value="Seventh">SEM 7</option>
                                        <option value="Eighth">SEM 8</option>
                                </select>
                        </div>
               
            </div>

            <div class="text-dark">
            <small>Password Should 8 to 15 characters contain at least (1 lowercase,1          uppercase, 1 numeric,1 special character)</small>
            </div>

            <div class="form-row">

            <!-- Password -->
                <div class="form-group col-md-5">
                    <label for="password">Password :</label>
                    <input type="password" class="form-control" id="password" name="password"  placeholder="e.g. Abc@1234" required  onkeyup="check();" ">
                </div>

                <!-- Confirm Password -->
                <div class="form-group col-md-5">
                    <label for="password">Confirm Password :</label>
                    <input type="password" class="form-control" id="cpassword" name="cpassword"  placeholder="Confirm Password" onkeyup="check();">
                </div> 
                
                <!-- matching message -->
                <div class="form-group text-center col-md-2 pt-4 pl-5 ">
                    <label id="message" style="font-size: 20px; "></label>
                </div> 
            </div>

            <div>
                <small class="text-danger ml-3">All fileds are mandatory</small>
            </div>

            <!-- button Signup -->
            <div class=" text-center">
                <button type="submit" name="signup" id="signup" class="btn btn-primary" disabled>Sign up</button>
            </div>
            </form>     
    </div>

</section>


   <!-- Jquery JS -->
   <script src="js/jquery.min.js"></script>

   <!-- Bootstrap JS -->
   <script src="js/bootstrap.min.js"></script>
    

   <script>


// confirm password function
    var check = function() {
  if (document.getElementById('password').value !=
    document.getElementById('cpassword').value && 
    document.getElementById('cpassword').value !=
    document.getElementById('password').value ) {
    
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Not Matching'; 
  }
  else {
    document.getElementById('message').style.color = 'green'; 
    document.getElementById('message').innerHTML = 'Matching';
    }
 }


// function checking all fields are filled or not
var completeRegi =  function () {
if( 
    $('#FName').val() &&
    $('#MName').val()&&
    $('#SName').val() &&
    $('#username').val() &&
    $('#phone').val() &&
    $('#gender').val() &&
    $('#dob').val() &&
    $('#address').val() &&
    $('#prn').val() &&
    $('#year').val() &&
    $('#semester').val() &&
    $('#password').val() &&
    $('#cpassword').val()
    != ''){
    $('#signup').prop('disabled',false);
}
else
{
    $('#signup').prop('disabled',true);
}

}

   </script>
</body>
</html>