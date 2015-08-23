<?php
session_start();
$uid = $_SESSION['uid'];
$cid = $_GET['dname'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DbFinal";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{
die("Connection failed: " . $conn->connect_error);
}
$query = $conn -> prepare("call rsvp(?,?);");
$query->bind_param("ss",$uid, $cid);
$query->execute();
?>