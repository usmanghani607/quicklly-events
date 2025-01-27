<?php
// session_start();

// $bearer_token = $_SESSION['bearer_token'] ?? null;
// if (!$bearer_token) {
//     echo json_encode(['success' => false, 'message' => 'Authorization token missing.']);
//     exit;
// }

// // $api_url = 'https://devrestapi.goquicklly.com/events/get-home-data';
// $api_url = 'https://ormwebapi.quicklly.com/events/get-home-data';

// $input = json_decode(file_get_contents('php://input'), true);
// $city = $input['city'] ?? '';
// $query = $input['query'] ?? '';

// $data = array(
//     "zipcode" => "",
//     "query" => $query,
//     "catID" => "0",
//     "city" => $city,
//     "page" => "0",
//     "sendFilters" => "true"
// );

// $ch = curl_init($api_url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//     'Content-Type: application/json',
//     'Authorization: Bearer ' . $bearer_token
// ));

// $response = curl_exec($ch);
// curl_close($ch);

// $result = json_decode($response, true);

// if (isset($result['success']) && $result['success']) {
//     $events = $result['lstProds'] ?? null;

//     if ($events) {
//         echo json_encode(['success' => true, 'events' => $events]);
//     } else {
//         echo json_encode(['success' => false, 'message' => 'No events are currently listed for your location.']);
//     }
// } else {
//     echo json_encode(['success' => false, 'message' => $result['msg'] ?? 'Error retrieving events.']);
// }

session_start();

// Retrieve the bearer token from the session
$bearer_token = $_SESSION['bearer_token'] ?? null;
if (!$bearer_token) {
    echo json_encode(['success' => false, 'message' => 'Authorization token missing.']);
    exit;
}

// API endpoint
// $api_url = 'https://ormwebapi.quicklly.com/events/get-home-data';
$api_url = 'https://devrestapi.goquicklly.com/events/get-home-data';

$input = json_decode(file_get_contents('php://input'), true);
$city = $input['city'] ?? '';
$query = $input['query'] ?? '';

// Prepare the base payload
$data = array(
    "zipcode" => "",
    "query" => $query,
    "catID" => "0",
    "city" => $city,
    "sendFilters" => "true"
);

$all_events = [];
$page = 0;
$has_more_data = true;

while ($has_more_data) {
    $data['page'] = $page; 

    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $bearer_token
    ));

    $response = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($response, true);

    if (isset($result['success']) && $result['success']) {
        $events = $result['lstProds'] ?? [];
        $all_events = array_merge($all_events, $events);

        if (count($events) === 0) {
            $has_more_data = false;
        }
    } else {
        $has_more_data = false;
        echo json_encode(['success' => false, 'message' => $result['msg'] ?? 'Error retrieving events.']);
        exit;
    }

    $page++; 
}

echo json_encode(['success' => true, 'events' => $all_events]);
