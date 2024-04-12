<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connection.php';

    $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
    $passwordConfirm = htmlspecialchars($_POST['passwordConfirm'], ENT_QUOTES, 'UTF-8');

    if(strcmp($password, $passwordConfirm) !== 0){ //Check if the password fields match
        header("Location: ../../register.php?error=3");
        exit();
    }

    $checkUsername = $conn->prepare("SELECT * FROM usernames WHERE username = ?"); //Fetch all usernames
    $checkUsername->bind_param("s", $username);
    $checkUsername->execute();
    $result = $checkUsername->get_result(); //Check if username matches any user in database

    if ($result->num_rows > 0) {
        header("Location: ../../register.php?error=2"); //User with that username does already exist
        exit();
    }

    $checkUsername->close();

    $insertUsername = $conn->prepare("INSERT INTO usernames (username) VALUES (?)"); //Get user ID
    $insertUsername->bind_param("s", $username);
    $insertUsername->execute();
    $user_id = $insertUsername->insert_id;

    $insertUsername->close();

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); //Hash chosen password
    $insertPassword = $conn->prepare("INSERT INTO passwords (user_id, password) VALUES (?, ?)");
    $insertPassword->bind_param("is", $user_id, $hashedPassword); //Bind hashed password to user ID
    $insertPassword->execute();

    $insertPassword->close();

    header("Location: ../../gallery.php"); //Register completed
    $conn->close();
    exit();

} else {
    header("Location: ../../register.php?error=1"); //Unexpected error or failed to reach server
    exit();
}
