<?php
header ("Content-type: image/jpeg");
$image = imagecreatefromjpeg("images/landscape.jpg");


 $blanc = imagecolorallocate($image, 255, 255, 255);
 imagestring($image, 14, 200, 300, "Jean Forteroche", $blanc);
imagejpeg($image);
?>

