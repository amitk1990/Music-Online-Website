<?php
session_start();
$band = $_SESSION['uid'];
$concert= $_GET["cname"];

$genre = $_GET["gname"];
$location = $_GET["venuepost"];
$price = $_GET["tprice"];
$date = $_GET['date'];
$time = $_GET['time'];
$showtime = $date.$time;

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
$query = $conn -> prepare("call bpublish_concert(?,?,?,?,?,?,@flag);");
$query->bind_param("ssssis",$concert,$band, $genre,$location,$price,$showtime);
$query->execute();
if (!($res = $conn->query("SELECT @flag as _p_out;"))) {
    	echo "Fetch failed:" ;
    }
else 
{
	$row = $res->fetch_assoc();
	$json_rows=array();
	$json_rows['flag'] = $row['_p_out'];
	echo json_encode($json_rows);
}
?>