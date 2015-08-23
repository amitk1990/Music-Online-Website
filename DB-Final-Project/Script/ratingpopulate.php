<?php
session_start();
$uid = $_SESSION["uid"];
$cid=$_GET['cname'];

//$uname = $_GET["genre"];
//echo $uname;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DbFinal";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{
die("Connection failed: " . $conn->connect_error);
}

$myquery = $conn->prepare("select rating,review from user_rating where userid = ? and cid = ?");
$myquery->bind_param('ss',$uid,$cid);
$myquery->execute();
$result = $myquery->get_result();
$row = $result->fetch_assoc();
$json_rows=array();
$json_rows['rating'] = $row['rating'];
$json_rows['review'] = $row['review'];
echo json_encode($json_rows);




//$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);

//echo json_encode($arr);

?>