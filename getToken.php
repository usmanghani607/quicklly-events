<?php
session_start();

header('Content-Type: application/json');

$bearer_token = $_SESSION['bearer_token'] ?? null;
if (!$bearer_token) {
    echo json_encode(['success' => false, 'message' => 'Authorization token missing.']);
} else {
    echo json_encode(['success' => true, 'bearer_token' => $bearer_token]);
}
?>
