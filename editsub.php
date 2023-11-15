<?php
session_start();
include('dbconnection.php');
define('TITLE', 'Subject');
define('PAGE', 'subject');
include('header.php');

include('navbar_admin.php');


if(isset($_REQUEST['edit_sub_btn']))
{
    if(($_REQUEST['subject_name']=="") || ($_REQUEST['semester']=="") || ($_REQUEST['year']=="") || ($_REQUEST['faculty_name']==""))
    {
        // echo'Fill all details';
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill all details</div>';

    }
    else{

        $sub_id=$_REQUEST['subject_id'];
        $sub_name=$_REQUEST['subject_name'];
        $sem=$_REQUEST['semester'];
        $year=$_REQUEST['year'];
        $fac_name=$_REQUEST['faculty_name'];

        $sql= "UPDATE subjects SET  subject_name = '$sub_name', semester = '$sem', year='$year', faculty = '$fac_name'  
         WHERE subject_id = '$sub_id'";

         if($con->query($sql) == TRUE){
            $msg='
                <div class="pt-4 col-md-4" style="margin-left:355px;">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Update Successfully</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
            ';

         }
         else{
            $msg='<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to update</div>';
         }

    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE ?></title>
</head>
<body>


<div class="col-sm-9 col-md-10">
    <div class="row mx-5 justify-content-center ">

        <div class="col-md-12 mt-5">
        <h3 class="text-center">Update Subject details</h3>
        <?php if(isset($msg)) {echo $msg;} ?>
        </div>
        <?php

if(isset($_REQUEST['view'])){
    $sql= "SELECT * FROM subjects WHERE subject_id = {$_REQUEST['id']}";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
}
?>
    
    <div  class="col-md-6 sub_form " >
        <form action="" method="post"  >
                        <div class="form-group ">
                            <label for="subject_name">Subject ID</label>
                            <input type="text" class="form-control" id="subject_id" name="subject_id"  value="<?php if(isset($row['subject_id']))
            { echo $row['subject_id']; }?>" readonly>
                        </div>

                        <div class="form-group ">
                            <label for="subject_name">Subject Name</label>
                            <input type="text" class="form-control" id="subject_name" name="subject_name"  value="<?php if(isset($row['subject_name']))
            { echo $row['subject_name']; }?>" required>
                        </div>

                        <div class="form-group ">
                            
                                <label for="inputYear">Year:</label>
                                <select  class="form-control" name="year" id="year" required>
                                    <option value=""></option>
                                    <option value="">Select Year</option>

                                    <option <?php if($row['year'] == 'First')
            {echo 'Selected'; } ?> value="First">First Year</option>

                                    <option  <?php if($row['year'] == 'Second')
            {echo 'Selected'; } ?> value="Second">Second Year</option>

                                    <option <?php if($row['year'] == 'Third')
            {echo 'Selected'; } ?> value="Third">Third Year</option>
                                    
                                    <option <?php if($row['year'] == 'Fourth')
            {echo 'Selected'; } ?> value="Fourth">Fourth Year</option>

                                </select>
                        </div>

                        <div class="form-group ">
                                <label for="inputSemester">Semester:</label>
                                <select class="form-control" name="semester" id="semester" required>
                                        
                                        <option value="">Select Semester</option>

                                        <option  <?php if($row['semester'] == 'First')
            {echo 'Selected'; } ?> value="First">SEM 1</option>

                                        <option  <?php if($row['semester'] == 'Second')
            {echo 'Selected'; } ?> value="Second">SEM 2</option>
                                        
                                        <option  <?php if($row['semester'] == 'Third')
            {echo 'Selected'; } ?> value="Third">SEM 3</option>
                                        
                                        <option  <?php if($row['semester'] == 'Fourth')
            {echo 'Selected'; } ?> value="Fourth">SEM 4</option>
                                        
                                        <option  <?php if($row['semester'] == 'Fifth')
            {echo 'Selected'; } ?> value="Fifth">SEM 5</option>
                                        
                                        <option  <?php if($row['semester'] == 'Sixth')
            {echo 'Selected'; } ?> value="Sixth">SEM 6</option>
                                        
                                        <option  <?php if($row['semester'] == 'Seventh')
            {echo 'Selected'; } ?> value="Seventh">SEM 7</option>
                                        
                                        <option  <?php if($row['semester'] == 'Eighth')
            {echo 'Selected'; } ?> value="Eighth">SEM 8</option>
                                </select>
                        </div>

                       
                       
                        <div class="form-group ">
                            <label for="faculty_name">Faculty Name</label>
                            <input type="text" class="form-control" id="faculty_name" name="faculty_name" value="<?php echo $_SESSION['name'] ?>" readonly><br>
                            <div class="text-ceneter">
                                <button type="submit" class="btn btn-danger" id="edit_sub_btn"
                                    name="edit_sub_btn">Submit</button>
                                <a href="subject.php" class="btn btn-secondary">Close</a>

                            </div>
                           
                    </form>

        </div>
        

    </div>
</div>
    
</body>
</html>