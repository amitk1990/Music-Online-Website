<?php
session_start();
$uid =$_SESSION['uid'];
$cid=$_GET['dname'];
$rating=$_GET['rating'];
$review=$_GET['review'];
echo $cid,$rating,$review;
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
$query = $conn -> prepare("call add_or_remove_rating(?,?,?,?, @flag);");
$query->bind_param("ssss",$uid, $cid, $rating, $review);
$query->execute();
if (!($res = $conn->query("SELECT @flag as _p_out;"))) {
    	echo "Fetch failed:" ;
}
$row = $res->fetch_assoc();

echo "hello".$row['_p_out'];

?>