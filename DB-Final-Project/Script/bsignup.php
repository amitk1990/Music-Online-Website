<?php
$userid = $_GET["UserID"];
$uname = $_GET["uname"];
$pwd = $_GET["passwordenter"];
$yr = $_GET["year"];
$city = $_GET["city"];
$email = $_GET["email"];
$bio = $_GET["bio"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DbFinal";
		$conn = new mysqli($servername, $username, $password, $dbname);
	   if ($conn->connect_error) 
		{
	    die("Connection failed: " . $conn->connect_error);
		}
		if($userid!=" ")
		{
		$conn->query("SET @flag = 0;"); 
        $callsignup = $conn->prepare("CALL bsignup(?,?,?,?,?,?,now(),now(),?,@flag);");
		$callsignup-> bind_param("sssssss",$userid, $uname, $email, $yr, $city, $pwd, $bio);
		$callsignup->execute();
		}
		if (!($res = $conn->query("SELECT @flag as _p_out;"))) {
    	echo "Fetch failed:" ;
}
$row = $res->fetch_assoc();
$json_rows=array();
$json_rows['flag']=$row['_p_out'];
echo json_encode($json_rows);

/*
if ($row['_p_out']==1)
{
	header('Location: http://localhost/DB-Final-Project/userReg.html?registeration=registered');
}else
{
header('Location: http://localhost/DB-Final-Project/index.html');
}*/
?>