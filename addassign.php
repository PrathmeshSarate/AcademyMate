<?php

include('../pro/dbconnection.php');
session_start();
if(isset($_REQUEST['assignsubmitbtn']))
{
    // if(($_REQUEST['subject_id']=="") || ($_REQUEST['subject_name']=="") || ($_REQUEST['semester']=="") || ($_REQUEST['year']=="") || ($_REQUEST['files']==""))
    // {
    //     // echo'Fill all details';
    //     $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill all details</div>';

    // }
   // else{
        $subject_name=$_REQUEST['subject_name'];
        $semester=$_REQUEST['semester'];
        $year=$_REQUEST['year'];
        $subject_id=$_REQUEST['subject_id'];
        
        $files=$_FILES['files']['name'];
        $files_link_temp=$_FILES['files']['tmp_name'];
        $link_folder='C:\xampp\htdocs\pro\assignfolder\upload'.$files;
        move_uploaded_file($files_link_temp, $link_folder);

        $sql="INSERT INTO assignment(subject_name,semester,year,subject_id,files) values('$subject_name','$semester','$year','$subject_id','$link_folder')";

        if($con->query($sql) == TRUE)
        {
            echo'Data fill sucessfully';
        }
        else{
            echo'Please enter again';
        }

   // }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="dashboard.css">
<link rel="stylesheet" href="assign.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;1,100;1,200&display=swap">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat">
<body img src="img.jpg" height="693px" width="100%">
<div class="header">
	<span class="ml-3 text-xl">Smart-Learn</span>
</div>
<div class="wrapper">
    <div class="sidebar">	  
        <h2>Admin</h2>
        <ul>
            <li><a href="admindashboard.php"><i class="home"></i>Home</a></li>
            <li><a href="subject.php"><i class="subject"></i>Subject</a></li>
            <li><a href="assignments.php"><i class="assign"></i>Assignments</a></li>
            <li><a href="experiments.php"><i class="exp"></i>Experiments</a></li>
            <li><a href="manage.html"><i class="manage"></i>Manage</a></li>
            <li><a href="view.html"><i class="view"></i>View</a></li> 
            <li><a href="#"><i class="logout"></i>Logout</a></li>           
        </ul> 
    </div>

<div class="main_content">
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <b><h3 class="text-center"> Add Assignments</h3>
    <form action=""method="post" enctype="multipart/form-data">
        <div>
            <label for="subject_id">subject_id</label>
            <input type="text" class="form-control" id="subject_id" name="subject_id"
            value="<?php if(isset($_SESSION['subject_id'])) {echo $_SESSION['subject_id'];} ?>" readonly>
            
        </div>
        <div>
            <label for="subject_name">subject_name</label>
            <input type="text" class="form-control" id="subject_name" name="subject_name"
            value="<?php if(isset($_SESSION['subject_name'])) {echo $_SESSION['subject_name'];} ?>" readonly>
            
        </div>
        <div>
            <label for="semester">semester</label>
            <input type="text" class="form-control" id="semester" name="semester">
        </div>
        <div>
            <label for="year">year</label>
            <input type="text" class="form-control" id="year" name="year">
        </div>
        <!-- class="form-group" -->
        <div>
            <label for="files">Upload files</label>
            <input type="file" class="form-control-file" id="files" name="files" accept=".pdf, .png, .docx">
        </div>

        <div class="text-ceneter">
        <button type="submit" class="btn btn-danger" id="assignsubmitbtn" name="assignsubmitbtn">Submit</button>
        <a href="assignments.php" class="btn btn-secondary">Close</a>

        </div>
</div>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
        </div>
</div>

</div>
</body>
</html>