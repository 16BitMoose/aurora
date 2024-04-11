<?php
session_start();

if (!isset($_SESSION['username'])) { //Check is there is a properly logged in user
    header("Location: ../../index.php");
    exit();
}

include 'db_connection.php';

$loggedInUsername = $_SESSION['username'];

$getUserID = $conn->prepare("SELECT user_id FROM usernames WHERE username = ?"); //Get user_id
$getUserID->bind_param("s", $loggedInUsername);
$getUserID->execute();
$getUserIDResult = $getUserID->get_result();

if ($getUserIDResult->num_rows > 0) {
    $row = $getUserIDResult->fetch_assoc();
    $user_id = $row['user_id'];

    $deletePasswords = $conn->prepare("DELETE FROM passwords WHERE user_id = ?"); //Delete password
    $deletePasswords->bind_param("i", $user_id);
    $deletePasswords->execute();
    $deletePasswords->close();

    $deleteUsernames = $conn->prepare("DELETE FROM usernames WHERE username = ?"); //Delete username
    $deleteUsernames->bind_param("s", $loggedInUsername);
    $deleteUsernames->execute();
    $deleteUsernames->close();

    session_unset();
    session_destroy();

    header("Location: ../../index.php"); //Removal complete
    exit();
} else {
    header("Location: ../../index.php"); //If user has no user_id, send back to start.
    exit();
}
?>
