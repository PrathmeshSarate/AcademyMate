<?php 
define('TITLE', 'Dashboard');
define('PAGE', 'dash');
include('navbar_admin.php');
include('header.php');


?>
<!DOCTYPE html>

<head>
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="css/custom.css">
	<!-- <link rel="stylesheet" href="dashboard.css"> -->
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
</head>

<body>


	<div class="col-sm-9 col-md-10">
		<div class="row mx-5 justify-content-center text-center">

			<div class="col-md-6 mt-5 align-items-center">
				<div class="card text-white bg-primary mb-3" style="max-width: 18rem;">

					<div class="card-body">
						<h4 class="card-title">
							<div class="row mx-5 justify-content-center text-center">
								<i class="fa fa-book fa-5x" aria-hidden="true"></i>
						</h4>
						<a class="btn text-white" href="assignments.php">Assignments</a>
					</div>
				</div>
			</div>

			<div class="col-md-6 mt-5">
				<div class="card text-white bg-success mb-3" style="max-width: 18rem;">
					<div class="card-body">
						<h4 class="card-title">
							<i class="fa fa-tasks fa-5x" aria-hidden="true"></i>
						</h4>
						<a class="btn text-white" href="experiments.php">Experiments</a>
					</div>
				</div>
			</div>


			
		</div>
		<div class="row mx-5 justify-content-center text-center">

		<div class="col-md-6 mt-5">
				<div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
					<div class="card-header">Assginments</div>
					<div class="card-body">
						<h4 class="card-title">
							<?php echo "Number of Assginments"; ?>
						</h4>
						<a class="btn text-white" href="assgin.php">View</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>

</html>


