<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Blue Purpose - Registration</title>
</head>
<body>
    <nav>
        <div class="top-nav">
                <a href="https://www.facebook.com/TheBluePurposeVibe/"><i class="fa-brands fa-facebook fa-lg"></i></a>
                <a href="https://www.linkedin.com/company/the-blue-purpose/"><i class="fa-brands fa-linkedin fa-lg"></i></a>
                <a href="tel:+18668562583">+1 (866)-856-BLUE (2583)</a>
                <a href="mailto:vibe@thebluepurpose.com">VIBE@TheBluePurpose.com</a>
        </div>

        <div class="bot-nav">
            <div class="left-nav">
                <img src="img/blue-purpose-logo.png" alt="Blue Purpose Logo">
            </div>
            <div class="right-nav">
                <ul>
                    <li><a href="https://thebluepurpose.com">Home</a></li>
                    <li><a href="https://thebluepurpose.com/about-us/">About Us</a></li>
                    <li>Solution <i class="fa-solid fa-angle-down"></i></li>
                    <li><a href="https://thebluepurpose.com/blogs/">Blogs</a></li>
                    <li>Contact Us <i class="fa-solid fa-angle-down"></i></li>
                </ul>
            </div>
        </div>
    </nav>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$servername = "localhost";
$username = "root";  
$password = "";  
$dbname = "registration_db";  

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $conn->real_escape_string(trim($_POST['first-name']));
    $last_name = $conn->real_escape_string(trim($_POST['last-name']));
    $dob = $conn->real_escape_string(trim($_POST['dob']));
    $username = $conn->real_escape_string(trim($_POST['username']));
    $password = $_POST['password']; 
    $confirm_password = $_POST['confirm-password']; 
    
    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<div class='error-message-form container'>Username already taken! Please head <a href='index.html'>back</a> and try again.</div>";
    } else {
        $sql = "INSERT INTO users (first_name, last_name, dob, username, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $first_name, $last_name, $dob, $username, $hashed_password);
        
        if ($stmt->execute()) {
            echo "<div class='success-message-form'>Your account has been created! Please follow this <a href='https://thebluepurpose.com'>Link</a> to head back to our home page.</div>";
        } else {
            echo "<div class='error-message-form'>Error: " . $stmt->error . "Please head <a href='index.html'>back</a> and try again.</div>";
        }
    }
    
    $stmt->close();
    $conn->close();
}
?>
    <footer>
        <div class="left-footer">
            <ul>
                <li><a href="https://thebluepurpose.com">Home</a></li>
                <li><a href="https://thebluepurpose.com/about-us/">About Us</a></li>
                <li><a href="https://thebluepurpose.com/solution/">Solution</a></li>
                <li><a href="https://thebluepurpose.com/privacy/">Privacy Policy</a></li>
                <li><a href="https://thebluepurpose.com/terms/">Terms of use</a></li>
                <li><a href="https://thebluepurpose.com/careers/">Careers</a></li>
            </ul>
        </div>
        <div class="right-footer">
            <p>Copyright 2023 Blue Purpose. All rights reserved</p>
        </div>
    </footer>
</body>
</html>