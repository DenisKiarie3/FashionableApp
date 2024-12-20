<?php
session_start();

// Check if the user is signed in
$response = ['signed_in' => false];
if (isset($_SESSION['user_id'])) {
    $response['signed_in'] = true;
}

// Return the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
