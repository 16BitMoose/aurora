<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connection.php';

    $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');

    $sql = "SELECT user_id, password FROM usernames JOIN passwords USING (user_id) WHERE username = ?"; //Get hashed password from user_id
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) { //Check password against hash
            session_start();
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $username;
            header("Location: ../../gallery.php"); //Login completed
        } else {
            header("Location: ../../index.php?error=3"); // Invalid password
        }
    } else {
        header("Location: ../../index.php?error=2"); // Username not found
    }

    $stmt->close();
    $conn->close();
}