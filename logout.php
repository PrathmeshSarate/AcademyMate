<?php
session_start();

//  START To check User logged in or not and redirect to correct page
if (isset($_SESSION['name'])) { } else {
    echo "
    <script>
        alert('Please Login');
    </script>";
	
}
// END To check User logged in or not and redirect to correct page


session_destroy();
unset($_SESSION['name']);
$_SESSION['mainlogin'] = false;
unset($_SESSION['id']);
echo "
<script>
    alert('Thank you');
</script>";
echo "<script> location.href='mainlogin.php'; </script>";
exit;

?>
