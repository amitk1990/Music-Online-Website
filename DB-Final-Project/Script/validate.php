<?php
/*session variable storage*/ 

$uname=$_GET['name1'];
session_start();
$_SESSION["uid"] = $uname;
$pwd=$_GET['password1'];

//echo $uname;

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

			header('Location: http://localhost/DB-Final-Project/homePage.php');

	}elseif($result->num_rows <= 0)
	{

		$validatequery1="SELECT BID FROM BAND WHERE BID='$uname' AND pwd='$pwd'";
	
		$result1 = $conn->query($validatequery1);
				if ($result1->num_rows > 0)
				{

					header('Location: http://localhost/DB-Final-Project/homePageArtist.php');
				}else
				{
					header('Location: http://localhost/DB-Final-Project/index.html?login=failed');
				}
	}
}
connectdb();
validator();
?>



