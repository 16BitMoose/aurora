<?php
$directory = '../../uploads';
$images = glob($directory . '*/.{jpg,jpeg,png}', GLOB_BRACE);

echo json_encode($images);