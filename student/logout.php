<?php
session_start();

//  START To check User logged in or not and redirect to correct page
if (isset($_SESSION['s_name'])) { } else {
    echo "
    <script>
        alert('Please Login');
    </script>";
	
}
// END To check User logged in or not and redirect to correct page


session_destroy();
echo "
<script>
    alert('Thank you');
</script>";
echo "<script> location.href='index.php'; </script>";
exit;

?>
