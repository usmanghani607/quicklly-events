<?php 

if (isset($_POST['bearer_token']) && isset($_POST['eid'])) {
    $bearer_token = $_POST['bearer_token'];
    $eid = htmlspecialchars($_POST['eid']);

    $api_url = 'https://devrestapi.goquicklly.com/events/get-details';

    $data = array(
        "zipcode" => "60610",
        "eid" => $eid
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
    curl_close($ch);

    echo $response;
} else {
    echo json_encode(array('error' => 'Bearer token or event ID missing.'));
}



?>