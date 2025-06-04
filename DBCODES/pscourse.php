<?php

$server = 'localhost';
$username = 'root';
$password = '';
$db = 'admindbacademyne_dba24';

$conn = new mysqli($server, $username, $password, $db); // Update database name

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into the database
$name = $_POST['name'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$address = $_POST['address'];
$guardian_name = $_POST['guardian_name'];
$guardian_contact = $_POST['guardian_contact'];
$course = $_POST['course'];

$sql = "INSERT INTO professional_skilling (name, contact, email, address, guardian_name, guardian_contact, course) 
        VALUES ('$name', '$contact', '$email', '$address', '$guardian_name', '$guardian_contact', '$course')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Form submitted successfully!');
            window.location.href='http://localhost/schoolwebsite/DBCODES/professionalskilling.html';
          </script>";
} else {
    echo "<script>
            alert('Error: " . $conn->error . "');
            window.location.href='http://localhost/schoolwebsite/DBCODES/professionalskilling.html';
          </script>";
}

$conn->close();
?>
