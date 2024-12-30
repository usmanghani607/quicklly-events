<?php
session_start();

// Ensure bearer token exists
$bearer_token = $_SESSION['bearer_token'] ?? null;
if (!$bearer_token) {
    echo json_encode(['success' => false, 'message' => 'Authorization token missing.']);
    exit;
}

$query = $_POST['query'] ?? '';
if (empty($query)) {
    echo json_encode(['success' => false, 'message' => 'Query is required.']);
    exit;
}

// API URL
$api_url_home_data = 'https://devrestapi.goquicklly.com/events/get-home-data';

// API request payload
$data_home = [
    "zipcode" => "60611",
    "query" => $query,
    "catID" => "0",
    "city" => "",
    "page" => "0",
    "sendFilters" => "true",
];

// cURL request to API
$ch = curl_init($api_url_home_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data_home));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $bearer_token,
]);

$response_home = curl_exec($ch);
curl_close($ch);

$result_home = json_decode($response_home, true);

if ($result_home && $result_home['success']) {
    $events = $result_home['lstProds'] ?? [];
    echo json_encode(['success' => true, 'data' => $events]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to fetch events.']);
}
?>
