<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
error_reporting(0);
if (isset($_POST['submit'])) 
{
    if (empty($_POST['d_mobile']) || empty($_POST['d_password'])) 
    {
        $error = "deptname or Password is invalid";
    } 
    else 
    {
        // mysqli_connect() function opens a new connection to the MySQL server.
	$servername = "localhost";
$username = "root";
$password = "";
$database = "voiceup";

	$con = mysqli_connect($servername, $username, $password,$database);

        // Define $mobile and $password
        $d_mobile = mysqli_real_escape_string($con, $_POST['d_mobile']);
        $d_password = mysqli_real_escape_string($con,$_POST['d_password']);
        $_SESSION["sessionid"] = $_POST['d_mobile'];

        //chek if phone number is available or not
        $FarmerPhoneAvailCheck=$con->query("SELECT * FROM dept WHERE d_mobile='".$d_mobile."'");
        if($FarmerPhoneAvailCheck->num_rows<1)
        {
            $error="Invalid Phone Number";
        }
        else
        {
            $FarmerPasswordCheck=$con->query("SELECT * FROM dept WHERE d_mobile='".$d_mobile."' AND d_password='".$d_password."'");
            if($FarmerPasswordCheck->num_rows<1)
            {
            $error="Wrong Password";
            }
            else
            {
                $_SESSION['login_dept'] = $d_mobile;
                header("location: login.php");
            }
        }
    }
    mysqli_close($con); // Closing Connection
}
?>
<!-- <html>
</html> -->