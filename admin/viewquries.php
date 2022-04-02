<?php
include('../assets/database/dbconfig.php');
include('session-script.php');
$res = $_SESSION["sessionid"];
$a_name = $res;

	$servername = "localhost";
$username = "root";
$password = "";
$database = "voiceup";

	$con = mysqli_connect($servername, $username, $password,$database);

if (!isset($_SESSION['login_admin'])) {
    header("location: login.php"); // Redirecting To Profile Page
}
?>

<!DOCTYPE html>
<html>
<head>
	  <title>Citizen Quries</title>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	  <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
	  <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="icon" href="../assets/img/fav.png" type="image/png">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="../assets/css/Article-List.css">
    <link rel="stylesheet" href="../assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="../assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="../assets/css/Highlight-Blue.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.css">
    <link rel="stylesheet" href="../assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="../assets/css/card-hover.css">
  <link rel="icon" type="image/png" href="assets/img/sah.png" />

</head>
   <body>
		<nav class="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav" style="background: #1A4E85;">
        <div class="container-fluid">
            <a class="navbar-brand js-scroll-trigger" data-bs-hover-animate="pulse" href="../index.php" style="font-family: Montserrat, sans-serif;">GRIEVANCE PORTAL</a>
            <button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right rounded" data-aos="fade" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background: #fff;"><i class="fa fa-bars" style="color: #1A4E85;"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="index.php" style="filter: contrast(100%) grayscale(0%) hue-rotate(0deg) invert(0%) sepia(0%);">DASHBOARD</a></li>
                   <li class="nav-item mx-0 mx-lg-1"><a href="../admin/logout-script.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #1A4E85; margin-left: 0;border-radius: 10px;">Log Out</button></a></li>
                </ul>
            </div>
        </div>
    </nav>
	
			  <div class="features-boxed">
				<div class="container-fluid" style="background: #ffffff;">
					<div class="intro" style="background: #1A4E85;margin-top: 120px;margin-bottom: 30px;">
						<h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Contact Queries</h2>
					</div>
				</div>
			</div>
						<div class="container">
							 <div class="col-lg-12">
							   <br>
							   <table  id="tabledata" class=" table table-striped table-hover table-bordered">
							 
								 <tr class="bg-dark text-white text-center">
								 
								 <th> ID </th>
								 <th> Name </th>
								 <th> Mobile No. </th>
								 <th> Email </th>
								 <th> Address </th>
								 <th> Messgae </th>

								 </tr >

							 <?php
								
	$servername = "localhost";
$username = "root";
$password = "";
$database = "voiceup";

	$con = mysqli_connect($servername, $username, $password,$database);								   
								$q = "select * from contactus ";

								$query = mysqli_query($con,$q);

								while($res = mysqli_fetch_array($query)){
							 ?>
							 <tr class="text-center">
							 <td> <?php echo $res['c_id'];  ?> </td>
							 <td> <?php echo $res['c_name'];  ?> </td>
							 <td> <?php echo $res['c_mobile'];  ?> </td>
							 <td> <?php echo $res['c_email'];  ?> </td>
							 <td> <?php echo $res['c_address'];  ?> </td>
							 <td> <?php echo $res['c_message'];  ?> </td></tr>

							 <?php 
							 }
							  ?>
							 
							 </table>  

                       </div>
               </div>
		 <div class="footer-dark" style="background: #1A4E85; margin-top:137px;">
				<footer>
					<div class="container-fluid">
						<p style="text-align: center;"><strong>© 2022 GRIEVANCE PORTAL.&nbsp; All rights reserved.</strong><br></p>
					</div>
				</footer>
		 </div>
	 <script type="text/javascript">
	 
	 $(document).ready(function(){
	 $('#tabledata').DataTable();
	 }) 
		 function myFunction() {
	  document.getElementById("button").style.color = "green";
	}

	</script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="../assets/js/freelancer.js"></script>
</body>
</html>