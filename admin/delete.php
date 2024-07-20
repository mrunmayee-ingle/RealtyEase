<?php
session_start();
$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "task3";
$conn = new mysqli($db_server, $db_username, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM form WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Entry deleted successfully!";
    } else {
       echo "Failed to delete entry. Please try again.";
    }

    $stmt->close();
    $conn->close();

    header("Location: index.php");
    exit();
?>
