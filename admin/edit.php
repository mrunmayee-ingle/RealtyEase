<?php
$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "task3";
$conn = new mysqli($db_server, $db_username, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT * FROM form WHERE id=$id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
</head>
<body>
    <div class="blur-background"></div>
    <div class="translucent-bg"></div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-darkgreen">
        <div class="container">
            <div class="navbar-brand mr-auto">
                <h2 class="font-weight-bold mt-2">RealtyEase</h2>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <button class="btn btn-lightgreen">Call Us</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid hero-section d-flex align-items-center">
        <div class="row w-100">
            <div class=" col-md-6 text-white text-center text-md-left hero-text ">
                <h2 class="ml-5">Looking to buy your dream home?</h2>
                <h2 class="ml-5">Get a Free Consultation Now !</h2>
                <p class="ml-5">Our experienced real estate agents are here to help you find the perfect property. Contact us for a free consultation today.</p>
            </div>
            <div class="col-md-6">
                <form method="post" action="update.php">
                    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control" placeholder="First Name" value="<?php echo $user['name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" id="address" class="form-control" placeholder="Street Address" value="<?php echo $user['address']; ?>" required>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend" style="margin-right: 20px;">
                                <select class="custom-select" name="country">
                                    <option value="India" <?php echo ($user['country'] == 'India') ? 'selected' : ''; ?>>+91 India</option>
                                    <option value="United Kingdom" <?php echo ($user['country'] == 'United Kingdom') ? 'selected' : ''; ?>>+44 United Kingdom</option>
                                    <option value="United States" <?php echo ($user['country'] == 'United States') ? 'selected' : ''; ?>>+1 United States</option>
                                </select>
                            </div>
                            <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Phone Number" value="<?php echo $user['phone_number']; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo $user['email']; ?>" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="desc" id="desc" rows="3" placeholder="Tell us about your needs" required><?php echo $user['desc']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-block btn-lightgreen">Update Information</button>
                </form>
            </div>
        </div>
    </div>

    <footer class="about-section py-4">
        <div class="container text-center text-white">
            <p class="mb-0">Email: realtyease@gmail.com</p>
            <p class="mb-0">Phone: +91 9827635671</p>
            <p class="mb-0">&copy; 2024 RealtyEase</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
