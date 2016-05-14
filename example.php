<?php
	include 'connect.php';
	include 'functions.php';
	$time=date("Y-m-d H:i:s");
	$p=mysql_query("select `percentage` as perc from `scores` where `username`='$username' and `date_time`='$time'");
	$pe=mysql_fetch_object($p);
	$percentage=$pe->perc;
	$ang=($percentage/100)*360;
    $image = imagecreatetruecolor(100,100);
    imagesavealpha($image,true);
    $color=imagecolorallocatealpha($image,0,0,0,127);
    imagefill($image,0,0,$color);
    $white    = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);
    $navy     = imagecolorallocate($image, 0x00, 0x00, 0x80);
    $darknavy = imagecolorallocate($image, 0x00, 0x00, 0x50);
    $red      = imagecolorallocate($image, 0xFF, 0x00, 0x00);
    $darkred  = imagecolorallocate($image, 0x90, 0x00, 0x00);
    for ($i = 60; $i > 50; $i--)
   {
        imagefilledarc($image, 50, $i, 100, 50, 0, $ang, $darknavy, IMG_ARC_PIE);
        imagefilledarc($image, 50, $i, 100, 50, $ang, 360, $darkred,  IMG_ARC_PIE);
    }
    imagefilledarc($image, 50, 50, 100, 50, 0, $ang, $navy, IMG_ARC_PIE);
    imagefilledarc($image, 50, 50, 100, 50, $ang, 360, $red,  IMG_ARC_PIE);
    header('Content-type: image/png');
    imagepng($image);
    imagedestroy($image);
?>