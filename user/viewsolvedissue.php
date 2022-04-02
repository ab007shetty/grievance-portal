<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$u_mobile = $res;
if (!isset($_SESSION['login_user'])) {
    header("location: login.php"); // Redirecting To Profile Page
}
error_reporting(0);
?>

<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>View Issue</title>
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
    <link href='https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css' rel='stylesheet'>

    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <link rel="icon" type="image/png" href="assets/img/sah.png" />


</head>

<body oncontextmenu='return false' class='snippet-body'>
    <div class="page-content page-container" id="page-content">
        <nav class="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav" style="background: #1A4E85;">
            <div class="container-fluid">
                <a class="navbar-brand js-scroll-trigger" data-bs-hover-animate="pulse" href="../index.php" style="font-family: Montserrat, sans-serif;">GRIEVANCE PORTAL</a>
                <button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right rounded" data-aos="fade" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background: #fff;"><i class="fa fa-bars" style="color: #0c3823;;"></i></button>
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

       <div class="article-list" style="background: rgb(252,252,252);">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Latest Articles</h2>
                <h2 class="text-center" style="background: #1A4E85;color: rgb(255,255,255);padding: 20px;padding-top: 20px;margin-bottom: 10px;margin-top: 50px;">Solved Issues</h2>
            </div>
       </div>


        <?php
	$servername = "localhost";
$username = "root";
$password = "";
$database = "voiceup";

	$con = mysqli_connect($servername, $username, $password,$database);

         $i_id = $_GET['i_id'];

         
        $q = "SELECT * from issue,dept where i_id=$i_id  ";
        $query = mysqli_query($con, $q);
        $c = 1;

        while ($res = mysqli_fetch_array($query)) {
            $i_id =  $res['i_id'];
            $i_type =  $res['i_type'];
            $i_title =  $res['i_title'];
            $i_des = $res['i_des'];
            $i_exactloc =  $res['i_exactloc'];
            $i_date =  $res['i_date'];
            $i_img1 =  $res['i_img1'];


            $d_type = $res['d_type'];
            $d_name = $res['d_cpname'];
            $d_mobile = $res['d_mobile'];
            $d_street = $res['d_street'];
            $d_city = $res['d_city'];
            $d_state = $res['d_state'];
            $d_pincode = $res['d_pincode'];
            
        }
        ?>

        <div>
            <div class="container">
                <div class="cust_bloglistintro">
                    <p style="margin-left:34px;color:rgba(255,255,255,0.5);font-size:14px;"></p>
                </div>
                <div class="row">
                    <div class="offset-sm-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 cust_blogteaser" data-bs-hover-animate="bounce" style="padding-bottom:20px;margin-bottom:32px;"><a href="#"><img class="img-fluid" style="width:100%;" src="../user/<?php echo   $i_img1;?>"></a>

                    </div>
        
                </div>

            </div>
            <div class="padding">
                <div class="row container d-flex justify-content-center">
                    <div class="col-xl-12 col-md-12">
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">

                                <div class="col-sm-12 col-md-12 col">
                                    <div class="card-block">
                                        <h4 class="m-b-20 p-b-5 f-w-600" style="color: #000;"><strong>Issue : <?php echo "$i_title" ?></strong></h4>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600" style="color: #0f0f0f;">Issue ID</p>
                                                <h6 class="text-muted f-w-400"><?php echo "$i_id" ?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600" style="color: #000;">Department Type</p>
                                                <h6 class="text-muted f-w-400"><?php echo "$i_type" ?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600" style="color: #000;">Issue Date</p>
                                                <h6 class="text-muted f-w-400"><?php echo "$i_date" ?></h6>
                                            </div>
										</div><br>
                                            <h5 class="m-b-20 p-b-5 b-b-default f-w-600"><strong>Agency Who Solved</strong></h5>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600" style="color: #000;">Agency Type</p>
                                                    <h6 class="text-muted f-w-400"><?php echo "$d_type" ?></h6>
                                                </div>
                                               <div class="col-sm-6">
													<p class="m-b-10 f-w-600" style="color: #000;">Agency Contact Person</p>
													<h6 class="text-muted f-w-400"><?php echo "$d_name" ?></h6>
                                                </div>
                                                <div class="col-sm-6">
													<p class="m-b-10 f-w-600" style="color: #000;">Contact Person Mobile</p>
													<h6 class="text-muted f-w-400"><?php echo "$d_mobile" ?></h6>
                                                </div>
												<div class="col-sm-6">
													<p class="m-b-10 f-w-600" style="color: #000;">Address</p>
													<h6 class="text-muted f-w-400"><?php echo "$d_street"?> <?php echo ", $d_city"?> <?php echo " ($d_state) "?> <?php echo "- $d_pincode"?></h6>
											   </div>
                                            </div>
                                          <br>
                                      
                                            <h4 class="m-b-20 p-b-5 b-b-default f-w-600"><strong>Description</strong></h4>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600" style="color: #000;">Issue Decription</p>
                                                    <h6 class="text-muted f-w-400"><?php echo "$i_des" ?></h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600" style="color: #000;">Exact Location</p>
                                                    <h6 class="text-muted f-w-400"><?php echo "$i_exactloc" ?></h6>
                                                </div>
											</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div></div></div>
        <div class="footer-dark" style="background: #1A4E85;">
            <footer>
                <div class="container-fluid">
                    <p style="text-align: center; color: #fff;" ><strong>© 2022 GRIEVANCE PORTAL.&nbsp; All rights reserved.</strong><br></p>
                </div>
            </footer>
        </div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/bs-init.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="assets/js/freelancer.js"></script>
    </div>
</body>

</html>