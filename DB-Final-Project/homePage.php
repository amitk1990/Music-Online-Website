<?php
//$userId = $_GET["name1"];
session_start();
$uid =$_SESSION['uid'];
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
		});	
    	$(window).on('load',function(e){
    	//alert("hi");
    });
  	
		</script>
	</head>
 
<body id="index" class="home">
	<div class="wrapper">
		<div class="header">
			<img src="assets/logo.jpg" alt="logo" class="logo" />

			<div class="rightcontainer">
				
				<?php 

				echo "<input type='button' class='logout' value='".$uid."' id='profuser' />"; 

				?>
				<input type="button" class="edit alignleft" value="Home" id="homebutton" />
				<input type="button" class="logout" value="logout" id="logoutbutton" />
				<form name="search" method="get" id="searchres">
				<input type="submit" class="searchbtn"  value="Search"  />
				<input type="text" class="searchBox" name="search" value="" placeholder="Search">
				</form>
				<input type="button" class="edit" value="Edit Profile" id="editprofile" />

			</div>

		</div>
		<div class="nav">

		</div>
		<div class="Banner">
	
			<div class="left-content">
			</div>
			<div class="signUpDetails" id="concertTweet">

				<div class="concertInfo" id="concertfeed">
				

				<?php

					//$uid =$_SESSION['uid'];
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "DbFinal";
					$conn = new mysqli($servername, $username, $password, $dbname);
					if ($conn->connect_error) 
					{
					die("Connection failed: " . $conn->connect_error);
					}

					$query = $conn -> prepare("call news_feed(?);");
					$query->bind_param("s",$uid);
					$query->execute();
					$result = $query->get_result();

					if ($result->num_rows > 0){
					$counter=0;
					while ($row = $result->fetch_assoc())
					{
						echo "<ul class='tweets' id='tweets".$counter."'>";
						$concert = $row["cid"];
						$bname=$row['bid'];
						$location=$row['venue'];
						$tprice=$row['tprice'];
						$gname=$row['gname'];
						$subname=$row['subgname'];
						$_SESSION['cid']=$concert;
			echo '<li style="width:175px" class="row1"><label>Concert: </label><button  class="conclick">'.$concert.'</button><!--<span class="likimg">&lt;&lt Like it</span>--></</li>';
			echo '<li style="width:180px" class="row2"><label>Band played by</label><span class="sname">'.$bname.'</span></li>';
			echo '<li style="width:104px" class="row3"><label>Come to </label><span class="sloc">'.$location.'</span></li>';
			echo '<li style="width:105px" class="row4"><label>Price is </label><span class="sprice">$'.$tprice.'</span></li>';
			echo '<li style="width:170px" class="row5"><label>Concert genree</label><span class="sgname">'.$gname.'</span></li>';
			echo '<li style="width:200px" class="row6"><label>Sub genre</label><span class="ssub">'.$subname.'</span></li>';
			echo "</ul>";
			$counter++;
					}

					
					}
					else{echo "<h1 class='white'>No upcoming concerts !!!!..</h1>";}

				?>


				</div>

			
					
			<div class="editprofile" id="accordion">
			  <h3>Personal</h3>
			  <div>
			    
			    <form name="editform" method="get" id="savepersonal" >
			    	<ul>
			    		<li class="settings">
			    		<label style="width:100px;">UserName</label>
			    		<input type="text" value="" class="htextbox" name="newname" id="editname" />
			    		</li>
			    		<li class="settings">
			    		<label style="width:100px;">Year Of Birth</label>
			    		<input type="text" value="" class="htextbox" name="newyear" id="edityob" />
			    		</li>
			    		<li class="settings">
			    		<label style="width:100px;">City</label>
			    		<input type="text" value="" class="htextbox" name="newcity" id="editcity" />
			    		</li>
			    		<li class="settings">
			    		<label style="width:100px;">Password</label>
			    		<input type="password" value="" class="htextbox" name="newpwd" id="editpwd" />
			    		</li>
			    		<li class="settings">
			    		<input type="submit" value="Save" class="savebtn" id="savebtnper"/>
			    		</li>
			    	</ul>
			    </form>
			    <p class="datasaved">Your Data Has Been Saved Successfully !!!</p>
			  </div>
			  <h3>Interests</h3>
			  <div>
			  <form name="interest" method="get" id="interestForm" >
			   	<ul>
			   		<li class="settings">
			   						<label for="Genre" style="clear:left;">
										Genre
									</label>
					</li>
					<li class="settings">
						<input type="checkbox" value="g1" name="genre[]" class="checkboxgenre" />
						<label for="freejazz" class="genrename">jazz</label>
						<label for="freejazz">free</label>
					</li>
					<li class="settings">
						<input type="checkbox" value="g2" name="genre[]" class="checkboxgenre" />
						<label for="cooljazz" class="genrename">jazz</label>
						<label for="cooljazz">cool</label>
					</li>
					<li class="settings">
						<input type="checkbox" value="g3" name="genre[]" class="checkboxgenre" />
						<label for="bebob" class="genrename">jazz</label>
						<label for="bebob">bebob</label>
					</li>
					<li class="settings">
						<input type="checkbox" value="g4" name="genre[]" class="checkboxgenre" />
						<label for="freehiphop" class="genrename">hiphop</label>
						<label for="freehiphop">free</label>
					</li>
					<li class="settings">
						<input type="checkbox" value="g5" name="genre[]" class="checkboxgenre" />
						<label for="coolhiphop" class="genrename">hiphop</label>
						<label for="coolhiphop">cool</label>
					</li>
					<li class="settings">
						<input type="checkbox" value="g6" name="genre[]" class="checkboxgenre" />
						<label for="hiphopbebob" class="genrename">hiphop</label>
						<label for="hiphopbebob">bebob</label>
					</li>
					<li class="settings">
			    		<input type="submit" value="Save" class="savegenre"  />
			    	</li>
			   	</ul>
			   </form>
			    <p class="datasaved">Your Data Has Been Saved Successfully !!!</p>
			  </div>
			  <h3>Bands</h3>
			  <div>
					  	<form name="editform" method="get" id="saveband" >
					  	<div style="height:200px;overflow:auto;">
					    	<ul id="appendbands">
					    	<!--	<li class="settings">
					    		<input type="checkbox" value="band1" name="band[]" class="checkboxgenre" />
								<label for="b2" class="genrename">band1</label>
					    		</li>
					    		<li class="settings">
					    		<input type="checkbox" value="band2" name="band[]" class="checkboxgenre" />
								<label for="b1" class="genrename">band2</label>
					    		</li>
					    		<li class="settings">
					    		<input type="checkbox" value="band3" name="band[]" class="checkboxgenre" />
								<label for="b1" class="genrename">band3</label>
					    		</li>
					    		<li class="settings">
					    		<input type="checkbox" value="band4" name="band[]" class="checkboxgenre" />
								<label for="b1" class="genrename">band4</label>
					    		</li>
					    		<li class="settings">
					    		<input type="checkbox" value="band5" name="band[]" class="checkboxgenre" />
								<label for="b1" class="genrename">band5</label>
					    		</li>
					    		<li class="settings">
						    	<input type="submit" value="Save" class="savegenre"  />
						    	</li>-->
					    		
					    	</ul>
					    	</div>
					    </form>
					    <p class="datasaved">Your Data Has Been Saved Successfully !!!</p>
			  </div>
			  
			 
