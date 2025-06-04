<?php
$conn = new mysqli('localhost','root', '', 'admindbacademyne_dba24'); // Update database name

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$address = $_POST['address'];
$guardian_name = $_POST['guardian_name'];
$guardian_contact = $_POST['guardian_contact'];
$course = $_POST['course'];

$sql = "INSERT INTO media_services (name, contact, email, address, guardian_name, guardian_contact, course) 
        VALUES ('$name', '$contact', '$email', '$address', '$guardian_name', '$guardian_contact', '$course')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Form submitted successfully!');
            window.location.href='http://localhost/schoolwebsite/DBCODES/MediaServices.html';
          </script>";
} else {
    echo "<script>
            alert('Error: " . $conn->error . "');
            window.location.href='http://localhost/schoolwebsite/DBCODES/MediaServices.html';
          </script>";
}

$conn->close();
?>
