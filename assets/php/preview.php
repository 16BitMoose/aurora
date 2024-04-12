<?php
$imageDirectory = '../../uploads';
$images = glob($imageDirectory . '*.{jpg,jpeg,png}', GLOB_BRACE);
//shuffle($images);
echo json_encode(['images' => array_slice($images, 0, 5)]);