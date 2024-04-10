<?php
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
    <title>Welcome</title>
</head>

<body>
    <h2>Welcome, <?php echo htmlspecialchars($user, ENT_QUOTES, 'UTF-8'); ?>!</h2>
    <a href="assets/php/logout.php">Logout</a>
    <a href="assets/php/remove_user.php">Remove Profile</a>
</body>

</html>