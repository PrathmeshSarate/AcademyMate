<?php
session_start();
define('TITLE', 'Experiments');
define('PAGE', 'experiments');
include('include/header.php');
include('include/navbar_student.php');
$s_id = $_SESSION['s_id'];

//  START To check User logged in or not and redirect to correct page
if (isset($_SESSION['s_name'])) {
 } else {
	header('location: index.php');
}
// END To check User logged in or not and redirect to correct page

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE ?></title>

<?php
$stud_year;
$stud_semester;

$stud_query = "SELECT  `year`, `semester` FROM `student` WHERE `student_id` = $s_id ";
$stud_result = mysqli_query($conn, $stud_query);

if (mysqli_num_rows($stud_result) > 0) {
    while ($row = $stud_result->fetch_assoc()) {
              $stud_year = $row['year'];
              $stud_semester =  $row['semester'];
    }}
    
 $exp_query = "SELECT * FROM `experiments` WHERE `year` = '$stud_year' AND `semester` = '$stud_semester' ";
$exp_result = mysqli_query($conn, $exp_query);
if (mysqli_num_rows($exp_result) > 0) {
    
   

?>
    

	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/custom.css">
</head>
<body>
<div class="col-md-10">
    <div class="col-md-12  mt-5">

        <h1 class="heading text-center  ">Experiments</h1>

        <?php

                echo '<table class="table table-responsive-sm  text-center mt-5 jumbotron">
                        <thead class="text-center">
                        <tr >
                        
                        <th class="text-center" scope="col">Exp. No.</th>
                        <th class="text-center" scope="col">Title</th>
                        <th class="text-center" scope="col">Aim</th>
                        <th class="text-center" scope="col">Description</th>
                        <th class="text-center" scope="col">Dates</th>
                        <th class="text-center" scope="col">View / Download</th>
                        </tr>
                        </thead>
                        <tbody>';
                
                        while ($row = $exp_result->fetch_assoc()) {
                            
                            echo '<tr>';


                            
                            echo '<td>' . $row["e_id"] . '</td>';
                            
                            echo '<td>' . $row["e_title"] . '</td>';
                            echo '<td>' . $row["e_aim"] . '</td>';
                            
                            
                            
                            echo '<td>' . $row["e_description"] . '</td>';
                            
                            //  echo '<td><button data-id='.$id.' class="userinfo">Info</button></td>';
                            
                            echo '<td>' . $row["dates"] . '</td>';
                            
                            echo '<td><a class="btn btn-info" href="download_exp.php?file='.$row['e_files'].' "target="_blank">Open</a>
                            </td>';


                            echo '</tr>';
                  
                
                                      
        
        }
        }
        echo '</tbody>
        </table>';
        ?>
        <?php
// } else {
//                 echo "0 Result";
//             }





            ?>



    </div>
</div>
    
</body>
</html>