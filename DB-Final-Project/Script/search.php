<?php
session_start();
$uid = $_SESSION['uid'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DbFinal";
$keyword = $_GET['search'];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{
die("Connection failed: " . $conn->connect_error);
}
$mquery = "select distinct * from concert natural join genre where cid like '%$keyword%' or gname like '%$keyword%' or subgname like '%$keyword%' or bid like '%$keyword%' or venue like '%$keyword%' ";
$result = $conn->query($mquery);
if ($result->num_rows > 0) 
{
$json_rows=array();
while($row = $result->fetch_assoc()) 
    {
    	$json_rows[]=$row;
	}
echo json_encode($json_rows);
}
?>