<?php
// Database connection
$servername = "localhost";
$username = "root"; // Replace with your DB username
$password = "";     // Replace with your DB password
$dbname = "admindbacademyne_dba24"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['first-name'] . ' ' . $_POST['last-name']; // Combine first and last name
$phone = $_POST['contact-no'];
$email = $_POST['email'];
$message = $_POST['message'];

// Prepare SQL query
$sql = "INSERT INTO collaborates (name, phone, email, message) 
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $phone, $email, $message);

// Execute query and check for success
if ($stmt->execute()) {
    // Redirect to the "thank you" page on success
    header("Location: http://localhost/schoolwebsite/DBCODES/home.html");
    exit(); // Stop further execution of the script
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
