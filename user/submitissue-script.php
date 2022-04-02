<?php
include('session-script.php');
$res = $_SESSION["sessionid"];
if (!isset($_SESSION['login_user'])) {
    header("location: login.php"); // Redirecting To Profile Page
}
error_reporting(0);
	$servername = "localhost";
$username = "root";
$password = "";
$database = "voiceup";

	$con = mysqli_connect($servername, $username, $password,$database);

        $q = "SELECT * from user where u_mobile=$res ";
        $query = mysqli_query($con, $q);

        while ($res = mysqli_fetch_array($query)) {
            $u_id =  $res['u_id'];
        }
		



//Create Connection

if (isset($_POST["submit"])) {
    #retrieve file title
    $i_title = $con->real_escape_string($_POST['i_title']);
    $i_type = $con->real_escape_string($_POST['i_type']);
	$i_d_id = $con->real_escape_string($_POST['i_d_id']);
	$i_exactloc = $con->real_escape_string($_POST['i_exactloc']);
    $i_des = $con->real_escape_string($_POST['i_des']);
    $i_status = 0;
	$i_date = date("Y/m/d");
            
                #file name with a random number so that similar dont get replaced
                $i_img1 = rand(10000,99999). "-" . $_FILES["i_img1"]["name"];


                #temporary file name to store file
                $tname1 = $_FILES["i_img1"]["tmp_name"];


                #target path
                $target_path1 = "issue/" . $i_img1;



                #TO move the uploaded file to specific location
                move_uploaded_file($tname1, $target_path1);


                #sql query to insert into database
                $query = "INSERT into issue(i_u_id,i_type,i_title,i_des,i_exactloc,i_date,i_img1,i_status,i_d_id) VALUES('$u_id','$i_type','$i_title','$i_des','$i_exactloc','$i_date','$target_path1','$i_status','$i_d_id')";
                $success = $con->query($query);
            }
            header("Location:activeissue.php");
?>
