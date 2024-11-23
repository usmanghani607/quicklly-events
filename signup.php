<?php
// session_start();

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
//     $json = file_get_contents('php://input');
//     $data = json_decode($json, true);

//     $firstName = $data['firstName'];
//     $lastName = $data['lastName'];
//     $address = $data['address'];
//     $apartment = $data['apartment'];
//     $phone = $data['phone'];
//     $email = $data['email'];
//     $password = $data['password'];
//     $confirmPassword = $data['confirmPassword'];
//     $token = $data['token'];

//     if ($password !== $confirmPassword) {
//         echo json_encode(array('success' => false, 'message' => 'Passwords do not match.'));
//         exit;
//     }

//     $apiData = array(
//         "firstName" => $firstName,
//         "lastName" => $lastName,
//         "address" => $address,
//         "apartment" => $apartment,
//         "phone" => $phone,
//         "email" => $email,
//         "pass" => $password,
//         "callFrom" => "WEB",
//         "token" => $token, 
//         "apiKey" => "UEjYnQ9yN7D3NCHEoGBMDq8lDUpKio"
//     );

//     $url = "https://devrestapi.goquicklly.com/user/signup";

//     $ch = curl_init($url);

//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_POST, true);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//         "Content-Type: application/json"
//     ));
//     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($apiData));

//     $response = curl_exec($ch);

//     if (curl_errno($ch)) {
//         echo json_encode(array('success' => false, 'message' => 'Error: ' . curl_error($ch)));
//     } else {
        
//         $responseData = json_decode($response, true);
//         if (isset($responseData['success']) && $responseData['success']) {
            
//             $_SESSION['firstName'] = $firstName; 
//             echo json_encode(array('success' => true, 'message' => 'Registration successful!'));
//         } else {
//             $errorMessage = isset($responseData['message']) ? $responseData['message'] : 'Registration failed.';
//             echo json_encode(array('success' => false, 'message' => $errorMessage));
//         }
//     }

//     curl_close($ch);
// }

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    error_log("Received data: " . print_r($data, true)); // Log received data for debugging

    $firstName = $data['firstName'] ?? '';
    $lastName = $data['lastName'] ?? '';
    $addr = $data['addr'] ?? '';
    $apartment = $data['apartment'] ?? '';
    $phone = $data['phone'] ?? '';
    $email = $data['email'] ?? '';
    $pass = $data['pass'] ?? '';
    $confirmPassword = $data['confirmPassword'] ?? '';
    $token = $data['token'] ?? '';

    // if ($password !== $confirmPassword) {
    //     echo json_encode(array('success' => false, 'message' => 'Passwords do not match.'));
    //     error_log("Passwords do not match."); 
    //     exit;
    // }

    $apiData = array(
        "firstName" => $firstName,
        "lastName" => $lastName,
        "addr" => $addr,
        "apartment" => $apartment,
        "phone" => $phone,
        "email" => $email,
        "pass" => $pass,
        "callFrom" => "WEB",
        "token" => $token,
        "apiKey" => "UEjYnQ9yN7D3NCHEoGBMDq8lDUpKio"
    );

    error_log("Sending API data: " . print_r($apiData, true)); // Log API data being sent

    $url = "https://devrestapi.goquicklly.com/user/signup";
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($apiData));

    $response = curl_exec($ch);
    error_log("API Response: " . $response); // Log API response for debugging

    if (curl_errno($ch)) {
        echo json_encode(array('success' => false, 'message' => 'Error: ' . curl_error($ch)));
    } else {
        $responseData = json_decode($response, true);
        if (isset($responseData['success']) && $responseData['success']) {
            $_SESSION['firstName'] = $firstName;
            echo json_encode(array('success' => true, 'message' => 'Registration successful!'));
        } else {
            $errorMessage = $responseData['message'] ?? 'Registration failed.';
            echo json_encode(array('success' => false, 'message' => $errorMessage));
        }
    }

    curl_close($ch);
}


?>
