<?php
session_start();
define('TITLE', 'Dashboard');
define('PAGE', 'dash');
include('include/header.php');
include('include/navbar_student.php');
include('include/dbcon.php');

//  START To check User logged in or not and redirect to correct page
if (isset($_SESSION['s_name'])) { } else {
	header('location: index.php');
}
// END To check User logged in or not and redirect to correct page
$stud_year = $_SESSION['year'];
$stud_semester = $_SESSION['semester'];

$sql = "SELECT * FROM `notice`";
$run = mysqli_query($conn, $sql);
$row = mysqli_num_rows($run);


$sql1 = "SELECT * FROM `assignmets` WHERE `year`= '$stud_year' AND `semester` = '$stud_semester'";
$run1 = mysqli_query($conn, $sql1);
$row1 = mysqli_num_rows($run1);	



$sql2 = "SELECT * FROM `experiments` WHERE `year`= '$stud_year' AND `semester` = '$stud_semester'";
$run2 = mysqli_query($conn, $sql2);
$row2 = mysqli_num_rows($run2);	
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
	<!-- START Dashboard Stat Cards -->

<div class="col-sm-9 col-md-10">
		<div class="row mx-5 justify-content-center text-center">

			<div class="col-sm-4 mt-5">
				<div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
					<div class="card-header">Notice</div>
					<div class="card-body">
						<h4 class="card-title">
							<?php echo $row; ?>
						</h4>
						<a class="btn text-white" href="#">View</a>
					</div>
				</div>
			</div>

			<div class="col-sm-4 mt-5">
				<div class="card text-white bg-success mb-3" style="max-width: 18rem;">
					<div class="card-header">Experiments</div>
					<div class="card-body">
						<h4 class="card-title">
							<?php echo $row1	; ?>
						</h4>
						<a class="btn text-white" href="exp.php">View</a>
					</div>
				</div>
			</div>

			<div class="col-sm-4 mt-5">
				<div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
					<div class="card-header">Assginments</div>
					<div class="card-body">
						<h4 class="card-title">
							<?php echo $row2; ?>
						</h4>
						<a class="btn text-white" href="assgin.php">View</a>
					</div>
				</div>
            </div>
            

		</div>

		<div class="row mx-5 text-center">

			<div class="col-sm-9 mt-5  col-md-12">
				<div class="row">
					<div class="col-sm-9 mt-5">

						<!-- Section after cards -->
					</div>
				</div>
			</div>

		</div>
		<!-- END Dashboard Stat Cards -->
</div>
</div>
</body>
</html>