<?php

session_start();
$uid = $_SESSION["uid"];
echo $uid;
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
foreach ($_GET["band"] as $key => $value) {


	$conn->query("SET @flag = 0;");
	$editinterest=$conn->prepare("CALL create_or_edit_bands(?,?,@flag);");
	$editinterest->bind_param("ss",$uid,$value);
	$editinterest->execute();
	echo "done";
}


//$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);

//echo json_encode($arr);

?>