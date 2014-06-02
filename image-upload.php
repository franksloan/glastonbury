<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Glastonbury Hall of Fame</title>
	<link rel="stylesheet" href="css/normalize.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
	<link href='http://fonts.googleapis.com/css?family=Lato:400,300italic' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale = 1.0">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script src="cropbox.js"></script>
</head>

<body>

<?php

// FORM HANDLING

$profileName = htmlspecialchars($_POST["name"]);
$profileNicknames = htmlspecialchars($_POST["nicknames"]);
$profileAgenda = htmlspecialchars($_POST["agenda"]);

// FILE HANDLING

$fileName = $_FILES["uploaded_file"]["name"];
$fileTmpLoc = $_FILES["uploaded_file"]["tmp_name"];
$fileType = $_FILES["uploaded_file"]["type"];
$fileSize = $_FILES["uploaded_file"]["size"];
$fileErrorMsg = $_FILES["uploaded_file"]["error"];
$allowedExts = array("jpeg", "jpg");
$temp = explode(".", $_FILES["uploaded_file"]["name"]);
$extension = end($temp);

// Error Handling

if(!$fileTmpLoc) {
	echo "ERROR: Please select a file before clicking submit.";
	exit();
} else if($fileSize > 5242880) {
	echo "File is waaayyy too large, under 5 mbs please!";
	unlink($fileTmpLoc);
	exit();
} else if(!in_array($extension,$allowedExts)){
	echo "Please choose a jpg";
	unlink($fileTmpLoc);
} else if($fileErrorMsg == 1){
	echo "Error processing file, please retry!";
	exit();
}


$moveResult = move_uploaded_file($fileTmpLoc, "img/temp/$fileName");

if($moveResult != true){
	echo "File not uploaded, try again please";
	unlink($fileTmpLoc);
	exit();
}
?>
	<div class="box">
		<div id="upload">
			<h2>Crop and resize your legend's picture and hit Go!</h2>
		</div>

		<div class="clearfix">			
			<div id='containerbox' class='grid_main'>
				<img id="tempLoc" src="img/temp/<?php echo $fileName; ?>">
			 	<div id='cropbox'></div>
			 	<p class="name"><?php echo $profileName; ?></p>
			 	<p class="nicknames"><?php echo $profileNicknames; ?></p>
			 	<p class="agenda"><?php echo $profileAgenda; ?></p>
			</div>
		</div>

		<div id="footer" class="grid_footer">
			<button class='button' id='crop_button'>Go</input>
		</div>
	</div>

	<script>
		var $image = $("img");
		var $containerbox = $("#containerbox");
		var iWidth = $image.width();
		var iHeight = $image.height();

		if (iWidth < 1200 || iHeight <650) {
	 	 	$containerbox.css('height', iHeight);
		}
	</script>

</body>

</html>