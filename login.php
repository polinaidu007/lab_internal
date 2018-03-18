<?php
include "connect.php";
if(isset($_POST["sub"])){
$e=$_POST["email"];
$p=$_POST["password"];
$p=md5($p);
$j="admin";
$qr="select * from authentication where email='$e' and password='$p' and job='$j'";
$res=mysqli_query($conn,$qr);
$res=mysqli_fetch_object($res);
if($res)
{
	session_start();
	$_SESSION['user']='poli';
	echo $_SESSION['user'];
	header("location:adminLogin.php");
}
else
{
	echo '<script>alert("wrong credentials")</script>';
}
}
?>
<!DOCTYPE html>
<html>
<head><title>LogIn</title></head>
<body>
<form action="" method="POST">
<label for="email"></label><input type="email" name="email">
<label for="password"></label><input type="password" name="password">
<input type="submit" name="sub">
</form>
</body>
</html>
