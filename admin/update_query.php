<?php
		$servername = "localhost";
$username = "root";
$password = "";
$database = "voiceup";

	$conn = mysqli_connect($servername, $username, $password,$database);

	
	if(ISSET($_POST['update'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$mobile = $_POST['mobile'];
		$city = $_POST['city'];
		
	mysqli_query($conn, "UPDATE `user` SET `u_id` = '$id', `u_name` = '$name', `u_mobile` = '$mobile', `u_city` = '$city' WHERE `u_mobile` = '$mobile'") or die(mysqli_error());
header("location: managecitizens.php");
	}
?>

