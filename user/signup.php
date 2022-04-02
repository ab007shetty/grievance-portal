<?php
error_reporting(0);
	$servername = "localhost";
$username = "root";
$password = "";
$database = "voiceup";

	$con = mysqli_connect($servername, $username, $password,$database);

if (isset($_POST["submit"])) {
    #retrieve file title
    $user_mobile = $con->real_escape_string($_POST['user_mobile']);
    $user_name = $con->real_escape_string($_POST['user_name']);
    $user_gender = $con->real_escape_string($_POST['user_gender']);
    $user_age = $con->real_escape_string($_POST['user_age']);
    $user_street = $con->real_escape_string($_POST['user_street']);
    $user_city = $con->real_escape_string($_POST['user_city']);
    $user_state = $con->real_escape_string($_POST['user_state']);
    $user_pincode = $con->real_escape_string($_POST['user_pincode']);
    $user_password = $con->real_escape_string($_POST['user_password']);

    $sql = "Select * from user";
    $result = $con->query($sql);

    if (mysqli_num_rows($result) > 0) {
        while ($res = mysqli_fetch_assoc($result)) {
            if ($res["u_mobile"] == $user_mobile) {
                header("location: alreadyregistered.php");
            } else {
               

                #sql query to insert into database
                $query = "INSERT into user(u_mobile,u_name,u_gender,u_age,u_street,u_city,u_state,u_pincode,u_password) VALUES('$user_mobile','$user_name','$user_gender','$user_age','$user_street','$user_city','$user_state','$user_pincode','$user_password')";
                $success = $con->query($query);
				 header("location: login.php");
            }
        }
    }
}

$con->close();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>User Signup</title>
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
    <script language="Javascript" src="../assets/js/jquery.js"></script>
    <script type="text/JavaScript" src="../assets/js/user_state_district.js"></script>
	  <link rel="icon" type="image/png" href="assets/img/sah.png" />

</head>

<body id="page-top">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav" style="background: #1A4E85;">
        <div class="container-fluid">
            <a class="navbar-brand js-scroll-trigger" data-bs-hover-animate="pulse" href="../index.php" style="font-family: Montserrat, sans-serif;">GRIEVANCE PORTAL</a>
            <button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right rounded" data-aos="fade" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background: #fff;"><i class="fa fa-bars" style="color: #1A4E85;;"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../index.php" style="filter: contrast(100%) grayscale(0%) hue-rotate(0deg) invert(0%) sepia(0%);">HOME</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a href="../login-choice.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #1A4E85;margin-left: 0;border-radius: 10px;">Log in</button></a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a href="../signup-choice.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #1A4E85;margin-left: 0;border-radius: 10px;">Sign Up</button></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="features-boxed">
        <div class="container-fluid" style="background: #ffffff;">
            <div class="intro" style="background: #1A4E85;margin-top: 120px;margin-bottom: 30px;">
                <h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">User Signup</h2>
            </div>
        </div>
    </div>
    <div class="login-clean" style="padding: 0px; background: rgb(255,255,255);margin-top: 30px; ">
        <form method="post" action="" enctype="multipart/form-data" style="background: #1A4E85;margin-bottom: 40px;">
            <h5 style="color:#fff;">Mobile Number</h5>
            <div class="form-group"><input class="form-control" id="user_mobile" type="phone" name="user_mobile" pattern="^[6-9]{1}[0-9]{9}$" title="Enter Valid 10 digit Mobile Number (Ex. 76435654XX)" placeholder="Your Mobile Number" required="" autofocus=""></div>

            <h5 style="color:#fff;">Full Name</h5>
            <div class="form-group"><input class="form-control" id="user_name" type="text" name="user_name" placeholder="Your Full Name" required="" autofocus=""></div>

            <h5 style="color:#fff;">Gender</h5>
            <div class="form-group">
                <select class="form-control" id="user_gender" name="user_gender" required>
                    <option selected disabled value="">Choose Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Others</option>
                </select>
            </div>

            <h5 style="color:#fff;">Age</h5>
            <div class="form-group"><input class="form-control" id="user_age" type="text" name="user_age" pattern="^[1-9]{1}[0-9]{1}$" title="Enter Your Correct age between 18 to 99 years" placeholder="Your Age (Ex. 34)" required="" autofocus=""></div>

            <h5 style="color:#fff;">Apartment/Street/City</h5>
            <div class="form-group"><input class="form-control" id="user_street" type="text" name="user_street" placeholder="Your Apartment/Street/City" required="" autofocus=""></div>

            <h5 style="color:#fff;">District</h5>
			<div class="form-group"><input class="form-control" id="user_city" type="text" name="user_city" placeholder="District" required="" autofocus=""></div>
			
            <h5 style="color:#fff;">State</h5>
			<div class="form-group"><input class="form-control" id="user_state" type="text" name="user_state" placeholder="State" required="" autofocus=""></div>
            
            <h5 style="color:#fff;">Pincode</h5>
            <div class="form-group"><input class="form-control" id="user_pincode" type="text" name="user_pincode" pattern="^[1-9]{1}[0-9]{5}" title="Enter valid 6 digit Pincode (Ex. 5763XX)" placeholder="Your Pincode" required="" autofocus=""></div>

	
            <h5 style="color:#fff;">Password</h5>
            <div class="form-group"><input class="form-control" id="user_password" type="password" name="user_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Your Password" required="" autofocus=""></div>

            <input name="submit" class="btn btn-primary btn-block" type="submit" value=" Sign Up "><a class="forgot" href="../user/login.php" style="color: rgb(255,255,255); margin-top: 15px">Already have account? Click here.</a>
        </form>
    </div>

    <div class="footer-dark" style="background: #1A4E85;">
        <footer>
            <div class="container-fluid">
                <p style="text-align: center; color:#fff;"><strong>© 2022 GRIEVANCE PORTAL.&nbsp; All rights reserved.</strong><br></p>
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