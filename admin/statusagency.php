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

   $d_mobile = $_GET['d_mobile'];

   if(isset($_POST['accept']))
   {        
        $query = " update dept set d_approve = '2' where d_mobile='".$d_mobile."'";
        $result = mysqli_query($con,$query);
   }
   if(isset($_POST['review']))
   {        
        $query = " update dept set d_approve = '3' where d_mobile='".$d_mobile."'";
        $result = mysqli_query($con,$query);
   }
   if(isset($_POST['reject']))
   {        
        $query = " update dept set d_approve = '4' where d_mobile='".$d_mobile."'";
        $result = mysqli_query($con,$query);
   }
   header("Location: agencyprofile.php?d_mobile=$d_mobile"); 
?>
