<?php
session_start();
define('TITLE', 'View');
define('PAGE', 'view');
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


<div class="col-sm-9 col-md-10">
    <div class="row mx-5 justify-content-center text-center">
    <div class="col-md-12 mt-5">
    <form action="" method="post" class="form-inline">

       
        <select class="form-control col-md-3" name="assExp"  style="margin-right: 20px;">
            <option value="assignment">Assignments</option>
            <option value="experiments">Experiments</option>
        </select>
        
        
        <select class="form-control col-md-3" name="semeter_option"  style="margin-right: 20px;">
            <option value="*">ALL SEM</option>
            <option value="First">SEM 1</option>
            <option value="Second">SEM 2</option>
            <option value="Third">SEM 3</option>
            <option value="Fourth">SEM 4</option>
            <option value="Fifth">SEM 5</option>
            <option value="Sixth">SEM 6</option>
            <option value="Seventh">SEM 7</option>
            <option value="Eighth">SEM 8</option>
        </select>
        <button type="submit" name="show" id="show" class="btn btn-primary form-control col-md-3">Show</button>
</form>
        </div>


<div class="col-md-12">
    

    <?php
if(isset($_POST['show'])){
    $query1;
    $sem = $_POST['semeter_option'];
    $assExp = $_POST['assExp'];

    if($assExp == 'assignment'){
    $query1 = "SELECT * FROM `student_upload` WHERE `upload_type` = 'experiment' AND `semester` = '$sem'";
    }
    else if($assExp == 'experiments'){
        $query1 = "SELECT * FROM `student_upload` WHERE `upload_type` = 'assignment' AND `semester` = '$sem'";

    }
    $result1 = mysqli_query($conn, $query1);
        

    if (mysqli_num_rows($result1) > 0) {
    
        
        
            echo '<table class="table table-responsive-sm  text-center mt-5 jumbotron">
            <thead class="text-center">
                <tr>
    
                    <th class="text-center" scope="col">Student ID</th>
                    <th class="text-center" scope="col">Semester</th>
                    
                    <th class="text-center" scope="col">'.ucwords($assExp).'</th>
                    <th class="text-center" scope="col">Open</th>
                    
                </tr>
            </thead>
            <tbody>';
            while ($row1 = $result1->fetch_assoc()) { 
                
                
                echo '<tr>';
                echo '<td>' . $row1['s_id'] . '</td>';
                
                echo '<td>' . $row1['semester'] . '</td>';
                
                echo '<td>' . $row1['ea_title'] . '</td>';
                echo '<td><a class="btn btn-info" href="download_stud_file.php?assExp='.$assExp.'?file='.$row1['file'].' "target="_blank">Open</a>
                </td>';
                 

                echo '</tr>';
        
        }
        echo '</tbody> </table>';
    }else
    {
        echo "Record Not Found";
    }
        


}


?>

</div>






    </div>
</div>
    
</body>
</html>