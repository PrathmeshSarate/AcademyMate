<?php
$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="maindb";

$con=new mysqli($db_host,$db_user,$db_pass,$db_name);
if($con->connect_error){
    die("connection failed");
}

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);


$servername = "localhost";
$username = "root";
$password = "";

try {
  $PDO_conn = new PDO("mysql:host=$servername;dbname=maindb", $username, $password);
  // set the PDO error mode to exception
  $PDO_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>