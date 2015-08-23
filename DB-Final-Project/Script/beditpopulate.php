<?php


session_start();
$uid = $_SESSION["uid"];
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

$myquery = $conn->prepare("select bname, pwd, yob, city ,bio from band where bid = ?");
$myquery->bind_param('s',$uid);
$myquery->execute();
$result = $myquery->get_result();
$row = $result->fetch_assoc();
$json_rows=array();
$json_rows['username'] = $row['bname'];
$json_rows['pswd'] = $row['pwd'];
$json_rows['yob'] = $row['yob'];
$json_rows['city'] = $row['city'];
$json_rows['bio'] = $row['bio'];
echo json_encode($json_rows);




//$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);

//echo json_encode($arr);

?>