<?php
include "connect.php";
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
	$file = addslashes(file_get_contents($_FILES["image"]));  
    $query = "INSERT INTO img VALUES ($file)";
    if(mysqli_query($conn,$query))
    {
    	echo "inserted img";
    }  
    else
    {
    	echo "cannot insert img";
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
</body>
</html>
