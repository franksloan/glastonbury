<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Glastonbury Hall of Fame</title>
	<link rel="stylesheet" href="css/normalize.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
	<link href='http://fonts.googleapis.com/css?family=Lato:400,300italic' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale = 1.0">
</head>
<?php 
	require_once("profiles.php");

	$profiles = get_profiles();
?>

<body>
	<div class="container clearfix">
		<div id="logo" class="grid_logo">
			<img src="img/logo.jpg">			
		</div>
		
		<div id="header" class="grid_header">
			<h1> Hall of fame 2014</h1>
		</div>

		<div id="intro-slider" class="wmuSlider grid_main omega">
			<div class="wmuSliderWrapper">
								
				<?php foreach($profiles as $profile) {
					include("partial-list-profiles.html.php");
				}
				?>
				
			</div>
		</div>

		<div id="form">
			<button class="button" type="button">Upload a Legend!</button>
			<form class="upload_form" enctype="multipart/form-data" action="image-upload.php" method="post">
				<ul>
					<li>
						<h4>Upload a legend</h4>
					</li>
					<li>
						<label>Name:</label>
						<input class="textinput" type="text" name="name" required>
					</li>
					<li>
						<label>Nicknames:</label>
						<input class="textinput" type="text" name="nicknames" required>
					</li>
					<li>
						<label>Agenda:</label>
						<textarea class="textinput" name="agenda" maxlength="200" required></textarea>
					</li>
					<li>
						<label class="upload_button">Image:</label>
						<input class="file_button" name="uploaded_file" type="file">
					</li>
					<li>
						<input class="button" type="submit" value"upload">
					</li>
			</form>

		</div>

		<div id="footer" class="grid_footer">
			<a href="https://www.facebook.com/francis.sloan" target="_blank"><img src="img/facebook.svg"></a>
			<a href="https://twitter.com/FrancisSloan" target="_blank"><img src="img/twitter.svg"></a>
		</div>
	</div>
	
	<script src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.wmuSlider.min.js"></script>
	<script src="external/matchmedia.js"></script>
	<script src="picturefill.js"></script>

    <script src="jquery.fitvids.js"></script>
 	<script src="jquery.fittext.js"></script>

    <script>               
          var options = {navigationControl: false, animation: "slide"};
          $(".wmuSlider").wmuSlider(options);

          var $imageOverlay = $('<div id="overlay"></div>');
          var $caption = $("<p></p>");
          
          $imageOverlay.append($caption);
	      $(".wmuSliderWrapper").append($imageOverlay);
	      

	      $(".wmuSliderWrapper").hover(function(){     	
	      	$imageOverlay.show();
	      	$(".textbox p").css("display", "inline")
	      }, function(){
	      	$imageOverlay.hide();
	      	$(".textbox p").css("display", "none")
	      });
	      
	      $("button").click(function(){
	        $("button").css("display", "none");
	        $(".upload_form").css("display", "inline-block");
	      });

	      $(".wmuSliderWrapper").click(function(){
	      	$("button").css("display", "inline");
	      	$("form").css("display", "none");
	      });

	      $(".file_button").click(function(){
	        $(".file_button").css("width", "240px")
	      });

     </script>
</body>
</html>