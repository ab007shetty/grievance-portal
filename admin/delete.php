<?php
    session_start();
	
  $servername = "localhost";
$username = "root";
$password = "";
$database = "voiceup";

	$con = mysqli_connect($servername, $username, $password,$database);
        if (!$con) {
            die(" Connection Error ");
        }


    $u_mobile = $_GET['u_mobile'];
    $sql = "DELETE FROM user WHERE u_mobile = $u_mobile";
    if (mysqli_query($con, $sql)) {
        echo "<script type='text/javascript'>alert('Deleted Successfully');
        window.location='managecitizens.php';</script>";
        die;
    } 
    mysqli_close($conn);
?>