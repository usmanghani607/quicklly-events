<?php
session_start();
if (isset($_SESSION['firstName'], $_SESSION['uid'])) {
    echo json_encode([
        'firstName' => $_SESSION['firstName'],
        'lastName' => $_SESSION['lastName'],
        'email' => $_SESSION['email'] ?? '',
        'uid' => $_SESSION['uid']
    ]);
} else {
    echo json_encode(['firstName' => null]);
}
?>
