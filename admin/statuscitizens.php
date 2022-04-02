<?php 
 
 include('session-script.php');
 $res = $_SESSION["sessionid"];

 if(!isset($_SESSION['login_admin'])){
 header("location: login.php"); // Redirecting To Profile Page
 }
 
	$servername = "localhost";
$username = "root";
$password = "";
$database = "voiceup";

	$con = mysqli_connect($servername, $username, $password,$database);
   if(!$con)
   {
       die(" Connection Error ");
   }

   $u_mobile = $_GET['u_mobile'];

   if(isset($_POST['accept']))
   {        
        $query = " update user set u_approve = '2' where u_mobile='".$u_mobile."'";
        $result = mysqli_query($con,$query);
   }
   if(isset($_POST['review']))
   {        
        $query = " update user set u_approve = '3' where u_mobile='".$u_mobile."'";
        $result = mysqli_query($con,$query);
   }
   if(isset($_POST['reject']))
   {        
        $query = " update user set u_approve = '4' where u_mobile='".$u_mobile."'";
        $result = mysqli_query($con,$query);
   }
   header("Location: citizensprofile.php?u_mobile=$u_mobile"); 
?>
