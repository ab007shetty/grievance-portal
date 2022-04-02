<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$u_mobile = $res;
if (!isset($_SESSION['login_user'])) {
    header("location: login.php"); // Redirecting To Profile Page
}
error_reporting(0);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Submit Issue</title>
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
    <link rel="stylesheet" href="../assets/css/feed.css">
    <style>
        @media(max-width: 992px) {
            .lap {
                display: none;
            }
        }

        @media(min-width: 992px) {
            .mob {
                display: none;
            }
        }
    </style>
	  <link rel="icon" type="image/png" href="assets/img/sah.png" />

</head>

<body id="page-top">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav" style="background: #1A4E85;">
        <div class="container-fluid">
            <a class="navbar-brand js-scroll-trigger" data-bs-hover-animate="pulse" href="../index.php" style="font-family: Montserrat, sans-serif;">GRIEVANCE PORTAL</a>
            <button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right rounded" data-aos="fade" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background: #fff;"><i class="fa fa-bars" style="color: #1A4E85;;"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="nav navbar-nav ml-auto">

                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="submitissue.php">Submit An Issue</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="activeissue.php">Active Issues</a></li>
                    </li><li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="solvedissue.php">Solved Issues</a></li>
					<li class="nav-item mx-0 mx-lg-1"><a href="../user/citizensprofile.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #1A4E85;margin-left: 0;border-radius: 10px;">Profile</button></a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a href="../user/logout-script.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #1A4E85;margin-left: 0;border-radius: 10px;">Log Out</button></a></li>
                </ul>
            </div>
        </div>
    </nav>
    
	 <div class="features-boxed">
        <div class="container-fluid" style="background: #ffffff;">
            <div class="intro" style="background: #1A4E85;margin-top: 120px;margin-bottom: 30px;">
                <h2 class="text-center" data-aos="fade"
                    style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Add New Issue</h2>
            </div>
        </div>
    </div>
    <div class="login-clean" style="padding: 0px;background: rgb(255,255,255);margin-top: 30px;">
        <form method="post" action="submitissue-script.php" enctype="multipart/form-data"
            style="background: #1A4E85;margin-bottom: 40px;">
			
			<h5 style="color:#fff;">Issue Title</h5>
            <div class="form-group"><input class="form-control" id="i_title" type="text" name="i_title" placeholder="Issue Title" required="" autofocus=""></div>

            <h5 style="color:#fff;">Concerning Department</h5>
            <div class="form-group">
                <select class="form-control" id="i_type" name="i_type" required>
                    <option selected disabled value="">Choose Department</option>
                    <option value="Police">Police</option>
                    <option value="Municipal">Municipal</option>
                    <option value="Panchayat">Panchayat</option>
					<option value="Fire">Fire</option>
                </select>
            </div>
			
			   <h5 style="color:#fff;">Confirm Department</h5>
            <div class="form-group">
                <select class="form-control" id="i_d_id" name="i_d_id" required>
                    <option selected disabled value="">Choose Department</option>
                    <option value="1">Police</option>
                    <option value="2">Municipal</option>
                    <option value="3">Panchayat</option>
					<option value="4">Fire</option>
                </select>
            </div>


				
			<h5 style="color:#fff;">Issue Exact Location</h5>
            <div class="form-group"><input class="form-control" id="i_exactloc" type="text" name="i_exactloc" placeholder="Issue Location" required="" autofocus=""></div>

					
			<h5 style="color:#fff;">Issue Description</h5>
            <div class="form-group"><textarea class="form-control" id="i_des" type="text" name="i_des"
                    placeholder="Description of Problem" required="" autofocus=""></textarea></div>

            <h5 style="color:#fff;">Image - 01</h5>
            <div class="form-group"><input class="form-control" id="i_img1" type="file"
                    accept="image/jpeg, image/jpg, image/png" name="i_img1" placeholder="Select Image" 
                    autofocus=""></div>


            <input name="submit" class="btn btn-primary btn-block" type="submit" value=" Add Issue ">

        </form>


    </div>


    <div class="footer-dark" style="background: #1A4E85;">
        <footer>
            <div class="container-fluid">
                <p style="text-align: center;  color:#fff;"><strong>© 2022 GRIEVANCE PORTAL.&nbsp; All rights reserved.</strong><br></p>
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