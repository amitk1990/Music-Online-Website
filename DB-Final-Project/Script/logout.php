<?php

session_start();
$uid = $_SESSION['uid'];
echo $uid;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DbFinal";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{
die("Connection failed: " . $conn->connect_error);
}

$myquery = $conn->prepare("select * from user where userid = ?");
$myquery -> bind_param("s",$uid);
$myquery -> execute();
$count = 0;
while($myquery->fetch())
{$count++;}
if($count>0)
{
	echo "user";
	echo $uid;
	echo $count;
	$update = $conn-> prepare("update user set lastlogin = now() where userid = ?;");
	$update-> bind_param("s",$uid);
	$update -> execute();
}
else
{
	echo "band";
	$bupdate = $conn-> prepare("update band set lastlogin = now() where bid = ?;");
	$bupdate-> bind_param("s",$uid);
	$bupdate -> execute();
}
//session_destroy();
echo "success";

?>