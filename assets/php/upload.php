<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $targetDir = '../../uploads/';
    $uploadedFiles = [];
    
    foreach ($_FILES['files']['tmp_name'] as $key => $tmpName) {
        $fileName = basename($_FILES['files']['name'][$key]);
        $targetFile = $targetDir . $fileName;

        $allowedExtensions = ['png', 'jpeg', 'jpg'];
        $fileExtension = pathinfo($targetFile, PATHINFO_EXTENSION);

        if (in_array(strtolower($fileExtension), $allowedExtensions)) {
            if (move_uploaded_file($tmpName, $targetFile)) {
                $uploadedFiles[] = $fileName;
            }
        }
    }

    if (!empty($uploadedFiles)) {
        echo 'Files uploaded successfully: ' . implode(', ', $uploadedFiles);
    } else {
        echo 'Error uploading files.';
    }
} else {
    echo 'Invalid request.';
}

