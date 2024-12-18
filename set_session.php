<?php
session_start();
if (isset($_POST['firstName'], $_POST['lastName'], $_POST['uid'])) {
    $_SESSION['firstName'] = $_POST['firstName'];
    $_SESSION['lastName'] = $_POST['lastName'];
    $_SESSION['uid'] = $_POST['uid'];
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to set session data']);
}
?>
