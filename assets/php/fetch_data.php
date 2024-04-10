<?php
include 'db_connection.php';

$sql = "SELECT username, password FROM users";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Username: " . htmlspecialchars($row["username"], ENT_QUOTES, 'UTF-8') . " - Password: " . htmlspecialchars($row["password"], ENT_QUOTES, 'UTF-8') . "<br>";
        }
    } else {
        echo "0 results";
    }

    $stmt->close();
} else {
    echo "Error in preparing SQL statement";
}

$conn->close();
?>
?>
