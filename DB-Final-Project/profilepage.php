<?php
//$userId = $_GET["name1"];
session_start();
//$_SESSION["uid"] = $userId;
//echo $_SESSION["uid"]; 
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Musical Connection</title>
 		<link rel="stylesheet" href="css/style.css" type="text/css" />
 		<script type="text/javascript" src="Script/jquery.js"></script>
		<link rel="stylesheet" href="css/jquery-ui.css">
		
		<script src="Script/jquery-ui.js"></script>
		<script type="text/javascript">
		$(document).ready(function(e){

			 $( "#accordion" ).accordion();
			 $('#accordion').hide();
				$(window).on('load',function(e){
					$('#datapublish').hide();
				});
			});	
    		
  	
		</script>
		<style>
		.ui-datepicker {
			    height:auto ;
			    
			    width: 170px;
			    font-size:9pt !important
			}
		</style>
	</head>
 
<body id="index" class="home">
	<div class="wrapper">
		<div class="header">

			<img src="assets/logo.jpg" alt="logo" class="logo" />

			<div class="rightcontainer">
				
				<input type="button" class="edit" value="Home" id="homebutton" />
				<input type="button" class="logout" value="logout" id="logoutbutton" />

			</div>

		</div>
		<div class="nav">

		</div>
		<div class="Banner">
	
			<div class="left-content">
			</div>
			<div class="signUpDetails" id="concertTweet">

				<!-- <div class="concertInfo" id="concertfeed">
					<ul>
						<li><span>Concert Name</span><span>Concert1</span></li>
						<li><span>Band Name</span><span>Band1</span></li>
						<li><span>Genre Name</span><span>Jazz</span></li>
						<li><span>Venue</span><span>New Jersey</span></li>
						<li><span>Ticket Sold</span><span>200</span></li>
					</ul>
				</div> -->
				<div class="profileContainer" id="concertfeed" style="overflow:auto;">
			
						<ul>
						<li class="profiledet">

								<span class="pname">Hello <?php $uid = $_SESSION['uid']; echo $uid; ?> !!</span>
						</li>
											
						</ul>
					
					<ul>
						<li class="listofRecommender"><h1>List of Recommended Users</h1></li>
						<?php
						
						$uid = $_SESSION['uid'];
						//$cid = "user1";//$_GET['dname']
						echo "<form name='profiledetails' method='get' id='follower' action='Script/bandfan.php' >";
						$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "DbFinal";
						$conn = new mysqli($servername, $username, $password, $dbname);
						if ($conn->connect_error) 
							{
							die("Connection failed: " . $conn->connect_error);
							}
							$query = $conn -> prepare("call sys_rec1(?);");
							$query->bind_param("s",$uid);
							$query->execute();
							$result = $query->get_result();
							if ($result->num_rows > 0){
								while ($row = $result->fetch_assoc())
								{
								$users=$row['bid'];
								echo "<li class='listofRecommender'>";
								echo "<span class='NAMES' >".$users."</span>";
								echo "<input type='submit' name='Follow' class='followButton' value='".$users."' id='submitfollow' />";
								
								}
							}
							echo "</form>";
							?>
							
							<?php 

						echo "<form name='profiledetails' method='get' id='follower' action='Script/follow.php' >";
						$uid = $_SESSION['uid'];
						//$cid = "user1";//$_GET['dname']
						$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "DbFinal";
						$conn = new mysqli($servername, $username, $password, $dbname);
						if ($conn->connect_error) 
							{
							die("Connection failed: " . $conn->connect_error);
							}
							$query1 = $conn -> prepare("call sys(?);");
							$query1->bind_param("s",$uid);
							$query1->execute();
							$result = $query1->get_result();
							if ($result->num_rows > 0){
								while ($row = $result->fetch_assoc())
								{
								$users=$row['userid'];
								echo "<li class='listofRecommender'>";
								echo "<span class='NAMES' >".$users."</span>";
								echo "<input type='submit' name='Follow' class='followButton' value='".$users."' id='submitfollow' />";
								
								}
							}
						echo "</form>";
						?>
						
								
						
						</li>
					</ul>

					<ul>
						<li class="listofRecommender"><h1>List of Recommended Concerts</h1></li>
						<?php 
						$uid = $_SESSION['uid'];
						//$cid = "user1";//$_GET['dname']
						$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "DbFinal";
						$conn = new mysqli($servername, $username, $password, $dbname);
						if ($conn->connect_error) 
							{
							die("Connection failed: " . $conn->connect_error);
							}
						$call = $conn-> prepare("call rec_concert(?)");
						$call->bind_param("s",$uid);
						$call->execute();
						$result = $call->get_result();
						if($result->num_rows>0)
						{
							while ($row = $result->fetch_assoc())
							{
								echo '<li class="listofRecommender">';
								echo '<span class="rconc">'.$row['cid'].'</span></li>';
							}
						}

						
					 ?>
					</ul>
					<form name="userPublish" method="get" id="publishConcert">
					<p class="red" id="datapublish">You have Published your concert Successfully !!!</p>
					<ul>
						<li class="brow widthbrow"><h1>Publish Concert</h1></li>
						<li class="brow widthbrow"><span style="color:#fff;float:left;">Concert Name</span><input type="text" value=""  class="cname" style="float:left;" name="cname" /></li>
						<li class="brow widthbrow"><span style="color:#fff;float:left;">Band Name</span><input type="text" value=""  class="cname" style="float:left;" name="bname" /></li>
						<li class="brow widthbrow"><span style="color:#fff;float:left;">Genre Name</span>
						<input type="radio" value="g1" name="gname" class="radiobutton" style="margin-left:0px;"  />
						<label for="freejazz" class="genrename alignmarginleft white">jazz</label>
						<label for="freejazz" class="subgname white">free</label>

						<input type="radio" value="g2" name="gname" class="radiobutton" />
						<label for="freejazz" class="genrename alignmarginleft white">jazz</label>
						<label for="freejazz" class="subgname white">cool</label>
						
						<input type="radio" value="g3" name="gname" class="radiobutton"  />
						<label for="freejazz" class="genrename alignmarginleft white">jazz</label>
						<label for="freejazz" class="subgname white">bebob</label>

						<input type="radio" value="g4" name="gname" class="radiobutton"  />
						<label for="freejazz" class="genrename alignmarginleft white">hip hop</label>
						<label for="freejazz" class="subgname white">free</label>

						<input type="radio" value="g5" name="gname" class="radiobutton"  />
						<label for="freejazz" class="genrename alignmarginleft white">hip hop</label>
						<label for="freejazz" class="subgname white">cool</label>

						<input type="radio" value="g6" name="gname" class="radiobutton"  />
						<label for="freejazz" class="genrename alignmarginleft white">hip hop</label>
						<label for="freejazz" class="subgname white">bebob</label>
						</li>
						<li class="brow widthbrow">
						<span class="white">Venue</span>
						<select name="venuepost" style="float:left;">
						<option value="">-Select-</option>
						<option value="loc1">location1, Brooklyn</option>
						<option value="loc2">Location2, Manhattan</option>
						<option value="loc3">Location3, Ozone Park</option>
						<option value="loc4">Location4, Bayridge</option>
						<option value="loc5">Location5, Long Island</option>
						<option value="loc6">Location3, Coney Island</option>
						</select>
						</li>
						<li class="brow widthbrow"><span class="white">Ticket Price</span><input type="text" value=""  class="cname" name="tprice" /></li>
					<li class="brow widthbrow"><span class="white">Date </span><input type="text" value=""  class="cname" name="date" id="datepicker" /></li>	
						<li class="brow widthbrow"><span class="white">Time </span><input type="text" value=""  class="cname" name="time" id="datepicker" style="float:left" /><span class="red" style="color:#fff;">(format : HH:MM:SS)</span></li>						
						<li class="brow widthbrow"><input type="submit" value="Post" class="post " /></li>
						<li class="brow widthbrow"></li>
			</ul>
				</form>	
				<form name="addpost" action="Script/add.php" method="get">
				
				<ul>
				<li class="brow widthbrow"><h1>Post Message</h1></li>
				<li class="brow widthbrow"><span class="white"> Message</span><textarea name="mess"> </textarea></li>
				<li class="brow widthbrow"><input type="submit" value="Submit"/></li>
				</ul>

				</form>
				</div>
					
			
			  
			 
