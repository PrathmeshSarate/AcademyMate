<?php
session_start();
define('TITLE', 'Manage');
define('PAGE', 'manage');
include('header.php');
include('navbar_admin.php');
include('dbconnection.php');
$faculty_name = $_SESSION['name']; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE ?></title>
</head>
<body>
    
    
</body>
</html>