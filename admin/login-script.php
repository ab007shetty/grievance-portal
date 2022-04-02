<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
error_reporting(0);
if (isset($_POST['submit'])) 
{
    if (empty($_POST['a_name']) || empty($_POST['a_password'])) 
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
        $a_name = mysqli_real_escape_string($con, $_POST['a_name']);
        $a_password = mysqli_real_escape_string($con,$_POST['a_password']);
        $_SESSION["sessionid"] = $_POST['a_name'];

        //chek if user name is correct or not
        $AdminUsernameCheck=$con->query("SELECT * FROM admin WHERE a_name='".$a_name."'");
        if($AdminUsernameCheck->num_rows<1)
        {
            $error="Invalid Username";
        }
        else
        {
            $AdminPasswordCheck=$con->query("SELECT * FROM admin WHERE a_name='".$a_name."' AND a_password='".$a_password."'");
            if($AdminPasswordCheck->num_rows<1)
            {
            $error="Wrong Password";
            }
            else
            {
                // SQL query to fetch information of registerd users and finds user match.
                $query = "SELECT a_name, a_password from admin where a_name=? AND a_password=? LIMIT 1";
                // To protect MySQL injection for Security purpose
                $stmt = $con->prepare($query);
                $stmt->bind_param("ss", $a_name, $a_password);
                $stmt->execute();
                $stmt->bind_result($a_name, $a_password);
                $stmt->store_result();
                if ($stmt->fetch()) //fetching the contents of the row {
                    $_SESSION['login_admin'] = $a_name; // Initializing Session
                header("location: login.php"); // Redirecting To Profile Page
            }
        }
    }
    mysqli_close($con); // Closing Connection
}
?>
<!-- <html>
</html> -->