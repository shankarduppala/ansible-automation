<?php
$host = '35.174.165.133'; // Replace with your dbserver IP
$db = 'myapp_db';
$user = 'myapp_user';
$pass = 'myuserpassword';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $password);

if ($stmt->execute()) {
  echo "✅ Registered successfully!";
} else {
  echo "❌ Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
