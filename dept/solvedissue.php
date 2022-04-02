<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$d_mobile = $res;
if (!isset($_SESSION['login_dept'])) {
    header("location: login.php"); // Redirecting To Profile Page
}
error_reporting(0);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Solved Issue Feed</title>
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

    $query = " select * from dept where d_mobile=".$d_mobile."";
    $result = mysqli_query($con, $query);

    while ($res = mysqli_fetch_assoc($result)) {
        $d_type = $res['d_id'];
    }
    ?>

 

        <div class="features-boxed " style="background: #ffffff;>
            <div class="container" style="background: #ffffff;">
                <div class="intro" style="background: #1A4E85;margin-top: 120px;margin-bottom: 30px;">
                    <h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Solved Issue Feed</h2>
                </div>
            </div>
        </div>


        <?php

	$servername = "localhost";
$username = "root";
$password = "";
$database = "voiceup";

	$con = mysqli_connect($servername, $username, $password,$database);
        $count = $con->query("SELECT * from issue i, user u where i.i_d_id='$d_type' and i.i_u_id=u.u_id and i.i_status=1")->num_rows;
        if($count==0){ ?>
        <center><h3 style="border:5px solid black;width:70%;text-align:center; margin:20px;padding:20px;"> No Data available</h3></center>
        <?php } ?>


        <?php

        $q = "SELECT * from issue i, user u where i.i_d_id='$d_type' and i.i_u_id=u.u_id and i.i_status=1";
        $query = mysqli_query($con, $q);
        $c = 1;

        while ($res = mysqli_fetch_array($query)) {
        ?>
            <div class="post">
                <div class="post-image">
                    <img src="../user/<?php echo $res['i_img1'];?>"" alt="">
                </div>
                <div class="post-content">
                    <p class="post-date">Posted on <?php echo $res['i_date'];  ?></time> by <?php echo $res['u_name'];  ?></p>
                    <h4 class="post-title"><?php echo $res['i_title'];  ?></h4>
                    <div class="post-excerpt">
                    </div>
                    <li class="post-link"><a href="viewsolvedissue.php?i_id=<?php echo $res['i_id'];  ?>"><button class="btn btn-light " data-bs-hover-animate="pulse" type="button" style="margin: -5px;background: #1A4E85;color: #fff;margin-left: -5px;border-radius: 5px;">Read More</button></a></li>
                    <h5 style="display:inline; margin-left:40px; padding:10px; background-color:green;color:white;"class="badge">Solved</h5>
                </div>
                </div>
        <?php
        }
        ?>



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