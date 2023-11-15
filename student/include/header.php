<head>
<!-- Font Awsome CSS -->
<link rel="stylesheet" href="css/all.min.css">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/status.css">
</head>
<!-- START Side Bar -->
 <div class="container-fluid mb-5" style="margin-top:40px;">
  <div class="row">
   <nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
    <div class="sidebar-sticky">
     <ul class="nav flex-column">
     <li class="nav-item">
       <a class="nav-link">
        <h3>Student</h3>
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link <?php if(PAGE == 'dash') { echo 'active'; } ?> " href="dash.php">
        Dashboard
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link <?php if(PAGE == 'experiments') { echo 'active'; } ?>" href="exp.php">
        Experiments
       </a>
      </li>  
      
      <li class="nav-item">
       <a class="nav-link <?php if(PAGE == 'assginments') { echo 'active'; } ?>" href="assgin.php">       
        Assginments
       </a>
      </li> 

      <li class="nav-item">
       <a class="nav-link <?php if(PAGE == 'manage') { echo 'active'; } ?>" href="manage.php">        
          Manage
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

   <!-- Jquery JS -->
   <script src="js/jquery.min.js"></script>

   <!-- Bootstrap JS -->
   <script src="js/bootstrap.min.js"></script>