<?php
session_start();

define('TITLE', 'Assginments');
define('PAGE', 'assginments');
include('include/header.php');
include('include/navbar_student.php');
$s_id = $_SESSION['s_id'];
$stud_year  = $_SESSION['year'];
$stud_semester  = $_SESSION['semester'];
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
<body>


<?php
    
 $exp_query = "SELECT * FROM `assignmets` WHERE `year` = '$stud_year' AND `semester` = '$stud_semester' ";
$exp_result = mysqli_query($conn, $exp_query);
if (mysqli_num_rows($exp_result) > 0) {
    
   

?>
<div class="col-md-10">
    <div class="col-md-12  mt-5">
                
                <h1 class="heading text-center  ">Assginments</h1>
            
            <?php

                echo '<table class="table table-responsive-sm  text-center mt-5 jumbotron">
    <thead class="text-center">
     <tr >
      
      <th class="text-center" scope="col">Sr. No.</th>
      <th class="text-center" scope="col">Title</th>
      <th class="text-center" scope="col">Description</th>
      <th class="text-center" scope="col">Dates</th>
      <th class="text-center" scope="col">View / Download</th>
     
     </tr>
    </thead>
    <tbody>';
    
    while ($row = $exp_result->fetch_assoc()) {
                            
        echo '<tr>';


        
        echo '<td>' . $row["a_id"] . '</td>';
        
        echo '<td>' . $row["a_title"] . '</td>';
        
        
        
        
        echo '<td>' . $row["a_desciption"] . '</td>';
        
        //  echo '<td><button data-id='.$id.' class="userinfo">Info</button></td>';
        
        echo '<td>' . $row["a_date"] . '</td>';
        
        echo '<td><a class="btn btn-info" href="download_ass.php?file='.$row['a_files'].' "target="_blank">Open</a>
        </td>';


        echo '</tr>';


}
}
echo '</tbody>
</table>';
//               
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