<?php
header ("Content-type: image/jpeg");
$image = imagecreatefromjpeg("../../public/images/landscape.jpg");
$blanc = imagecolorallocate($image, 255, 255, 255);
imagestring($image, 5, 1700, 450, "Jean Forteroche", $blanc);
imagejpeg($image);
?>

