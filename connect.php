<?php
$conn=mysqli_connect("localhost","root","vishnu123","news");
if(!$conn)
{
    echo "Not connected to the database.";
}
echo "Connected successfully";
?>
