<?php
include "connect.php";
session_start();
if(!(isset($_SESSION['user']) )){
    #echo $_SESSION["user"];
    header("location:login.php");
}
if(isset($_POST["sub"])){
$u=$_POST["headline"];
$e=$_POST["main"];
$qr="insert into forum(headlines,main) values('$u','$e')";
if(mysqli_query($conn,$qr))
{
    echo "inserted successfully";   
}
else
{
    echo "insertion failed";
}
}
if(isset($_POST["s"]))
{
    $fileName=$_FILES["image"]["name"];
    echo $fileName;
    $fileTemp=$_FILES["image"]["tmp_name"];
    $file_ext= strtolower(pathinfo($fileName,PATHINFO_EXTENSION));  
    if(move_uploaded_file($fileTemp,"images/".$fileName))
    {
        echo "upload successfull";
    }
    $qr="insert into filestorage(fileType,fileName) values('$file_ext','$fileName')";
    if(mysqli_query($conn,$qr))
    {
        echo "inserted file successfully";
    }
    else
    {
        echo "file insertion failed";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Home</title></head>
<body>
<form action="" method="POST" >
<label for="headline">Headline:</label><input type="textfield" rows=1 cols=10 name="headline">
<label for="main">Main:</label><input type="textfield" rows=20 cols=20 name="main">
<input type="submit" name="sub">
</form>
<form action="" method="POST" enctype="multipart/form-data">
<label for="upload">upload:</label>
	 <input type="file" name="image" id="image" /> 
	 <input type="submit" name="s">
</form>
<a href="logout.php">Logout</a>
</body>
</html>