</div>

			
		</div>
		<div class="content">
			<div class="left-content">
			</div>
			<div class="middle-content">
				<!--<h1 style="text-decoration:underline" >ABOUT US</h1>
				<p>Connect through your musical tastes... </p>-->
			</div>
			<div class="right-content">
			<!--	<h1 style="margin-top:32px;text-decoration:underline">Latest Upcoming Events </h1>
					<h2>New York City Music festival</h2>
					<h2>November 31 ,2014 </h2>
					<h2>Venue : Madison Square Garden</h2>-->
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

/*on click of edit profile button*/
		$('#editprofile').on('click',function(e){

					event.preventDefault();
					
				   
				    var values = $(this).serialize();
				    
				    $.ajax({
				        url: "Script/editpopulate.php",
				        type: "get",
				        data: values,
				        success: function(response){
						//alert("success");
						var array = JSON.parse(response);

						var dbname=array.username;
						var dbpwd=array.pswd;
						var dbyob=array.yob;
						var dbcity=array.city;
						var len=array.bands.length;
						console.log("hi"+len);
						//var dbband1=array.band.length;
						console.log(Object.keys(array).length);
						//console.log(array.band.length);
						for(var i=0;i<array.bands.length;i++)
						{
							console.log(array.bands[i]);
							$('#appendbands').append('<li class="settings"><input type="checkbox" value="band1" name="band[]" class="checkboxgenre" /><label for="b2" class="genrename">'+array.bands[i]+'</label></li>');
						}
						$('#appendbands').append('<li class="settings"><input type="submit" value="Save" class="savegenre"  /></li>');
						$('#editname').attr('value',dbname);
						$('#edityob').attr('value',dbyob);
						$('#editpwd').attr('value',dbpwd);
						$('#editcity').attr('value',dbcity);
								
						$('#concertfeed').hide();
						$('#accordion').show();
				        },
				        error:function(){
				            alert("failure");
				            //$("#result").html('There is error while submit');
				        }
				    });


		});




