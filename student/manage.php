<?php
session_start();
define('TITLE', 'Manage');
define('PAGE', 'manage');
include('include/header.php');
include('include/navbar_student.php');
include('include/dbcon.php');

$s_id = $_SESSION['s_id'];
$stud_semester = $_SESSION['semester'];
$stud_year = $_SESSION['year'];



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE ?></title>


    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
</head>

<?php
 

// $upload_qry = "INSERT INTO `student_upload`(`student_name`, `upload_type`, `file`, `ea_id`) VALUES ()";
?>

<body>
    <!-- START UPLOAD FORM -->
    <div class="col-sm-9 col-md-10 p-md-5  ">

        <div class="row justify-content-center bg-light ">
            <div class="col-sm-12 col-md-12 ">

                <h3 class="text-center p-mt-4 mt-3">
                    Experiments</h3>

                <table class="table table-responsive-sm  text-center mt-5 jumbotron">
                    <thead class="text-center">
                        <tr>

                            <th class="text-center" scope="col">Exp. No.</th>
                            <th class="text-center" scope="col">Title</th>
                            <th class="text-center" scope="col">Last Date</th>
                            <th class="text-center" scope="col">Upload</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $exp_query = "SELECT * FROM `experiments` WHERE `year` = '$stud_year' AND `semester` = '$stud_semester' ";
                        $exp_result = mysqli_query($conn, $exp_query);
                        if (mysqli_num_rows($exp_result) > 0) {
                            
    while ($row = $exp_result->fetch_assoc()) {
        
                            echo '<tr>';
                    
                    
                            ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="e_id" value="<?php echo $row["e_id"] ?>">
                                <input type="hidden" name="subject" value="<?php echo $row["subject"] ?>">
                                <input type="hidden" name="ea_title" value="<?php echo $row["e_title"] ?>">
                            <?php
                            echo '<td>' . $row["e_id"] . '</td>';
                            echo '<td>' . $row["e_title"] . '</td>';
                            
                            echo '<td>' . $row["dates"] . '</td>';
                            

                            echo '<td>
                            <input type="file" class="" id="files" name="files"  accept=".pdf">
                            <button type="submit" class="btn btn-info btn-sm" id="expBtn" name="expBtn">Upload</button>
                            </td>
                            ';
                    
                    
                            echo '</tr></form>';
                    
                    
                                     
                    
                    }
                    }
                    echo '</tbody>
                    </table>';
?>


            </div>
            <div class="col-sm-12 col-md-12 ">

                <h3 class="text-center p-mt-4 mt-3">Assginments</h3>
                <?php if(isset($assmsg)) {echo $assmsg;} ?>
                <table class="table table-responsive-sm  text-center mt-5 jumbotron">
                    <thead class="text-center">
                        <tr>

                            <th class="text-center" scope="col">Sr. No.</th>
                            <th class="text-center" scope="col">Title</th>
                            <th class="text-center" scope="col">Last Date</th>
                            <th class="text-center" scope="col">Upload</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ass_query = "SELECT * FROM `assignmets` WHERE `year` = '$stud_year' AND `semester` = '$stud_semester' ";
                        $ass_result = mysqli_query($conn, $ass_query);
                        if (mysqli_num_rows($exp_result) > 0) {
    while ($row = $ass_result->fetch_assoc()) {
                            
                            echo '<tr>';
                    ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="a_id" value="<?php echo $row["a_id"] ?>">
                                <input type="hidden" name="subject" value="<?php echo $row["subject"] ?>"> 
                                <input type="hidden" name="ea_title" value="<?php echo $row["a_title"] ?>">

                    <?php
                    
                            
                            echo '<td>' . $row["a_id"] . '</td>';
                            
                            echo '<td>' . $row["a_title"] . '</td>';
                            echo '<td>' . $row["a_date"] . '</td>';
                            
                            echo '<td><input type="file" class="" id="files" name="files"  accept=".pdf">
                            <button type="submit" class="btn btn-info btn-sm" id="assBtn" name="assBtn">Upload</button>
                            </td>';
                    
                    
                            echo '</tr></form>';
                    
                    
                                       
                    
                    }
                    }
                    echo '</tbody>
                    </table>';
?>

            </div>
        </div>

    </div>
    <!-- END UPLOAD FORM -->


</body>

</html>

<?php
if(isset($_POST['expBtn'])){

        $e_id = $_POST['e_id'];
        $subject_name = $_POST['subject'];
        $ea_title = $_POST['ea_title'];

        $files=$_FILES['files']['name'];
        $files_link_temp=$_FILES['files']['tmp_name'];
        $link_folder="C:/xampp/htdocs/pro/student_upload/exp/".$files;
        
        move_uploaded_file($files_link_temp, $link_folder);

        
       $sql="INSERT INTO `student_upload`(`s_id`,`subject_name`, `upload_type`, `file`, `ea_id`,`ea_title`, `semester`) VALUES ('$s_id','$subject_name','experiment','$files','$e_id','$ea_title','$stud_semester')";

        if(mysqli_query($conn,$sql) == TRUE)
        {
            

            $expmsg = '<div class="pt-4 col-md-4" style="margin-left:355px;">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Uploaded</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>';
            
        }
        else{
            $expmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Please try again</div>';
        }


}


if(isset($_POST['assBtn'])){

    $a_id = $_POST['a_id'];
    $subject_name = $_POST['subject'];
    $ea_title = $_POST['ea_title'];

    $files=$_FILES['files']['name'];
    $files_link_temp=$_FILES['files']['tmp_name'];
    $link_folder="C:/xampp/htdocs/pro/student_upload/ass/".$files;
    move_uploaded_file($files_link_temp, $link_folder);

    
   $sql="INSERT INTO `student_upload`(`s_id`,`subject_name`, `upload_type`, `file`, `ea_id`,`ea_title`, `semester`) VALUES ('$s_id','$subject_name','assignment','$files','$a_id','$ea_title','$stud_semester')";

    if(mysqli_query($conn,$sql) == TRUE)
    {

        $assmsg = '<script>alert("Uploaded")</script>';
    }
    else{
        $assmsg = 'Upload Failed';
    }


}
?>
<!-- <script>    
var completeRegi =  function () {
if( 
    $('#assBtn').val() &&
    $('#assBtn').val()
    != ''){
    $('#signup').prop('disabled',false);
}
else
{
    $('#signup').prop('disabled',true);
}

}
</script> -->