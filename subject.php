
<?php
session_start();
define('TITLE', 'Subject');
define('PAGE', 'subject');
include('header.php');
include('navbar_admin.php');
include('dbconnection.php');
$faculty_name =  $_SESSION['name'];

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE ?></title>
    <style>
        .sub_form{
            margin: 30px;
        }
    </style> 
</head>
<body>
    

<div class="col-sm-9 col-md-10">
    <div class="row mx-5 justify-content-center text-center">
        <div class="col-md-12 mt-5">

            <form action="" method="post" class="form-inline">

                    <select class="form-control col-md-3 sub_form" name="semeter_option"  style="margin-right: 20px;font-size: 21px;">
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

                    <button type="submit" name="check" id="check" class="btn btn-primary form-control col-md-3 sub_form">Check</button>

                    <a class="btn btn-info float-right form-control col-md-3 sub_form" href="addsub.php" role="button">Add Subject</a>
               
            
            </form>
           
           
        </div>
<div class="col-md-12">
    

            <?php
        if(isset($_POST['check'])){
            $query1;
            $sem = $_POST['semeter_option'];
            if($sem == '*'){
            $query1 = "SELECT * FROM `subjects`  WHERE `faculty` = '$faculty_name' ";
            }
            else{
                $query1 = "SELECT * FROM `subjects` WHERE `semester` = '$sem' AND `faculty` = '$faculty_name'";

            }
            $result1 = mysqli_query($conn, $query1);
                

            if (mysqli_num_rows($result1) > 0) {
            
                
                
                    echo '<table class="table table-responsive-sm  text-center mt-5 jumbotron">
                    <thead class="text-center">
                        <tr>
            
                            <th class="text-center" scope="col">Subject ID</th>
                            <th class="text-center" scope="col">Subject Name</th>
                            <th class="text-center" scope="col">Semester</th>
                            <th class="text-center" scope="col">Year</th>
                            <th class="text-center" scope="col">Faculty Name</th>
                            <th class="text-center" scope="col">Edit</th>
                            <th class="text-center" scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>';
                    while ($row1 = $result1->fetch_assoc()) { 
                        
                        
                        echo '<tr>';
                        echo '<td>' . $row1['subject_id'] . '</td>';
                        echo '<td>' . $row1['subject_name'] . '</td>';
                        echo '<td>' . $row1['semester'] . '</td>';
                        echo '<td>' . $row1['year'] . '</td>';
                        echo '<td>' . $row1['faculty'] . '</td>';
                        echo '<td>
                        <form action="editsub.php" method="POST" class="d-inline">
                          <button type = "submit" class = "btn btn-info mr-3" name = "view" >
                          <i class="fa fa-edit" aria-hidden="true"></i>
                          </button>
                          </td>
                          <input type="hidden" name="id" value='.$row1["subject_id"].'>
                          </form>';
                          echo '<td>
                          <form method="post" class="d-inline">
                          <input type="hidden" name="id" value='.$row1["subject_id"].'>
                          <button type = "submit" class = "btn btn-secondary" name = "delete" value = "Delete" >
                          <i class="fa fa-trash-o" aria-hidden="true"></i>
                          </button>
                          </form>
                          <td>';
                        echo ' <input type="hidden" name="id" value='.$row1["subject_id"].'>';
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

<?php
 if(isset($_REQUEST['delete'])){
    $sql1="DELETE FROM subjects WHERE subject_id = {$_REQUEST['id']}";
    
    if($con->query($sql1) == TRUE){
        echo '<script> alert("Delete Sucessfully");</script>';
    
        //echo 'meta http-equiv=refresh content="0;URL=?deleted" />';
    }
    else{
        echo "<script> alert('Unable to Delete'); </script>";
    }
}


?>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

</body>
</html>