/*edit profile personal using pedit.php*/
		$('#savepersonal').on('submit',function(e){


					event.preventDefault();
					
				     /* Get some values from elements on the page: */
				    var values = $(this).serialize();
				    //alert(values);
				    /* Send the data using post and put the results in a div */
				    $.ajax({
				        url: "Script/pedit.php",
				        type: "get",
				        data: values,
				        success: function(){
						
						$('.datasaved').show();
						
				        },
				        error:function(){
				            alert("failure");
				            //$("#result").html('There is error while submit');
				        }
				    });
		});


/*jquery home page traversal*/
$('#homebutton').on('click',function(e){

document.location.href="http://localhost/DB-Final-Project/homePage.php";
});

/*jquery logout via ajax*/
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

/*on click of edit profile interest*/

	$('#interestForm').on('submit',function(e){


					event.preventDefault();
					
				  
				    var values = $(this).serialize();
				    //alert(values);
			
				    $.ajax({
				        url: "Script/editinterest.php",
				        type: "get",
				        data: values,
				        success: function(results){
						//alert("success");
						//var results1=JSON.parse(results);
						//alert(results1.a);
						$('.datasaved').show();
				        },
				        error:function(){
				            alert("failure");
				            //$("#result").html('There is error while submit');
				        }
				    });
	});




/*on click of save the band data is saved*/
$('#saveband').on('submit',function(e){


					event.preventDefault();
					
				  
				    var values = $(this).serialize();
				    //alert(values);
			
				    $.ajax({
				        url: "Script/editband.php",
				        type: "get",
				        data: values,
				        success: function(results){
						//alert("success");
						//var results1=JSON.parse(results);
						//alert(results1.a);
						$('.datasaved').show();
				        },
				        error:function(){
				            alert("failure");
				            
				        }
				    });
	});

/*on click of search button*/


$('#searchres').on('submit',function(e){

					event.preventDefault();
					
				    var values = $(this).serialize();
				  //  alert(values);
				  
				    $.ajax({
				        url: "Script/search.php",
				        type: "get",
				        data: values,
				        dataType:"json",
				        success: function(response){
						//alert("success");
						console.log(response);
						
						//alert(response[0].cid);
					//	alert(response.length);
						//$('#concertfeed').find('ul').empty();
						counter=0;
						$('#concertfeed').find('ul').remove();
						
						for(var i=0;i<response.length;i++)
						{
						var cid=response[i].cid;
						var bid=response[i].bid;
						var venue=response[i].venue;
						var price=response[i].tprice;
						var gname=response[i].gname;
						var subgname=response[i].subgname;
					
						
						//$('#concertfeed').append('<ul class="tweets" id="tweets'+i+'"><li>'+cid+'</li></ul>')
						$('#concertfeed').append('<ul class="tweets" id="tweets'+i+'"><li style="width:175px" class="row1"><label>Concert: </label><button class="conclick">'+cid+'</button></li><li style="width:180px" class="row2"><label>Band played by</label><span class="sname">'+bid+'</span></li><li style="width:104px" class="row3"><label>Come to </label><span class="sloc">'+venue+'</span></li><li style="width:105px" class="row4"><label>Price is </label><span class="sprice">$'+price+'</span></li><li style="width:170px" class="row5"><label>Concert genree</label><span class="sgname">'+gname+'</span></li><li style="width:200px" class="row6"><label>concert subgenre</label><span class="ssub">'+subgname+'</span></li></ul>');
						
						/*$('#tweets'+i).each(function(e){
							$(this).find('.row1').find('button').html(cid);
							$(this).find('.row2').find('.sname').text(bid);
							$(this).find('.row3').find('.sloc').text(venue);
							$(this).find('.row4').find('.sprice').text(price);
							$(this).find('.row5').find('.sgname').text(gname);
							$(this).find('.row6').find('.ssub').text(subgname);
						
						});*/
						counter++;
						console.log(counter)
						
						}

				        },
				        error:function(){
				            //alert("failure");
				            $('#concertfeed').find('ul').remove();
				            //$("#result").html('There is error while submit');
				        }
				    });


});

















/*concert click*/

$(document).on('click','.conclick',function(e){
	//alert("hi");
	//var location=$(this).attr('href');
	var conname=$(this).text();
	var newlink="http://localhost/DB-Final-Project/rating.html?cname="+conname;
	document.location.href=newlink;
	//alert(newlink);
	console.log(newlink);
});

$('.conclick').on('click',function(e){
	//alert("hi");
	//var location=$(this).attr('href');
	var conname=$(this).text();
	var newlink="http://localhost/DB-Final-Project/rating.html?cname="+conname;
	document.location.href=newlink;
//	alert(newlink);
	console.log(newlink);
});





/*hiding the data saved on successfully submission*/
		$('#accordion').on('click',function(e){

			$('#accordion').find('.datasaved').hide();
		});

			
	});

	$('#profuser').on('click',function(e){

		document.location.href="http://localhost/DB-Final-Project/profilepage.php";
	});

 
 
</script>
</html>