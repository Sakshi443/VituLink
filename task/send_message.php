<?php
session_start();
require 'db_connect.php'; // Your database connection script

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['admin_id'])) {
    $user_id = $_SESSION['admin_id'];
    $message = $_POST['message'];

    // Insert message into the database
    $stmt = $conn->prepare("INSERT INTO chat_messages (user_id, message) VALUES (?, ?)");
    $stmt->bind_param("is", $user_id, $message);
    $stmt->execute();
}
?>
