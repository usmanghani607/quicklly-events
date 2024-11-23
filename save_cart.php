<?php
session_start();

$json = file_get_contents('php://input');
$data = json_decode($json, true);


// if (isset($data['cart_events'])) {
//     $_SESSION['cart_events'] = $data['cart_events']; 
//     echo json_encode(['success' => true]);
// } else {
//     echo json_encode(['success' => false, 'message' => 'Invalid data received']);
// }

if (isset($data['cart_events'])) {
    if (empty($data['cart_events']['addOns'])) {
        
        unset($_SESSION['cart_events']);
    } else {

        $_SESSION['cart_events'] = $data['cart_events'];
    }
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid data received']);
}

?>
