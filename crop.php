<?php

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {

// require_once("image-upload.php");

$image = $_POST['imageLoc'];

list($width,$height,$type,$attr) = getimagesize($image);

// echo $width;
// var_dump($width);


$imgResizeHeight = $height / 650;

if ($width < 1200){
	$imgResizeWidth = 1;
} else {
	$imgResizeWidth = $width / 1200;
}

$dst_x = 0;
$dst_y = 0;
if ($width <= 1200) {
	$src_x = $_POST['left'] - (1200 - $width)/2;
	$src_y = $_POST['top'];
	$src_w = $_POST['width'];
	$src_h = $_POST['height'];
}

// The image is scaled down
if ($height > 650 || $width > 1200){
	// The image is scaled by height
	if ($width/$height < 1200/650){
		$newWidth = 650/$height * $width;
		$src_x = $imgResizeHeight * ($_POST['left'] - (1200 - $newWidth)/2);
		$src_y = $imgResizeHeight * $_POST['top'];
		$src_w = $imgResizeHeight * $_POST['width'];
		$src_h = $imgResizeHeight * $_POST['height'];
	} else {
		$src_x = $imgResizeWidth * $_POST['left'];
		$src_y = $imgResizeWidth * $_POST['top'];
		$src_w = $imgResizeWidth * $_POST['width'];
		$src_h = $imgResizeWidth * $_POST['height'];
	}
}
// 	width = 650/$height * $width
// 	height = 650
// 	$src_x = 

$dst_w = $_POST['width'];
$dst_h = $_POST['height'];
$profileName = $_POST['profileName'];
$profileNicknames = $_POST['profileNicknames'];
$profileAgenda = $_POST['profileAgenda'];

$dst_image = imagecreatetruecolor($dst_w, $dst_h);
$src_image = imagecreatefromjpeg($image);
imagecopyresampled($dst_image, $src_image, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);

require_once("profiles.php");

$count = count_images();
$finalImage = $count . ".jpg";

imagejpeg($dst_image, "img/" . $finalImage);

add_to_slideshow($profileName, $profileNicknames, $profileAgenda, $finalImage);

// }
?>