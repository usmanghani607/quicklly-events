<?php
session_start();
header('Content-Type: application/json');

echo json_encode(array(
    'value_user_id' => isset($_SESSION['value_user_id']) ? $_SESSION['value_user_id'] : 'No User ID'
));
