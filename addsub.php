<?php
session_start();
include('dbconnection.php');
define('TITLE', 'Subject');
define('PAGE', 'subject');
include('header.php');
include('navbar_admin.php');

if(isset($_REQUEST['subsubmitbtn']))
{
    if(($_REQUEST['subject_name']=="") || ($_REQUEST['semester']=="") || ($_REQUEST['year']=="") || ($_REQUEST['faculty_name']=="") || ($_REQUEST['subject_id']==""))
    {
        // echo'Fill all details';
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill all details</div>';

    }
    else{
        $subject_id = $_REQUEST['subject_id'];
        $subject_name=$_REQUEST['subject_name'];
        $semester=$_REQUEST['semester'];
        $year=$_REQUEST['year'];
        $faculty_name=$_REQUEST['faculty_name'];

        $sql="INSERT INTO `subjects`(`subject_id`, `subject_name`, `semester`, `year`, `faculty`)values('$subject_id','$subject_name','$semester','$year','$faculty_name')";

        if($con->query($sql) == TRUE)
        {
            $msg='<div class="pt-4 col-md-4" style="margin-left:355px;">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data submitted Sucessfully</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>';
        }
        else{
            $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Please enter again</div>';
        }

    }
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE ?></title>
    <!-- <style>
        .sub_form div{
            padding: 10px;
        }
    </style> -->
</head>
<body>



<div class="col-sm-9 col-md-10">
    <div class="row mx-5 justify-content-center ">

        <div class="col-md-12 mt-5">
        <h3 class="text-center"> Add New Subject</h3>
        <?php if(isset($msg)) {echo $msg;} ?>
        </div>
        
        <form action="" method="post" class="col-md-6 sub_form "  >
                        <div class="form-group ">
                            <label for="subject_name">Subject ID</label>
                            <input type="text" class="form-control" id="subject_id" name="subject_id" required>
                        </div>

                        <div class="form-group ">
                            <label for="subject_name">Subject Name</label>
                            <input type="text" class="form-control" id="subject_name" name="subject_name" required>
                        </div>

                        <div class="form-group ">
                                <label for="inputYear">Year:</label>
                                <select  class="form-control" name="year" id="year" required>
                                    <option value="">Select Year</option>
                                    <option value="First">First Year</option>
                                    <option value="Second">Second Year</option>
                                    <option value="Third">Third Year</option>
                                    <option value="Fourth">Fourth Year</option>
                                </select>
                        </div>

                        <div class="form-group ">
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

                       
                       
                        <div class="form-group ">
                            <label for="faculty_name">Faculty Name</label>
                            <input type="text" class="form-control" id="faculty_name" name="faculty_name" value="<?php echo $_SESSION['name'] ?>" readonly><br>
                            <div class="text-ceneter">
                                <button type="submit" class="btn btn-danger" id="subsubmitbtn"
                                    name="subsubmitbtn">Submit</button>
                                <a href="subject.php" class="btn btn-secondary">Close</a>

                            </div>
                           
                    </form>

        

    </div>
</div>
    
</body>
</html>