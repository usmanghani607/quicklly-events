<?php
session_start();
 
if (isset($_SESSION['firstName'], $_SESSION['value_user_id'])) {
    echo json_encode([
        'firstName' => $_SESSION['firstName'],
        'lastName' => $_SESSION['lastName'],
        'email' => $_SESSION['email'] ?? '',
        'uid' => $_SESSION['value_user_id']
    ]);
} else {
    echo json_encode(['firstName' => null]);
}
?>
