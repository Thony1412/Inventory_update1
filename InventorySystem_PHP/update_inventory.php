<?php
// Database connection settings
$servername = "localhost";
$username = "root"; // Default XAMPP MySQL username
$password = " "; // Default XAMPP MySQL password
$dbname = "inventory_system"; // Your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the POST data
$data = json_decode(file_get_contents('php://input'), true);
$input_data = $conn->real_escape_string($data['input_data']);
$sentiment = $conn->real_escape_string($data['sentiment']);

// Insert the data into the database
$sql = "INSERT INTO inventory (input_data, sentiment) VALUES ('$input_data', '$sentiment')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

// Close the connection
$conn->close();
?>
