<?php
include('include/dbcon.php');

date_default_timezone_set("Asia/Kolkata");


$sql = "SELECT * FROM `notice`";
$run = mysqli_query($conn, $sql);

// $row = mysqli_fetch_assoc($run);
?>
<nav class="navbar navbar-dark fixed-top bg-info p-0 shadow">
    
    <div class="navbar-brand align-content-sm-stretch col-md-2 mr-0">Smart Learn</div>
    <div class="col-md-10"><marquee class="font-weight-bold text-white" behavior="scroll" direction="left"> <a class='text-dark'>Notice </a>

    <?php
while ($row = mysqli_fetch_assoc($run)) {
$dbdate = date_create_from_format('Y-m-d H:i:s',$row['date_time']);

//Create a date object out of today's date:
$today_date = date_create_from_format('Y-m-d H:i:s', date('Y-m-d H:i:s'));

$diff = (array) date_diff($dbdate, $today_date);
if($diff['days']<=2){
    
    echo "<a class='text-danger'> Date :- ".date_format($dbdate,'Y-m-d')." </a>";
    echo $row['notice'];
    echo "<a class='text-dark'>----Notice----</a>";
    }else{
   
    }
}

?></marquee></div>
</nav>
