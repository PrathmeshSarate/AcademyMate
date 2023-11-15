<?php
$host="localhost";
$user="root";
$pass="";
$db="adminlogin";

$conn1= mysqli_connect($host, $user, $pass, $db);


if(isset($_POST["submit"]))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $emalid=$_POST['emailid'];
    $pass=$_POST['passphrase'];
    
    $sql1="INSERT INTO student_login_table(fname,lname,emailid,passkey) VALUES ('$fname','$lname','$emalid','$pass')";
    $result1=mysqli_query($conn1,$sql1);

    if($result1)
    {

        echo '<script> alert("Submit data sucessfully")</script>';
        header("Location: login.php"); 
    }
    else
    {
        echo '<script> alert("Submit data sucessfully")</script>';
    }   
}
?>