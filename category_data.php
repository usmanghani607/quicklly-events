<?php
session_start();

$bearer_token = $_SESSION['bearer_token'] ?? null;
if (!$bearer_token) {
    echo json_encode(['success' => false, 'message' => 'Authorization token missing.']);
    exit;
}

$api_url = 'https://devrestapi.goquicklly.com/events/get-home-data';

$category = $_POST['category'] ?? '';
if ($category === '') { 
    echo json_encode(['success' => false, 'message' => 'Category ID is required.']);
    exit;
}

$data = array(
    "zipcode" => "60610",
    "query" => $_POST['query'] ?? '',
    "catID" => $category,
    "city" => $_POST['city'] ?? '',
    "page" => "0",
    "sendFilters" => "true"
);

$ch = curl_init($api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $bearer_token
));

$response = curl_exec($ch);

if (curl_errno($ch)) {
    error_log("cURL Error: " . curl_error($ch));
    echo json_encode(['success' => false, 'message' => 'cURL Error: ' . curl_error($ch)]);
    curl_close($ch);
    exit;
}

curl_close($ch);

$result = json_decode($response, true);

if (isset($result['success']) && $result['success']) {
    $events = $result['lstProds'] ?? null;

    if ($category == '0') {
        echo json_encode(['success' => true, 'events' => $events]);
    } else {
        
        $filteredEvents = array_filter($events, function ($event) use ($category) {
            return isset($event['catID']) && $event['catID'] == $category;
        });

        if (!empty($filteredEvents)) {
            echo json_encode(['success' => true, 'events' => array_values($filteredEvents)]); 
        } else {
            echo json_encode(['success' => false, 'message' => 'No events found for the selected category.']);
        }
    }
} else {
    $errorMessage = $result['msg'] ?? 'Error retrieving events.';
    error_log("API Error: " . $errorMessage);
    echo json_encode(['success' => false, 'message' => $errorMessage]);
}



?>
