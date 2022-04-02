<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
error_reporting(0);
if (isset($_POST['submit'])) 
{
    if (empty($_POST['u_mobile']) || empty($_POST['u_password'])) 
    {
        $error = "Username or Password is invalid";
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
        $u_mobile = mysqli_real_escape_string($con, $_POST['u_mobile']);
        $u_password = mysqli_real_escape_string($con,$_POST['u_password']);
        $_SESSION["sessionid"] = $_POST['u_mobile'];

        //chek if phone number is available or not
        $FarmerPhoneAvailCheck=$con->query("SELECT * FROM user WHERE u_mobile='".$u_mobile."'");
        if($FarmerPhoneAvailCheck->num_rows<1)
        {
            $error="Invalid Phone Number";
        }
        else
        {
            $FarmerPasswordCheck=$con->query("SELECT * FROM user WHERE u_mobile='".$u_mobile."' AND u_password='".$u_password."'");
            if($FarmerPasswordCheck->num_rows<1)
            {
            $error="Wrong Password";
            }
            else
            {
                $_SESSION['login_user'] = $u_mobile;
                header("location: login.php");
            }
        }
    }
    mysqli_close($con); // Closing Connection
}
?>
<!-- <html>
</html> -->