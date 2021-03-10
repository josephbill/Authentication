<?php
session_start();

//create connection to database
$conn = mysqli_connect('localhost','root','','authentication');
//session variable for unidentified user 
$_SESSION['userUnavailable'] = "Please try again, incorrect credentials";
$emaillog = '';
$passwordLog = '';
//capture input
if (isset($_POST['login_button'])) {
	# code...
	$emailLog = $_POST['emaillog'];
	$passwordLog = $_POST['passlog'];
}

//create the sql query
//create sql query to fetch records
$sql="SELECT * FROM users WHERE email='$emaillog' && password= '".md5($password)."'";

$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);

//logic to check if user exists
if ($num==1){
    //store name of logged in user
    $_SESSION['activeUser']= $username;
    //setting new location after user logs in correctly
    //switch role here
    header('location: signup.php');

}
else{
    //setting new location if user creds are wrong
    header('location: login.php');
}


?>