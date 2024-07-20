<?php
    $db_server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "task3";
    $conn = new mysqli($db_server, $db_username, $db_password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

    $name = $_POST["name"];
    $address = $_POST["address"];
    $country = $_POST["country"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $desc = $_POST["desc"];

    $insert = "INSERT INTO `form`(`name`, `address`, `country` , `phone_number`, `email`, `desc`) VALUES ('$name','$address', '$country', '$phone','$email','$desc')" ;
    if ($conn -> query($insert) === TRUE){
        echo "New record created successfully";
    }else{
        echo "Error: " . $insert . "<br>" . $conn->error;
    }

    $conn->close();
?>