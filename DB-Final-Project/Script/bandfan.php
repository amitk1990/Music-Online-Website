<?php
session_start();
$uid = $_SESSION['uid'];
$otheruserid = $_GET['Follow'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DbFinal";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{
die("Connection failed: " . $conn->connect_error);
}
$conn->query ( 'set @flag = 0;' );
$query = $conn->prepare("call fan(?,?,@flag);");
$query->bind_param("ss",$uid, $otheruserid);
$query->execute();
header("Location: http://localhost/DB-Final-Project/profilepage.php");
?>