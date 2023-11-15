<?php
session_start();
define('TITLE', 'Assginments');
define('PAGE', 'assginments');
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
            <h3 class="text-center">Assginments</h3>
            <?php if(isset($msg)) {echo $msg;} ?>
        </div>


    </div>
    <div class="row mx-5 mt-3 align-content-center">
        <!-- first side start -->
        <div class="col-md-5">
            <form action="" method="post" class="col-md-12  " enctype="multipart/form-data">
                <div class="form-group ">
                    <label for="ass_id">Assginment ID</label>
                    <input type="text" class="form-control" id="ass_id" name="ass_id"
                        value="<?php echo 'A'.rand(101,999).rand(101,999) ?>" readonly>
                </div>

                <div class="form-group ">
                    <label for="ass_title">Assginment Title</label>
                    <input type="text" class="form-control" id="ass_title" name="ass_title" required>
                </div>
               
                <div class="form-group ">
                    <label for="ass_desc">Assginment Description</label>
                    <input type="text" class="form-control" id="ass_desc" name="ass_desc" required>
                </div>
                <div class="form-group ">
                    <label for="ass_final_date">Final Submission Date</label>
                    <input type="date" class="form-control" id="ass_final_date" name="ass_final_date">
                </div>
                <div class="form-group ">
                            
                            <label for="inputSubjectr">Subject:</label>
                            <select  class="form-control" name="subject" id="subject" required>
                                <option value="">Select Subject</option>
                                <?php while ($row = $result->fetch_assoc()) {
                                                     ?>
                                <option  value="<?php echo $row['subject_name']?>"><?php echo $row['subject_name'] ?></option>
                                <?php }} ?>
                            </select>
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
                    <label for="files">Upload Files <small class="text-danger">Only PDF</small></label>
                    <input type="file" class="form-control-file" id="files" name="files" accept=".pdf">
                </div>
                <div class="form-group ">
                    <label for="faculty_name">Faculty Name</label>
                    <input type="text" class="form-control" id="faculty_name" name="faculty_name"
                        value="<?php echo $_SESSION['name'] ?>" readonly><br>
                    <div class="text-ceneter">
                        <button type="submit" class="btn btn-danger" id="add_assign"
                            name="add_assign">Submit</button>
                        
                    </div>
                </div>
                
            </form>
        </div>

        <?php

     $query1 = "SELECT * FROM `assignmets` WHERE `faculty` = '$faculty_name'";
        $result1 = mysqli_query($conn, $query1);
                

        if (mysqli_num_rows($result1) > 0) {
        ?> 
        <!-- Second Side started -->
        <div class="col-md-7">
            <?php

                echo '<table class="table table-responsive-sm  text-center mt-5 jumbotron">
                <thead class="text-center">
                    <tr>

                        <th class="text-center" scope="col">Assginment ID</th>
                        <th class="text-center" scope="col">Title</th>
                        <th class="text-center" scope="col">Semester</th>
                        <th class="text-center" scope="col">Final Date</th>
                        <th class="text-center" scope="col">View</th>
                        
                    </tr>
                </thead>
                <tbody>';
                while ($row1 = $result1->fetch_assoc()) { 
                    
                    
                    echo '<tr>';
                    echo '<td>' . $row1['a_id'] . '</td>';
                    echo '<td>' . $row1['a_title'] . '</td>';
                    echo '<td>' . $row1['semester'] . '</td>';
                    echo '<td>' . $row1['a_date'] . '</td>';
                    echo '<td><a class="btn btn-info" href="download_ass.php?file='.$row1['a_files'].' "target="_blank">Open</a>
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
</body>

</html>
<?php

if(isset($_REQUEST['add_assign']))
{
    if(($_REQUEST['ass_id']=="") || ($_REQUEST['ass_title']=="")  || ($_REQUEST['ass_desc']=="")|| ($_REQUEST['subject']=="") || ($_REQUEST['semester']=="") || ($_REQUEST['year']=="") || ($_FILES['files']['name']=="") || ($_REQUEST['ass_final_date']==""))
    {
        // echo'Fill all details';
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill all details</div>';

    }
    else{
        $ass_id = $_REQUEST['ass_id'];
        $ass_title=$_REQUEST['ass_title'];
        
        $ass_desc=$_REQUEST['ass_desc'];
        $ass_final_date=$_REQUEST['ass_final_date'];
        $semester = $_REQUEST['semester'];
        $year = $_REQUEST['year'];
        $subject = $_REQUEST['subject'];
        
        $files=$_FILES['files']['name'];
        $files_link_temp=$_FILES['files']['tmp_name'];
        $link_folder="C:/xampp/htdocs/pro/assignfolder/upload/".$files;
        
        move_uploaded_file($files_link_temp, $link_folder);

        $sql="INSERT INTO `assignmets`(`a_id`, `faculty`, `a_title`, `a_desciption`, `a_date`, `subject`, `semester`, `year`, `a_files`) VALUES ('$ass_id','$faculty_name','$ass_title','$ass_desc','$ass_final_date','$subject','$semester','$year','$files')";

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