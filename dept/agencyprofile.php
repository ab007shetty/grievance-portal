<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$u_mobile = $res;
if (!isset($_SESSION['login_dept'])) {
    header("location: login.php"); // Redirecting To Profile Page
}
error_reporting(0);
?>

<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Agency Profile</title>
    <link rel="icon" href="../assets/img/fav.png" type="image/png">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="../assets/css/Article-List.css">
    <link rel="stylesheet" href="../assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="../assets/css/Highlight-Blue.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.css">
    <link rel="stylesheet" href="../assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="../assets/css/table-style.css">
    <link rel="stylesheet" href="../assets/css/profile.css">
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css' rel='stylesheet'>

    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

    <script type='text/javascript'></script>
	  <link rel="icon" type="image/png" href="assets/img/sah.png" />

</head>

<body oncontextmenu='return false' class='snippet-body'>
    <div class="page-content page-container" id="page-content">
     <nav class="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav" style="background: #1A4E85;">
        <div class="container-fluid">
            <a class="navbar-brand js-scroll-trigger" data-bs-hover-animate="pulse" href="../index.php" style="font-family: Montserrat, sans-serif;">GRIEVANCE PORTAL</a>
            <button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right rounded" data-aos="fade" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background: #fff;"><i class="fa fa-bars" style="color: #1A4E85;;"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
             <ul class="nav navbar-nav ml-auto">

                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="personalfeed.php">Issues</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="solvedissue.php">Solved Issues</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a href="../dept/agencyprofile.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #1A4E85;margin-left: 0;border-radius: 10px;">Profile</button></a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a href="../dept/logout-script.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #1A4E85;margin-left: 0;border-radius: 10px;">Log Out</button></a></li>
                </ul>
            </div>
        </div>
    </nav>


        <?php
	$servername = "localhost";
$username = "root";
$password = "";
$database = "voiceup";

	$con = mysqli_connect($servername, $username, $password,$database);
        if (!$con) {
            die(" Connection Error ");
        }


        $d_mobile = $_GET['d_mobile'];
        $query = " select * from dept where d_mobile=" . $res . "";
        $result = mysqli_query($con, $query);

        while ($res = mysqli_fetch_assoc($result)) {
            $d_id =  $res['d_id'];
            $d_cpname =  $res['d_cpname'];
			$d_mobile =  $res['d_mobile'];

            $d_type =  $res['d_type'];
            $d_cpeid =  $res['d_cpeid'];
            $d_street =  $res['d_street'];
            $d_city =  $res['d_city'];
            $d_state =  $res['d_state'];
			$d_pincode =  $res['d_pincode'];
			$d_cppos =  $res['d_cppos'];


        }
        ?>


        <div class="features-boxed">
            <div class="container" style="background: #ffffff;">
                <div class="intro" style="background: #1A4E85;margin-top: 120px;margin-bottom: 30px;">
                    <h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Department Profile</h2>
                </div>
            </div>
        </div>


        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-xl-12 col-md-12">
                    <div class="card user-card-full" style="padding-left:15px;">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-md-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white">
                                   
                                    <h3 class="f-w-600"><?php echo "$d_cpname" ?></h3>
                                    <?php echo "$d_type" ?>
                             
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h4 class="m-b-20 p-b-5 b-b-default f-w-600"><strong>Information</strong></h4>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Id</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$d_id" ?></h6>
                                        </div>
										<div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Department</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$d_type" ?></h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Mobile</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$d_mobile" ?></h6>
                                        </div>
										 <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Employee Name</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$d_cpname" ?></h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Employee Designation</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$d_cppos" ?></h6>
                                        </div>
                                    </div>
                                    <h4 class="m-b-20 m-t-40 p-b-5 b-b-default  f-w-600"><strong>Address</strong></h4>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Street</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$d_street" ?></h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">City</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$d_city" ?></h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">State</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$d_state" ?></h6>
                                        </div>
										<div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Pincode</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$d_pincode" ?></h6>
                                        </div>
                                      
                                    </div>

                             

								</div>

                            </div>



                            <!--  <ul class="social-link list-unstyled m-t-40 m-b-10">
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                </ul> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-dark" style="background: #1A4E85;">
        <footer>
            <div class="container-fluid">
                <p style="text-align: center;"><strong>© 2022 GRIEVANCE PORTAL.&nbsp; All rights reserved.</strong><br></p>
            </div>
        </footer>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="../assets/js/freelancer.js"></script>
</body>

</html>