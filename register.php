<?php
include "connect.php";
if(isset($_POST["sub"])){
$u=$_POST["username"];
$e=$_POST["email"];
$p=$_POST["password"];
$p=md5($p);
$j=$_POST["job"];
$qr="insert into authentication(username,email,password,job) values('$u','$e','$p','$j')";
if(mysqli_query($conn,$qr))
{
    echo "inserted successfully";   
}
else
{
    echo "insertion failed";
}
}
echo "here";
?>
