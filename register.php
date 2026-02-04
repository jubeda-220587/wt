<?php
$conn=mysqli_connect("localhost","root","jubeerahee@587","login_db");
if(!$conn){
    die("Connection failed : ".mysqli_connect_error());
}
$Username=$_POST['Username'];
$Password=$_POST['Password'];


$sql="INSERT INTO users (USERNAME,PASSWORD) VALUES ('$Username','$Password')";
if(mysqli_query($conn,$sql)){
    echo "Registration Successful";
}
else{
    echo "Error: ".mysqli_error($conn);
}
mysqli_close($conn);
?>