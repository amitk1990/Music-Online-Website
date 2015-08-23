<?php
session_start();
$uid = $_SESSION['uid'];
$message = $_GET['mess'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DbFinal";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{
die("Connection failed: " . $conn->connect_error);
}
$query = $conn -> prepare("insert into message values(?,?)");
$query->bind_param("ss",$uid, $message);
$query->execute();
header("Location: http://localhost/DB-Final-Project/profilepage.php?post=success");

?>