</div>

			
		</div>
		<div class="content">
			<div class="left-content">
			</div>
			<div class="middle-content">
				<h1 style="text-decoration:underline" >ABOUT US</h1>
				<p>Connect through your musical tastes... </p>
			</div>
			<div class="right-content">
				<h1 style="margin-top:32px;text-decoration:underline">Latest Upcoming Events </h1>
					<h2>New York City Music festival</h2>
					<h2>November 30 ,2014 </h2>
					<h2>Venue : Madison Square Garden</h2>
			</div>

		</div>
		<div class="footer">
			<div class="left-content wifooterdthalign">
				<h1>Subscribe to Us</h1>
				<a href="mailto:amitk26467@gmail.com">musicalConnections@gmail.com</a>
			</div>
			<div class="left-content wifooterdthalign" style="margin-left:0px">
				<h1>Contact Us</h1>
				<h2>123-456-7890</h2>
			</div>
			<div class="left-content social-network" style="margin-left:0px">
				<h1>Follow Us</h1>
				<a href="https://www.facebook.com/Connectionsoriginalmusicall" class="socialnet" style="clear:left"></a>
				<a href="https://twitter.com/music" class="socialnet twitter"></a>
				<a href="http://www.youtube.com/user/FlyingBalalaikaBros" class="socialnet youtube"></a>
			</div>
			<div class="left-content wifooterdthalign" style="margin-left:0px">
				<h2 style="margin-top:0px;font-size:14px">Copyrights reserved 2014.</h2>
				<h2 style="margin-top:5px;font-size:10px">Developed and managed by Amit and Chaithra</h2>


			</div>

		</div>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function(e){

	$(window).on('load',function(e){
			//alert("hi");
			 $( "#datepicker" ).datepicker({  dateFormat: "yy-mm-dd",showAnim : "blind"});
		});

		//$( "#editprofiletab" ).accordion();
/*		$('#homeprofile').on('click',function(e){
			$document.location.href="http://localhost/DB-Final-Project/homePage.html";

		});
*/
$('#homebutton').on('click',function(e){

document.location.href="http://localhost/DB-Final-Project/homePage.php";
});

$('#logoutbutton').on('click',function(e){

		var values = $(this).serialize();
		$.ajax({
		        url: "Script/logout.php",
		        type: "get",
		        data: values,
		        cache:false,
		        success: function(){
				//alert("success");
				document.location.href="http://localhost/DB-Final-Project/index.html";
				
               
				
		        },
		        error:function(){
		            alert("failure");
		            //$("#result").html('There is error while submit');
		        }
		    });

});

		/*$('#follower').on('submit',function(e){

			event.preventDefault();
					
				  
				    var values = $(this).serialize();
				    //alert(values);
			
				    $.ajax({
				        url: "Script/editband.php",
				        type: "get",
				        data: values,
				        success: function(results){
						alert("success");
						//var results1=JSON.parse(results);
						//alert(results1.a);
						$('.datasaved').show();
				        },
				        error:function(){
				            alert("failure");
				            
				        }
				    });
		});*/

$('#publishConcert').on('submit',function(e){


		var values = $(this).serialize();
		//alert(values);
		$.ajax({
		        url: "Script/upost.php",
		        type: "get",
		        data: values,
		        cache:false,
		        success: function(response){
			
				var result=JSON.parse(response);
				var flagres=result.flag;

				if (flagres!=10) {
				$('#datapublish').text('You have Published your concert Successfully !!!');
				$('#datapublish').show();
				
				}else{
					$('#datapublish').text("You are not permitted to post yet !!");	
					$('#datapublish').show();
				}
               
				
		        },
		        error:function(){
		            alert("failure");
		            //$("#result").html('There is error while submit');
		        }
		    });

});



	



			
	});
</script>
</html>