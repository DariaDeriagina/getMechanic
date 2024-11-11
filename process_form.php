<?php
// Simple form processing to capture data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $brand = $_POST['brand'];
  $model = $_POST['model'];
  $phone = $_POST['phone'];

  // Database connection (assuming credentials are set up correctly)
  $conn = new mysqli("localhost", "username", "password", "database_name");

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // SQL to insert form data into a database
  $stmt = $conn->prepare("INSERT INTO service_requests (brand, model, phone) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $brand, $model, $phone);

  if ($stmt->execute()) {
    echo "Thank you! Your request has been submitted.";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
  $conn->close();
}
