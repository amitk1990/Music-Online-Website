<?php
/*session variable storage*/ 

$uname=$_GET['name1'];
$pwd=$_GET['password1'];
session_start();
echo $uname;

//----------------------------------------------------------->
/*connecting to the database*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DbFinal";

$conn = new mysqli($servername, $username, $password, $dbname);
//$_SESSION["connection"]=$conn;
function connectdb()
{

global $servername,$username,$password,$dbname,$conn;

// Check connection
if ($conn->connect_error) 
	{
    die("Connection failed: " . $conn->connect_error);
	}
else
{
	//echo "connection success";
}
}



function validator()
{
	global $uname,$pwd,$conn;


	$validatequery="SELECT USERID FROM USER WHERE USERID='$uname' AND pwd='$pwd'";
	
	$result = $conn->query($validatequery);
	if ($result->num_rows > 0) {
		
	}else
	{
		header('Location: http://localhost/DB-Final-Project/index.html');
	}
}
connectdb();
validator();
?>



