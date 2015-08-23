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
		<style>
		.ui-datepicker {
    height:auto ;
    
    width: 170px;
    font-size:9pt !important
}
		</style>	
		<script src="Script/jquery-ui.js"></script>
		<script type="text/javascript">
		$(document).ready(function(e){

			 $( "#accordion" ).accordion();
			 $('#accordion,.postsaved').hide();
		});	


		
		</script>
	</head>
 
<body id="index" class="home">
	<div class="wrapper">
		<div class="header">
			<img src="assets/logo.jpg" alt="logo" class="logo" />

			<div class="rightcontainer">
				
				<input type="button" class="edit" value="Edit Profile" id="editprofile" />
				<input type="button" class="edit alignleft" value="Home" id="homebutton" />
				<input type="button" class="logout" value="logout" id="logoutbutton" />
				<input type="button" class="searchbtn" value="Search" />
				<input type="text" class="searchBox" value="" placeholder="Search">

			</div>

		</div>
		<div class="nav">

		</div>
		<div class="Banner">
	
			<div class="left-content">
			</div>
			<div class="signUpDetails" id="concertTweet">

				<div class="concertInfo" id="concertfeed">

				<form name="bandPost" method="get"  id="publish">

					<ul>
						<li class="brow"><h1>Publish Concert</h1></li>
						<li class="brow"><span>Concert Name</span><input type="text" value=""  class="cname" name="cname" /></li>
						<li class="brow"><span>Genre Name</span>
						<input type="radio" value="g1" name="gname" class="radiobutton" style="margin-left:0px;"  />
						<label for="freejazz" class="genrename alignmarginleft">jazz</label>
						<label for="freejazz" class="subgname">free</label>

						<input type="radio" value="g2" name="gname" class="radiobutton" />
						<label for="freejazz" class="genrename alignmarginleft">jazz</label>
						<label for="freejazz" class="subgname">cool</label>
						
						<input type="radio" value="g3" name="gname" class="radiobutton"  />
						<label for="freejazz" class="genrename alignmarginleft">jazz</label>
						<label for="freejazz" class="subgname">bebob</label>

						<input type="radio" value="g4" name="gname" class="radiobutton"  />
						<label for="freejazz" class="genrename alignmarginleft">hip hop</label>
						<label for="freejazz" class="subgname">free</label>

						<input type="radio" value="g5" name="gname" class="radiobutton"  />
						<label for="freejazz" class="genrename alignmarginleft">hip hop</label>
						<label for="freejazz" class="subgname">cool</label>

						<input type="radio" value="g6" name="gname" class="radiobutton"  />
						<label for="freejazz" class="genrename alignmarginleft">hip hop</label>
						<label for="freejazz" class="subgname">bebob</label>
						</li>
						<li class="brow">
						<span>Venue</span>
						<select name="venuepost">
						<option value="">-Select-</option>
						<option value="loc1">location1, Brooklyn</option>
						<option value="loc2">Location2, Manhattan</option>
						<option value="loc3">Location3, Ozone Park</option>
						<option value="loc4">Location4, Bayridge</option>
						<option value="loc5">Location5, Long Island</option>
						<option value="loc6">Location3, Coney Island</option>
						</select>
						</li>
						<li class="brow"><span>Ticket Price</span><input type="text" value=""  class="cname" name="tprice" /></li>
						<li class="brow"><span>Date </span><input type="text" value=""  class="cname" name="date" id="datepicker" /></li>	
						<li class="brow"><span>Time </span><input type="text" value=""  class="cname" name="time" id="datepicker" style="float:left" /><span class="red" style="color:#fff;">(format : HH:MM:SS)</span></li>						
						<li class="brow"><input type="submit" value="Post" class="post " /></li>
						<li class="brow"><p class="postsaved red">You have Published your concert Successfully !!!</p></li>
					</ul>
				</form>

				<!---	<ul>1
						<li><span>Concert Name</span><span>Concert1</span></li>
						<li><span>Band Name</span><span>Band1</span></li>
						<li><span>Genre Name</span><span>Jazz</span></li>
						<li><span>Venue</span><span>New Jersey</span></li>
						<li><span>Ticket Sold</span><span>200</span></li>
					</ul> -->
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
			    		<label style="width:100px;">Bio</label>
			    		<textarea name="bio" id="editbio"></textarea>
			    		</li>
			    		<li class="settings">
			    		<input type="submit" value="Save" class="savebtn" id="savebtnper"/>
			    		</li>
			    	</ul>
			    </form>
			    <p class="datasaved">Your Data Has Been Saved Successfully !!!</p>
			  </div>
			  <h3>Band Type</h3>
			  <div>
			  <form name="interest" method="get" id="BandType" >
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
			    		<input type="submit" value="Save" class="savegenre"  />
			    	</li>
			   	</ul>
			   </form>
			    <p class="datasaved">Your Data Has Been Saved Successfully !!!</p>
			  </div>
			  
			  
			  
			 
