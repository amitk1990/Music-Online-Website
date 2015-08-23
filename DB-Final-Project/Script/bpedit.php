<?php 
session_start();
$uid = $_SESSION["uid"];
echo $uid;
$uname = $_GET["newname"];
$pwd = $_GET["newpwd"];
$yr = $_GET["newyear"];
$city = $_GET["newcity"];
$bio = $_GET["bio"];
echo $uid,$uname,$pwd,$yr,$city,$bio;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DbFinal";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
		{
	    die("Connection failed: " . $conn->connect_error);
		}

$conn->query("SET @flag = 1;");
$callpedit = $conn->prepare("call bedit_personal(?,?,?,?,?,?,@flag);");

$callpedit->bind_param("ssssss",$uid,$uname,$yr,$city,$pwd,$bio);
$callpedit->execute();
if (!($res = $conn->query("SELECT @flag as _p_out;"))) {
    	echo "Fetch failed:" ;
}
$row = $res->fetch_assoc();

echo $row['_p_out'];



?>