<?php
session_start();
require 'db_connect.php'; // Your database connection script

if (isset($_SESSION['admin_id'])) {
    $user_id = $_SESSION['admin_id'];

    $stmt = $conn->prepare("SELECT * FROM chat_messages WHERE user_id = ? ORDER BY created_at DESC");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo "<p>" . htmlspecialchars($row['message']) . "</p>";
    }
}
?>
