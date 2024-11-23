<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $email = $_POST['email'];
    $password = $_POST['pass'];

    $data = array(
        "email" => $email,
        "pass" => $password,
        "callFrom" => "WEB"
    );

    $url = "https://devrestapi.goquicklly.com/user/signin";

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

            $_SESSION['firstName'] = $responseData['firstName'];
            $_SESSION['lastName'] = $responseData['lastName'];
            // $_SESSION['uid'] = $responseData['uid'];
            $_SESSION['value_user_id'] = $responseData['uid'];



            echo json_encode(array(
                'success' => true,
                'message' => 'You are successfully logged in',
                'firstName' => $responseData['firstName'],
                'lastName' => $responseData['lastName'],
                'uid' => $responseData['uid'], 
            ));
        } else {
            
            $errorMessage = isset($responseData['message']) ? $responseData['message'] : 'Invalid email or password.';
            echo json_encode(array('success' => false, 'message' => $errorMessage));
        }
    }

    curl_close($ch);
}

?>
