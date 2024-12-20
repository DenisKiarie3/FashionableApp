<?php
header('Content-Type: application/json');
session_start();

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fashionable_app";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed.']);
    exit();
}

// Get the JSON data sent from the client
$data = json_decode(file_get_contents("php://input"), true);
$email = $data['email'];
$password = $data['password'];

// Check if the email exists in the database
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Verify the password
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id']; // Start a session for the user
        echo json_encode(['success' => true, 'message' => 'Sign-In successful.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Incorrect password.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No account found with this email.']);
}

$stmt->close();
$conn->close();
?>
