<link rel="stylesheet" href="style.css">
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