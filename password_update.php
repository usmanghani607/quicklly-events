<?php
// session_start();

// // Assuming user is logged in and has a valid UID in the session
// $uid = $_SESSION['uid'] ?? null; 

// if ($_SERVER['REQUEST_METHOD'] == 'POST' && $uid) {
    
//     // Collect the password change form data
//     $data = array(
//         "uid" => $uid,
//         "callFrom" => 'WEB',  // This could be used by the API to track where the request is coming from
//         "oldPass" => $_POST['oldPass'], // Old password entered by user
//         "newPass" => $_POST['newPass'], // New password entered by user
//     );

//     // API URL for changing password
//     $url = "https://devrestapi.goquicklly.com/user/change-pass";

//     // Initialize cURL session
//     $ch = curl_init($url);

//     // Set the options for the POST request
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_POST, true);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//         "Content-Type: application/json"
//     ));
//     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

//     // Execute the POST request
//     $response = curl_exec($ch);

//     // Check for errors during the cURL request
//     if (curl_errno($ch)) {
//         echo json_encode(array('success' => false, 'message' => 'Error: ' . curl_error($ch)));
//     } else {
//         $responseData = json_decode($response, true);

//         // Handle API response based on success or failure
//         if (isset($responseData['success']) && $responseData['success']) {
//             echo json_encode(array('success' => true, 'message' => 'Password changed successfully!'));
//         } else {
//             echo json_encode(array('success' => false, 'message' => 'Password change failed: ' . $responseData['message']));
//         }
//     }

//     // Close cURL session
//     curl_close($ch);
// } else {
//     echo json_encode(array('success' => false, 'message' => 'Invalid request or user not logged in.'));
// }

?>

<?php
session_start();

// Assuming user is logged in and has a valid UID in the session
$uid = $_SESSION['uid'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $uid) {
    
    // Collect the form data
    $data = array(
        "uid" => $uid, // User ID from session
        "callFrom" => 'WEB',  // Specify the platform (WEB in this case)
        "oldPass" => $_POST['oldPass'], // Old password from the form
        "newPass" => $_POST['newPass'], // New password from the form
    );

    // API URL for changing the password
    $url = "https://devrestapi.goquicklly.com/user/change-pass";

    // Initialize cURL session
    $ch = curl_init($url);

    // Set the options for the POST request
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json"
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    // Execute the POST request
    $response = curl_exec($ch);

    // Check for errors during the cURL request
    if (curl_errno($ch)) {
        echo json_encode(array('success' => false, 'message' => 'Error: ' . curl_error($ch)));
    } else {
        $responseData = json_decode($response, true);

        // Handle API response based on success or failure
        if (isset($responseData['success']) && $responseData['success']) {
            echo json_encode(array('success' => true, 'message' => 'Password changed successfully!'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Password change failed: ' . $responseData['message']));
        }
    }

    // Close cURL session
    curl_close($ch);
} else {
    echo json_encode(array('success' => false, 'message' => 'Invalid request or user not logged in.'));
}

?>