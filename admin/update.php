<?php
$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "task3";

$conn = new mysqli($db_server, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $desc = $_POST['desc'];

    $sql = "UPDATE form SET name=?, address=?, country=?, phone_number=?, email=?, `desc`=? WHERE id=?";
    $stmt = $conn->prepare($sql);  
    $stmt->bind_param("ssssssi", $name, $address, $country, $phone_number, $email, $desc, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Information updated'); window.location.href = 'index.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();

    $conn->close();
?>
