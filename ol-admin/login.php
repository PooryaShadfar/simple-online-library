<?php
require_once("../config.php");
session_start();
if(isset($_SESSION["logged_in"])){
header("Location: success.php");
exit();
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
$email = $_POST["email"];
$password = $_POST["password"];
$sql = "SELECT * FROM `ol-user` WHERE `role` LIKE 'admin'";
$result = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_array($result)){
	$user = $row['username'];
	$pass = $row['password'];
	}
if($email == $user && $password == $pass ){
$_SESSION["logged_in"] = 1;
header("Location: admin.php");
exit();
}else {
echo "<p style='text-align:center;margin-top:15px;'>نام کاربری و یا گذرواژه اشتباه است! </p>";

}
}
?>
