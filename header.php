<head>
   <!-- Font Awsome CSS -->
   <link rel="stylesheet" href="css/all.min.css">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/status.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;1,100;1,200&display=swap">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat">

<style>
    *{
        font-family: 'Montserrat', sans-serif;
    }
</style>
</head>
<!-- START Side Bar -->
<div class="container-fluid mb-5" style="margin-top:40px;">
   <div class="row">
      <nav class="col-sm-3 col-md-2 sidebar py-5  d-print-none" style="background-color: #4b4276;">
         <div class="sidebar-sticky">
            <ul class="nav flex-column">
            <li class="nav-item">
       <a class="nav-link text-white">
        <h3>Faculty</h3>
       </a>
      </li>
               <li class="nav-item">
                  <a class="nav-link <?php if(PAGE == 'dash') { echo 'active'; } ?> " href="admindashboard.php">
                     Home
                  </a>
               </li>
               </li>
               <li class="nav-item">
                  <a class="nav-link <?php if(PAGE == 'subject') { echo 'active'; } ?>" href="subject.php">
                     Subject
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link <?php if(PAGE == 'experiments') { echo 'active'; } ?>" href="experiments.php">
                     Experiments
                  </a>
               </li>

               <li class="nav-item">
                  <a class="nav-link <?php if(PAGE == 'assginments') { echo 'active'; } ?>" href="assignments.php">
                     Assginments
                  </a>
               </li>

               <!-- <li class="nav-item">
                  <a class="nav-link <?php if(PAGE == 'manage') { echo 'active'; } ?>" href="manage.php">
                     Manage
                  </a>
               </li> -->
               <li class="nav-item">
                  <a class="nav-link <?php if(PAGE == 'view') { echo 'active'; } ?>" href="view.php">
                     View
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="logout.php">
                     Logout
                  </a>
               </li>

            </ul>
         </div>
      </nav>
      <!-- END Side Bar -->
<?php
if (!isset($_SESSION['name'])) {
	echo "
    <script>
        alert('Please Login');
    </script>";
	echo "<script> location.href='mainlogin.php'; </script>";
} 



?>
      <!-- Jquery JS -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <!-- Bootstrap JS -->
      <script src="js/bootstrap.min.js"></script>