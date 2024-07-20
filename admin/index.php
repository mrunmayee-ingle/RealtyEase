<?php
$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "task3";
$conn = new mysqli($db_server, $db_username, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM form";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f0f0f0; 
            color: #333333; 
        }

        .container {
            background-color: #ffffff; 
            padding: 20px;
            border-radius: 8px;
            margin-top: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        }

        .table {
            color: #333333;
            border-collapse: collapse;
            width: 100%;
        }

        .table th, .table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #dddddd;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2; 
        }

        .table tbody tr:hover {
            background-color: #e9ecef; 
        }

        .edit-button {
            background-color: #dddddd;
            color: #333333; 
            font-weight: 400;
            border-color: #333333;
        }

        .edit-button:hover {
            background-color: #333333;
            color: #dddddd; 
            font-weight: 400;
            border-color: #dddddd;
        }

        h2 {
            color: #333333; 
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h2 class="text-center">Admin Dashboard</h2>
        <?php
            if (isset($_SESSION['message'])) {
                echo "<div class='alert alert-info'>" . $_SESSION['message'] . "</div>";
                unset($_SESSION['message']);
            }
        ?>

        <table class="table table-bordered">
            <thead class="bg-dark text-white">
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Country</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Description</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['name']}</td>
                                <td>{$row['address']}</td>
                                <td>{$row['country']}</td>
                                <td>{$row['phone_number']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['desc']}</td>
                                <td><a href='edit.php?id={$row['id']}' class='btn edit-button'>Edit</a></td>
                                <td><button class='btn edit-button' onclick='confirmDelete({$row['id']})'>Delete</button></td>
                                
                   </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<script>
function confirmDelete(id) {
    if (confirm("Are you sure you want to delete this entry?")) {
        window.location.href = "delete.php?id=" + id;
    }
}
</script>
</html>

<?php
$conn->close();
?>
