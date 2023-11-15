<?php
session_start();
define('TITLE', 'Dashboard');
define('PAGE', 'dash');
include('header.php');
include('navbar_admin.php');



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?php echo TITLE ?></title>
    
	<!-- Custom CSS -->
	<!-- <link rel="stylesheet" href="css/custom.css">   -->
	
</head>
<body>
	<!-- START Dashboard Stat Cards -->

<div class="col-sm-9 col-md-10">
		<div class="row mx-5 justify-content-center text-center">

			<div class="col-sm-4 mt-5">
				<div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
					
					<div class="card-body">
						<h4 class="card-title">
						<i class="fa fa-book fa-5x" aria-hidden="true"></i>
						</h4>
						<a class="btn text-white" href="assignments.php">Assignments </a>
					</div>
				</div>
			</div>

			<div class="col-sm-4 mt-5">
				<div class="card text-white bg-success mb-3" style="max-width: 18rem;">
					
					<div class="card-body">
						<h4 class="card-title">
						<i class="fa fa-tasks fa-5x" aria-hidden="true"></i>
						</h4>
						<a class="btn text-white" href="experiments.php">Experiments</a>
					</div>
				</div>
			</div>

			<div class="col-sm-4 mt-5">
				<div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
					
					<div class="card-body">
						<h4 class="card-title">
						<i class="fa fa-cog fa-5x" aria-hidden="true"></i>
						</h4>
						<a class="btn text-white" href="manage.php">Manage</a>
					</div>
				</div>
            </div>
			
			<div class="col-sm-4 mt-5">
				<div class="card text-white bg-dark   mb-3" style="max-width: 18rem;">
					
					<div class="card-body">
						<h4 class="card-title">
						<i class="fa fa-file-text-o fa-5x" aria-hidden="true"></i>
						</h4>
						<a class="btn text-white" href="view.php">View</a>
					</div>
				</div>
			</div>
			

			<div class="col-sm-4 mt-5">
				<div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
					
					<div class="card-body">
						<h4 class="card-title">
						<i class="fa fa-edit  fa-5x" aria-hidden="true"></i>
						</h4>
						<a class="btn text-white" href="subjects.php">Subjects</a>
					</div>
				</div>
			</div>

			<div class="col-sm-4 mt-5">
				<div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
					
					<div class="card-body">
						<h4 class="card-title">
						<i class="fa fa-bell-o fa-5x" aria-hidden="true"></i>
						</h4>
						<a class="btn text-white" href="add_notice.php">Add Notice</a>
					</div>
				</div>
            </div>

		</div>

		
		<!-- END Dashboard Stat Cards -->
</div>
</div>
</body>
</html>