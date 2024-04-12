<?php //User session handling
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
$user = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Gallery | Aurora</title>
  <!--CSS-->
  <link rel="stylesheet" href="assets/css/base.css">
  <link rel="stylesheet" href="assets/css/gallery.css">
  <!--Font import-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter&family=Kumbh+Sans:wght@700&display=swap" rel="stylesheet">
</head>

<body>
    <form id="uploadForm" enctype="multipart/form-data">
        <h2>Welcome, <?php echo htmlspecialchars($user, ENT_QUOTES, 'UTF-8'); ?>!</h2>
        <input type="file" id="fileInput" name="fileInput" multiple accept=".png, .jpeg, .jpg" />
        <button type="button" onclick="uploadFiles()">Upload</button>
    </form>
    <div id="response"></div>
    <div id="preview-container"></div>
    <div id="gallery"></div>
    <button id="loadMore">Load more images</button>
    <a href="assets/php/logout.php">Logout</a>
    <a href="assets/php/remove_user.php">Remove Profile</a>
    <script src="assets/js/gallery.js"></script>
    <script src="assets/js/preview.js"></script>
    <script src="assets/js/upload.js"></script>
</body>

</html>