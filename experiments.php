<?php
session_start();
define('TITLE', 'Experiments');
define('PAGE', 'experiments');
include('header.php');
include('navbar_admin.php');
include('dbconnection.php');
$faculty_name = $_SESSION['name']; 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE ?></title>
</head>

<body>

<?php
  $query = "SELECT * FROM `subjects`  WHERE `faculty` = '$faculty_name' ";
  $result = mysqli_query($conn, $query);
                

            if (mysqli_num_rows($result) > 0) {
                
?>

<div class="col-sm-9 col-md-10 mt-5">
    <div class="row mx-5 justify-content-center">
        <div class="col-md-10">
            <h3 class="text-center">Experiments</h3>
            <?php if(isset($msg)) {echo $msg;} ?>
        </div>


    </div>
    <div class="row mx-5 mt-3 align-content-center">
        <!-- first side start -->
        <div class="col-md-5">
            <form action="" method="post" class="col-md-12  " enctype="multipart/form-data">
                <div class="form-group ">
                    <label for="exp_id">Experiment ID</label>
                    <input type="text" class="form-control" id="exp_id" name="exp_id"
                        value="<?php echo 'E'. rand(101,999).rand(101,999) ?>" readonly>
                </div>

                <div class="form-group ">
                    <label for="exp_title">Experiment Title</label>
                    <input type="text" class="form-control" id="exp_title" name="exp_title" required>
                </div>
                <div class="form-group ">
                    <label for="exp_aim">Experiment Aim</label>
                    <input type="text" class="form-control" id="exp_aim" name="exp_aim" required>
                </div>
                <div class="form-group ">
                    <label for="exp_desc">Experiment Description</label>
                    <input type="text" class="form-control" id="exp_desc" name="exp_desc" required>
                </div>
                <div class="form-group ">
                    <label for="exp_final_date">Final Submission Date</label>
                    <input type="date" class="form-control" id="exp_final_date" name="exp_final_date" required>
                </div>
                <div class="form-group ">

                    <label for="inputSubjectr">Subject:</label>
                    <select class="form-control" name="subject" id="subject" required>
                        <option value="">Select Subject</option>
                        <?php while ($row = $result->fetch_assoc()) {
                                                         ?>
                        <option value="<?php echo $row['subject_name']?>"><?php echo $row['subject_name'] ?></option>
                        <?php }} ?>
                    </select>
                </div>
                <div class="form-group ">
                    <label for="inputYear">Year:</label>
                    <select class="form-control" name="year" id="year" required>
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
                    <label for="files">Upload Files <small class="text-danger">Only PDF</small></label>
                    <input type="file" class="form-control-file" id="files" name="files" accept=".pdf" required>
                </div>

                <div class="form-group ">
                    <label for="faculty_name">Faculty Name</label>
                    <input type="text" class="form-control" id="faculty_name" name="faculty_name"
                        value="<?php echo $_SESSION['name'] ?>" readonly><br>
                    <div class="text-ceneter">
                        <button type="submit" class="btn btn-danger" id="add_assign" name="add_exp">Submit</button>

                    </div>
                </div>

            </form>
        </div>

        <?php

     $query = "SELECT * FROM `experiments` WHERE `faculty` = '$faculty_name'";
        $result1 = mysqli_query($conn, $query);
                

        if (mysqli_num_rows($result1) > 0) {
        ?>
        <!-- Second Side started -->
        <div class="col-md-7">
            <?php

                echo '<table class="table table-responsive-sm  text-center mt-5 jumbotron">
                <thead class="text-center">
                    <tr>

                        <th class="text-center" scope="col">Experment ID</th>
                        <th class="text-center" scope="col">Title</th>
                        <th class="text-center" scope="col">Final Date</th>
                        <th class="text-center" scope="col">Semester</th>
                        <th class="text-center" scope="col">View</th>
                        
                    </tr>
                </thead>
                <tbody>';
                while ($row1 = $result1->fetch_assoc()) { 
                    
                    
                    echo '<tr>';
                    echo '<td>' . $row1['e_id'] . '</td>';
                    echo '<td>' . $row1['e_title'] . '</td>';
                    echo '<td>' . $row1['dates'] . '</td>';
                    echo '<td>' . $row1['semester'] . '</td>';
                    echo '<td><a class="btn btn-info" href="download_exp.php?file='.$row1['e_files'].' "target="_blank">Open</a>
                    </td>';
                    echo '</tr>';
                
                }
                echo '</tbody> </table>';
            }else
            {
                echo "Record Not Found";
            }
            ?>
        </div>

    </div>
</div>
</div>
</body>

</html>
<?php

if(isset($_REQUEST['add_exp']))
{
    if(($_REQUEST['exp_id']=="") || ($_REQUEST['exp_title']=="") || ($_REQUEST['exp_aim']=="") || ($_REQUEST['exp_desc']=="") || ($_REQUEST['exp_final_date']=="")|| ($_REQUEST['subject']=="") || ($_REQUEST['semester']=="") || ($_REQUEST['year']=="") || ($_FILES['files']['name']==""))
    {
        // echo'Fill all details';
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill all details</div>';

    }
    else{
        $exp_id = $_REQUEST['exp_id'];
        $exp_title=$_REQUEST['exp_title'];
        $exp_aim=$_REQUEST['exp_aim'];
        $exp_desc=$_REQUEST['exp_desc'];
        $exp_final_date=$_REQUEST['exp_final_date'];
        $semester = $_REQUEST['semester'];
        $year = $_REQUEST['year'];
        $subject = $_REQUEST['subject'];

        $files=$_FILES['files']['name'];
        $files_link_temp=$_FILES['files']['tmp_name'];
        $link_folder="C:/xampp/htdocs/pro/expfolder/upload/".$files;
        
        move_uploaded_file($files_link_temp, $link_folder);

        $sql="INSERT INTO `experiments`(`e_id`, `faculty`, `e_title`, `e_aim`, `e_description`, `dates`, `subject`, `semester`, `year`, `e_files`) VALUES  ('$exp_id','$faculty_name','$exp_title','$exp_aim','$exp_desc','$exp_final_date','$subject','$semester','$year','$files')";

        if($con->query($sql) == TRUE)
        {
            $msg='<div class="pt-4 col-md-4" style="margin-left:355px;">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Assignment Added Sucessfully</strong>
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

?>