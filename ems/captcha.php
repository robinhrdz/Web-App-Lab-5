<?php 
session_start(); 
$text = rand(10000,99999); 
$_SESSION["vercode"] = $text; // store captcha code in session
$height = 25; 
$width = 65; 
   
$image_p = imagecreate($width, $height); 
$black = imagecolorallocate($image_p, 0, 0, 0); 
$white = imagecolorallocate($image_p, 255, 255, 255); 
$font_size = 14; 
   
imagestring($image_p, $font_size, 5, 5, $text, $white); 

// Output the image and save it to a file
header('Content-type: image/jpeg');
imagejpeg($image_p, null, 80);
imagejpeg($image_p, 'captcha.jpg', 80); // save image to file (optional)
imagedestroy($image_p); 
?>