</div>

			
		</div>
		<div class="content">
			<div class="left-content">
			</div>
			<div class="middle-content">
			<!--	<h1 style="text-decoration:underline" >ABOUT US</h1>
				<p>
				Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
				</p>-->
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
/*date picker*/
$(window).on('load',function(e){
			//alert("hi");
			 $( "#datepicker" ).datepicker({  dateFormat: "yy-mm-dd",showAnim : "blind"});
		});


/*on click of edit profile button*/
$('#editprofile').on('click',function(e){

					event.preventDefault();
					
				    
				    var values = $(this).serialize();
				    
				    /* Send the data using post and put the results in a div */
				    $.ajax({
				        url: "Script/beditpopulate.php",
				        type: "get",
				        data: values,
				        success: function(response){
					//	alert("success");
						var array = JSON.parse(response);

						var dbname=array.username;
						var dbpwd=array.pwd;
						var dbyob=array.yob;
						var dbcity=array.city;
						var dbbio=array.bio;


						$('#editname').attr('value',dbname);
						$('#edityob').attr('value',dbyob);
						$('#editpwd').attr('value',dbpwd);
						$('#editcity').attr('value',dbcity);
						$('#editbio').val(dbbio);		
						$('#concertfeed').hide();
						$('#accordion').show();
				        },
				        error:function(){
				            alert("failure");
				           
				        }
				    });


		});



/*edit profile personal using pedit.php*/
		$('#savepersonal').on('submit',function(e){


					event.preventDefault();
					
				     /* Get some values from elements on the page: */
				    var values = $(this).serialize();
				  //  alert(values);
				    /* Send the data using post and put the results in a div */
				    $.ajax({
				        url: "Script/bpedit.php",
				        type: "get",
				        data: values,
				        success: function(response){
						
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

document.location.href="http://localhost/DB-Final-Project/homePageArtist.php";
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
		            //alert("failure");
		            //$("#result").html('There is error while submit');
		        }
		    });

});

/*on click of edit profile interest*/

	$('#BandType').on('submit',function(e){


					event.preventDefault();
					
				  
				    var values = $(this).serialize();
				   // alert(values);
			
				    $.ajax({
				        url: "Script/beditbandtype.php",
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
/*$('#saveband').on('submit',function(e){


					event.preventDefault();
					
				  
				    var values = $(this).serialize();
				    alert(values);
			
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
				            //$("#result").html('There is error while submit');
				        }
				    });
	});*/


/*on click of band data*/
$('#publish').on('submit',function(e){


					event.preventDefault();
					
				  
				    var values = $(this).serialize();
				    //alert(values);
			
				    $.ajax({
				        url: "Script/bpost.php",
				        type: "get",
				        data: values,
				        success: function(response){
						//alert("success");

						var array=JSON.parse(response);
						if(array.flag==2)
						{
						$('.postsaved').text("You have Published your concert Successfully !!!");
						$('.postsaved').show();
				        }else
				        {
							$('.postsaved').text("Post not submitted");
							$('.postsaved').show();
				        }
				        },
				        error:function(){
				            alert("failure");
				            //$("#result").html('There is error while submit');
				        }
				    });
	});









/*hiding the data saved on successfully submission*/
		$('#accordion').on('click',function(e){

			$('#accordion').find('.datasaved').hide();
		});

			
	});

 
 
</script>
</html>