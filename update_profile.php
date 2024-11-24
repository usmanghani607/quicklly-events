<?php
session_start();

// print_r($_SESSION);

$uid = $_SESSION['value_user_id'] ?? null; 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $uid) {
    
    $data = array(
        "uid" => $uid,
        "firstName" => $_POST['firstName'],
        "lastName" => $_POST['lastName'],
        "email" => $_POST['email'],
        "phone" => $_POST['phone'],
    );

    $url = "https://devrestapi.goquicklly.com/user/update-profile";

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json"
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo json_encode(array('success' => false, 'message' => 'Error: ' . curl_error($ch)));
    } else {
        $responseData = json_decode($response, true);

        if (isset($responseData['success']) && $responseData['success']) {

            $_SESSION['firstName'] = $_POST['firstName'];
            $_SESSION['lastName'] = $_POST['lastName'];
            
            echo json_encode(array('success' => true, 'message' => 'Profile updated successfully!'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Update failed: ' . $responseData['message']));
        }
    }

    curl_close($ch);
} else {
    echo json_encode(array('success' => false, 'message' => 'Invalid request or user not logged in.'));
}
