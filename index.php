<?php
// include composer autoload
require 'vendor/autoload.php';

// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

// configure with favored image driver (gd by default)
Image::configure(['driver' => 'imagick']);

// ==========================================================

// open an image file
$img = Image::make('D:\Coding\Installed Program\xampp\htdocs\Projects\Raw-PHP\intervention_image\public\1.jpg');

// fixed ratio
$width = 520;
$height = 580;

$img
    ->resize(
        $width,
        $height,
        function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        }
    );
// Add a background canvas to the image
$img
    ->resizeCanvas(
        $width,
        $height,
        'center', // centre the image on the canves
        false, // don't apply relative mode 
        '#FFA500' // add a white background to the image
    );


$img->save('public/1-out.jpg');

echo 'OLD <br>';
echo '<img src="public/1.jpg" alt="">';
echo '<br><br>NEW<br>';
echo '<img src="public/1-out.jpg" alt="">';
