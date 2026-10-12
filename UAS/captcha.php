<?php
session_start();

$captcha = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"),0,5);

$_SESSION['captcha'] = $captcha;

header("Content-type: image/png");

$image = imagecreate(150,50);

$bg = imagecolorallocate($image,240,240,240);
$text = imagecolorallocate($image,0,0,0);

for($i=0;$i<10;$i++)
{
    imageline(
        $image,
        rand(0,150),
        rand(0,50),
        rand(0,150),
        rand(0,50),
        $text
    );
}

imagestring(
    $image,
    5,
    45,
    18,
    $captcha,
    $text
);

imagepng($image);
imagedestroy($image);
?>