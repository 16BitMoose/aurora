<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connection.php';

    $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
    $passwordConfirm = htmlspecialchars($_POST['passwordConfirm'], ENT_QUOTES, 'UTF-8');

    if($passwordConfirm != $password){
        header("Location: register.php?error=1");
        exit();
    }

    $checkUsername = $conn->prepare("SELECT * FROM usernames WHERE username = ?");
    $checkUsername->bind_param("s", $username);
    $checkUsername->execute();
    $result = $checkUsername->get_result();

    if ($result->num_rows > 0) {
        header("Location: register.php?error=2");
        exit();
    }

    $checkUsername->close();

    $insertUsername = $conn->prepare("INSERT INTO usernames (username) VALUES (?)");
    $insertUsername->bind_param("s", $username);
    $insertUsername->execute();
    $user_id = $insertUsername->insert_id;

    $insertUsername->close();

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $insertPassword = $conn->prepare("INSERT INTO passwords (user_id, password) VALUES (?, ?)");
    $insertPassword->bind_param("is", $user_id, $hashedPassword);
    $insertPassword->execute();

    $insertPassword->close();

    header("Location: welcome.php");
    $conn->close();
    exit();

} else {
    header("Location: register.php?error=1");
    exit();
}
?>
