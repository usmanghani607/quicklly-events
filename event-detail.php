<?php

// session_start();

// // if (isset($_SESSION['eventAddress'])) {
// //     $eventLocation = $_SESSION['eventAddress'];
// //     echo "Event Location: " . htmlspecialchars($eventLocation);
// // } else {
// //     echo "Event address is not available.";
// // }

// if (isset($_GET['slug']) && !empty($_GET['slug'])) {
//     $slug = htmlspecialchars($_GET['slug']);
// } else {
//     echo "Event slug not provided!";
//     exit;
// }

// $bearer_token = $_SESSION['bearer_token'] ?? null;
// if (!$bearer_token) {
//     echo json_encode(['success' => false, 'message' => 'Authorization token missing.']);
//     exit;
// }

// $uid = $_SESSION['value_user_id'] ?? null;

// // if (!$uid) {
// //     echo json_encode(['success' => false, 'message' => 'User ID missing in session.']);
// //     exit;
// // }

// $api_url_home_data = 'https://devrestapi.goquicklly.com/events/get-home-data';
// $data_home = array(
//     "zipcode" => "60611",
//     "query" => "",
//     "catID" => "0",
//     "city" => "",
//     "page" => "0",
//     "sendFilters" => "true"
// );

// $ch = curl_init($api_url_home_data);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data_home));
// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//     'Content-Type: application/json',
//     'Authorization: Bearer ' . $bearer_token
// ));

// $response_home = curl_exec($ch);
// curl_close($ch);

// $result_home = json_decode($response_home, true);

// if ($result_home['success'] && isset($result_home['lstProds'])) {
//     $events = $result_home['lstProds'];
//     $event_id = null;

//     foreach ($events as $event) {
//         if ($event['slug'] === $slug) {
//             $event_id = $event['eid'];
//             break;
//         }
//     }

//     if (!$event_id) {
//         echo "Event not found for the given slug.";
//         exit;
//     }

//     $_SESSION['event_id'] = $event_id;
//     // echo "Event Id: " . htmlspecialchars($event_id);

//     $api_url_details = 'https://devrestapi.goquicklly.com/events/get-details';
//     $data_details = array(
//         "zipcode" => "60611",
//         "eid" => $event_id
//     );

//     $ch = curl_init($api_url_details);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_POST, true);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data_details));
//     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//         'Content-Type: application/json',
//         'Authorization: Bearer ' . $bearer_token
//     ));

//     $response_details = curl_exec($ch);
//     curl_close($ch);

//     $result = json_decode($response_details, true);

//     if ($result['success']) {

//         $sid = htmlspecialchars($result['sid']);
//         $sname = htmlspecialchars($result['store_name']);
//         $pid = htmlspecialchars($result['pid']);
//         $deliveryDate = htmlspecialchars($result['fromDate']);
//         $deliveryFromTime = htmlspecialchars($result['time']);
//         $simg = htmlspecialchars($result['store_icon']);
//         $slug = htmlspecialchars($result['slug']);
//         $organiser = htmlspecialchars($result['organiser']);
//         $organiserDetails = htmlspecialchars($result['organiserDetails']);
//         $name = htmlspecialchars($result['name']);
//         $eventDate = htmlspecialchars($result['dateRange']);
//         $eventTime = htmlspecialchars($result['time']);
//         $eventAddress = htmlspecialchars($result['address']);
//         $eventCity = htmlspecialchars($result['city']);
//         $eventState = htmlspecialchars($result['state']);
//         $eventCost = htmlspecialchars($result['costRange']);
//         $eventTag = htmlspecialchars($result['costRange']);
//         $photo = htmlspecialchars($result['photoWide']);
//         $eventPhoto = htmlspecialchars($result['photo']);
//         $eventVenue = htmlspecialchars($result['venue']);
//         $eventTerms = strip_tags($result['terms']);
//         $eventDesp = strip_tags($result['desp']);
//         $cleanedEventDesp = strip_tags($eventDesp);
//         $latitude = $result['latitude'];
//         $longitude = $result['longitude'];
//         $deliveryDisplayDate = $eventDate . " | " . $eventTime;
//         $encodedAddress = urlencode($eventAddress);

//         $eventAddress = $result['address'] ?? null;

//         if ($eventAddress) {
//             $_SESSION['eventAddress'] = $eventAddress;
//             // echo "Event Address: " . htmlspecialchars($eventAddress);
//         } else {
//             echo "Event address not found in API response.";
//         }
//     } else {
//         echo "Event details not found.";
//     }
// } else {
//     echo "Failed to retrieve event data from home data API.";
// }


session_start();

// echo $_SESSION['bearer_token'];

if (!isset($_SESSION['bearer_token'])) {
    
    $login_api_url = 'https://devrestapi.goquicklly.com/login';
    $login_data = array(
        "email" => getenv('LOGIN_EMAIL'), 
        "password" => getenv('LOGIN_PASSWORD')
    );

    $ch = curl_init($login_api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($login_data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json'
    ));

    $login_response = curl_exec($ch);
    curl_close($ch);

    $login_result = json_decode($login_response, true);

    if (isset($login_result['token'])) {
        $_SESSION['bearer_token'] = $login_result['token'];  
    } else {
        echo json_encode(['success' => false, 'message' => 'Login failed: ' . $login_result['message']]);
        exit;
    }
}

$slug = isset($_GET['slug']) && !empty($_GET['slug']) ? htmlspecialchars($_GET['slug']) : null;
if (!$slug) {
    echo "Event slug not provided!";
    exit;
}

$bearer_token = $_SESSION['bearer_token'] ?? null;
if (!$bearer_token) {
    echo json_encode(['success' => false, 'message' => 'Authorization token missing.']);
    exit;
}

$uid = $_SESSION['value_user_id'] ?? null;

$api_url_home_data = 'https://devrestapi.goquicklly.com/events/get-home-data';
$data_home = array(
    "zipcode" => "60611",
    "query" => "",
    "catID" => "0",
    "city" => "",
    "page" => "0",
    "sendFilters" => "true"
);

$ch = curl_init($api_url_home_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data_home));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $bearer_token
));

$response_home = curl_exec($ch);
curl_close($ch);

$result_home = json_decode($response_home, true);

if ($result_home['success'] && isset($result_home['lstProds'])) {
    $events = $result_home['lstProds'];
    $event_id = null;

    foreach ($events as $event) {
        if ($event['slug'] === $slug) {
            $event_id = $event['eid'];
            break;
        }
    }

    if (!$event_id) {
        echo "Event not found for the given slug.";
        exit;
    }

    $_SESSION['event_id'] = $event_id; 

    $api_url_details = 'https://devrestapi.goquicklly.com/events/get-details';
    $data_details = array(
        "zipcode" => "60611",
        "eid" => $event_id
    );

    $ch = curl_init($api_url_details);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data_details));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $bearer_token
    ));

    $response_details = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($response_details, true);

    if ($result['success']) {
        
        $sid = htmlspecialchars($result['sid']);
        $sname = htmlspecialchars($result['store_name']);
        $pid = htmlspecialchars($result['pid']);
        $deliveryDate = htmlspecialchars($result['fromDate']);
        $deliveryFromTime = htmlspecialchars($result['time']);
        $simg = htmlspecialchars($result['store_icon']);
        $slug = htmlspecialchars($result['slug']);
        $organiser = htmlspecialchars($result['organiser']);
        $organiserDetails = htmlspecialchars($result['organiserDetails']);
        $name = htmlspecialchars($result['name']);
        $eventDate = htmlspecialchars($result['dateRange']);
        $eventTime = htmlspecialchars($result['time']);
        $eventAddress = htmlspecialchars($result['address']);
        $eventCity = htmlspecialchars($result['city']);
        $eventState = htmlspecialchars($result['state']);
        $eventCost = htmlspecialchars($result['costRange']);
        $eventTag = htmlspecialchars($result['costRange']);
        $photo = htmlspecialchars($result['photoWide']);
        $eventPhoto = htmlspecialchars($result['photo']);
        $eventVenue = htmlspecialchars($result['venue']);
        $eventTerms = strip_tags($result['terms']);
        $eventDesp = strip_tags($result['desp']);
        $cleanedEventDesp = strip_tags($eventDesp);
        $latitude = $result['latitude'];
        $longitude = $result['longitude'];
        $deliveryDisplayDate = $eventDate . " | " . $eventTime;
        $encodedAddress = urlencode($eventAddress);

        if ($eventAddress) {
            $_SESSION['eventAddress'] = $eventAddress;
        } else {
            echo "Event address not found in API response.";
        }
    } else {
        echo "Event details not found.";
    }
} else {
    echo "Failed to retrieve event data from home data API.";
}


?>

<?php

if (!isset($_SESSION['bearer_token'])) {
    die('Bearer token missing in session. Please log in.');
}

$bearer_token = $_SESSION['bearer_token'];

$api_url_home_data = 'https://devrestapi.goquicklly.com/events/get-home-data';

$data_home = array(
    "zipcode" => "60611",
    "query" => "",
    "catID" => "0",
    "city" => "",
    "page" => "0",
    "sendFilters" => "true"
);

$ch = curl_init($api_url_home_data);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data_home));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $bearer_token
));

$response_home = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Request Error: ' . curl_error($ch);
    curl_close($ch);
    exit;
}

curl_close($ch);

$result_home = json_decode($response_home, true);

?>


<!DOCTYPE html>
<html>

<head>
    <?php include 'header.php'; ?>
    <link rel="shortcut icon" href="images/favicon.png">
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7FCoN0eNTNGEsX6d-BUW-Uh1SiVzn2f0&callback=initMap">
    </script>

    <style>
        .event-detail {
            transition: opacity 0.5s ease;
        }

        div:where(.swal2-container) button:where(.swal2-styled):where(.swal2-confirm) {
            background: #F05336;
            color: #fff;
        }

        div:where(.swal2-container) button:focus {
            outline: none;
        }

        .event-detail {
            position: relative;
        }

        .event-detail.fade-background::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.3);
            transition: opacity 0.3s ease;
            opacity: 1;
            pointer-events: none;
        }

        .event-detail::after {
            opacity: 0;
        }
    </style>
</head>

<body>

    <div class="body-content">
        <div class="event-detail">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 main-area">
                        <div class="banner">
                            <!-- <img src="images/detail-banner.png" alt=""> -->
                            <img src="<?php echo $photo; ?>" alt="" class="img-fluid">
                        </div>
                        <div class="sale-area">
                            <p>Sales end Soon</p>
                        </div>
                        <div class="location-time">
                            <div class="heading">
                                <h2><?php echo $name; ?></h2>
                            </div>
                            <div class="dateTime">
                                <!-- <img class="calender-desk" src="images/ios-calendar.png" alt="">
                                <img class="calender-mob" src="images/calendar-mob.png" alt=""> -->
                                <img src="images/ios-calendar.png" alt="">
                                <span><?php echo $eventDate; ?></span> <span><?php echo $eventTime; ?></span>
                            </div>
                            <div class="loc">
                                <!-- <img class="loc-desk" src="images/loc.png" alt="">
                                <img class="loc-mob" src="images/location-mob.png" alt=""> -->
                                <img src="images/loc.png" alt="">
                                <span><?php echo $eventAddress; ?></span>
                            </div>
                        </div>

                        <div class="ticket-info ticket-fly">
                            <div class="heading">
                                <h2>Tickets Information</h2>
                            </div>
                            <?php
                            if (isset($result['lstSizes']) && is_array($result['lstSizes'])) {
                                foreach ($result['lstSizes'] as $size) {
                                    $sizeName = htmlspecialchars($size['name']);
                                    $sizeDesc = htmlspecialchars($size['desp']);
                                    $sizeCost = htmlspecialchars($size['cost']);
                                    $sizeMRP = htmlspecialchars($size['mrp']);
                                    $inStock = $size['inStock'];
                                    $stockStatus = $inStock ? 'Available' : 'Sold Out';
                                    $allowBooking = $size['allowBooking'];
                                    $discountTxt = htmlspecialchars($size['discountTxt']);
                                    $soldOutClass = !$inStock ? 'soldout' : '';
                                    $sizeId = isset($size['sizeid']) ? htmlspecialchars($size['sizeid']) : 'unknown';

                                    if ($allowBooking) {
                                        echo "
                                        <div class='card-info row {$soldOutClass}'>
                                            <div class='col-md-8'>
                                                <div class='event-name'>
                                                    <span class='tick-name'>{$sizeName}</span>";

                                        if (!empty($discountTxt)) {
                                            echo "<span class='price-icon'><img src='images/discount-icon.png' alt=''> {$discountTxt}</span>";
                                        }

                                        echo "
                                                    <div class='aa'><span class='sold-p para' id='event-description-{$sizeId}'>
                                                        {$sizeDesc}
                                                    </span>
                                                    <span><a href='javascript:void(0);' class='show-more'>show more</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='col-4 col-md-2'>
                                                <div class='counter'>
                                                    <button class='decrease' data-id='{$sizeId}'>-</button>
                                                    <span class='count' id='count-{$sizeId}'>0</span>
                                                    <button class='increase' data-id='{$sizeId}'>+</button>
                                                </div>
                                            </div>
                                            <div class='col-8 col-md-2 pp'>
                                                <div class='price'>
                                                    <h4 class='price-display' id='price-{$sizeId}'>\${$sizeCost}</h4>";
                                        if (!empty($discountTxt)) {
                                            echo "<span style='text-decoration: line-through; padding-right:10px;'>\${$sizeMRP}</span>";
                                        }

                                        echo "<p class='avail'>{$stockStatus}</p>";

                                        if (!empty($result['ticketPopup']) && $result['ticketPopup'] === true) {
                                            echo "<p><a class='btn seating' data-bs-toggle='modal' data-bs-target='#seatingModal'>Check Seating</a></p>";
                                        }

                                        echo "
                                                </div>
                                            </div>
                                        </div>";
                                    } else {
                                        echo "
                                        <div class='soldout card-info row'>
                                            <div class='col-md-8'>
                                                <div class='event-name'>
                                                    <h5 class='sold-h'>{$sizeName}";

                                        if (!empty($discountTxt)) {
                                            echo "<span class='price-icon'><img src='images/discount-icon.png' alt=''> {$discountTxt}</span>";
                                        }

                                        echo "</h5>
                                                <div class='aa'><span class='sold-p para' id='event-description-{$sizeId}'>
                                                    {$sizeDesc}
                                                </span>
                                                <span><a href='javascript:void(0);' class='show-more'>show more</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='col-4 col-md-2'>
                                            <div class='counter'>
                                                <button id='student-decrease'>-</button>
                                                <span id='student-count'>0</span>
                                                <button id='student-increase'>+</button>
                                            </div>
                                        </div>
                                        <div class='col-8 col-md-2 pp sold-p'>
                                            <div class='price'>
                                                <h4 id='student-price'>\${$sizeCost}</h4>";
                                        if (!empty($discountTxt)) {
                                            echo "<span style='text-decoration: line-through; padding-right:10px;'>\${$sizeMRP}</span>";
                                        }

                                        echo "
                                                <p>Sold Out</p>
                                            </div>
                                        </div>
                                        </div>";
                                    }
                                }
                            } else {
                                echo "<p>No ticket information available.</p>";
                            }
                            ?>
                        </div>

                        <div class="event-info">
                            <div class="heading">
                                <h2>Event Information</h2>
                            </div>
                            <div class="col-md-9">
                                <div class="event-banner">
                                    <img src="<?php echo $eventPhoto; ?>" alt="">
                                </div>
                            </div>
                            <div class="event-desc">
                                <p><?php echo htmlspecialchars($cleanedEventDesp); ?></p>
                            </div>
                        </div>

                        <div class="venu-detail">
                            <div class="heading">
                                <h2>Venue Details</h2>
                            </div>
                            <div class="des">
                                <p class="name"><?php echo $eventVenue; ?></p>
                                <p class="address"><?php echo $eventAddress; ?></p>
                                <!-- <a id="directions-link" href="#" target="_blank"> <img src="images/directions.png" alt=""> Get Directions </a> -->
                                <a id="directions-link" href="https://www.google.com/maps/search/?api=1&query=<?php echo $encodedAddress; ?>" target="_blank">
                                    <img src="images/directions.png" alt=""> Get Directions
                                </a>
                            </div>
                            <div class="map">
                                <div class="col-md-6">
                                    <div id="map"></div>
                                </div>
                            </div>
                        </div>

                        <div class="event-images">
                            <div class="heading">
                                <h2>Images</h2>
                            </div>
                            <div class="row">
                                <?php

                                if (!empty($result['lstGallery'])) {
                                    foreach ($result['lstGallery'] as $image) {

                                        $imageUrl = htmlspecialchars($image);
                                        echo '<div class="col-6 col-md-4">';
                                        echo '<img src="' . $imageUrl . '" alt="">';
                                        echo '</div>';
                                    }
                                } else {
                                    echo '<div class="col-md-12"><p>No images available.</p></div>';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="event-about">
                            <div class="heading">
                                <h2>About Organizer</h2>
                            </div>
                            <div class="des">
                                <?php
                                if (empty($organiser) && empty($organiserDetails)) {
                                    echo "<p>About Organizer is not available.</p>";
                                } else {
                                    if (!empty($organiser)) {
                                        echo "<p class='del'>$organiser</p>";
                                    }
                                    if (!empty($organiserDetails)) {
                                        echo $organiserDetails;
                                    }
                                }
                                ?>
                            </div>
                        </div>

                        <div class="event-tags">
                            <div class="heading">
                                <h2>Tags</h2>
                            </div>
                            <div class="tags">
                                <?php
                                if (isset($result['lstTags']) && is_array($result['lstTags']) && !empty($result['lstTags'])) {
                                    foreach ($result['lstTags'] as $tag) {
                                        $tag = htmlspecialchars($tag);
                                        echo "<span><a href='#'>$tag</a></span>";
                                    }
                                } else {
                                    echo "<span>No tags available</span>";
                                }
                                ?>
                            </div>
                        </div>

                        <div class="event-term">
                            <div class="heading">
                                <h2>Terms & Conditions</h2>
                            </div>
                            <div class="des">
                                <ol>
                                    <?php
                                    if (!empty($cleanedEventTerms)) {
                                        echo htmlspecialchars($cleanedEventTerms);
                                    } else {
                                        echo "Terms & Conditions are not available.";
                                    }
                                    ?>
                                </ol>
                            </div>
                        </div>

                        <div class="event-faqs">
                            <div class="heading">
                                <h2>FAQ’s</h2>
                            </div>
                            <div class="accordion" id="accordionExample">
                                <?php

                                if (!empty($result['lstFAQ'])) {
                                    foreach ($result['lstFAQ'] as $index => $faq) {

                                        $question = htmlspecialchars($faq['Q']);
                                        $answer = htmlspecialchars($faq['N']);

                                        $collapseId = "collapse" . ($index + 1);
                                        $headingId = "heading" . ($index + 1);
                                        $isExpanded = $index === 0 ? 'true' : 'false';
                                        $showClass = $index === 0 ? 'show' : '';

                                        echo '<div class="accordion-item">';
                                        echo '<h2 class="accordion-header" id="' . $headingId . '">';
                                        echo '<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#' . $collapseId . '" aria-expanded="' . $isExpanded . '" aria-controls="' . $collapseId . '">';
                                        echo $question;
                                        echo '</button>';
                                        echo '</h2>';
                                        echo '<div id="' . $collapseId . '" class="accordion-collapse collapse ' . $showClass . '" data-bs-parent="#accordionExample">';
                                        echo '<div class="accordion-body">';
                                        echo $answer;
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</div>';
                                    }
                                } else {
                                    echo '<p>No FAQs available.</p>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 side">
                        <div class="side-area side-fixed summery-p">
                            <div class="ticket-section">
                                <img src="images/place-icon.png" alt="">
                                <span class="heading">Event Venue</span>
                                <!-- <p><?php echo $eventAddress; ?></p> -->
                                <p><a id="directions-link" href="https://www.google.com/maps/search/?api=1&query=<?php echo $encodedAddress; ?>" target="_blank"><?php echo $eventAddress; ?></a></p>

                            </div>
                            <div class="ticket-border"></div>
                            <div class="shedule-section">
                                <img src="images/calendar-icon.png" alt="">
                                <span class="heading">Event Schedule Details</span>
                                <p><span><?php echo $eventDate; ?></span> <span><?php echo $eventTime; ?></span></p>
                            </div>
                            <div class="ticket-border"></div>
                            <div class="price-section">
                                <img src="images/ticket-icon.png" alt="">
                                <span class="heading">Ticket Range</span>
                                <p><?php echo $eventCost; ?></p>
                            </div>
                            <div>
                                <button class="btn btn-ticket" style="display: none;"><span>Buy Tickets</span></button>
                            </div>
                        </div>
                        <div class="side-area-social social-side-fixed social-p">
                            <div class="col-md-12">
                                <h2>Share This Event</h2>
                            </div>
                            <div class="social-icon">
                                <a href="https://www.facebook.com/quickllyIt"><img src="images/facebook-icon.png" alt=""></a>
                                <a href="https://twitter.com/QuickllyIt"><img src="images/x-icon.png" alt=""></a>
                                <a href="https://in.linkedin.com/company/myvalue365-e-commerce-pvt-ltd-"><img src="images/linkden-icon.png" alt=""></a>
                                <a href="#"><img src="images/whatsapp-icon.png" alt=""></a>
                                <a href="mailto:hello@quicklly.com"><img src="images/mail-icon.png" alt=""></a>
                                <a href="#"><img src="images/link-icon.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="might-like">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading">
                            <h2>You might also like this</h2>
                        </div>
                        <div class="event-slider-detail">
                            <?php
                            if (isset($result_home['lstProds']) && count($result_home['lstProds']) > 0) {
                                $events = $result_home['lstProds'];

                                foreach ($events as $index => $event) {
                                    $cardClass = ($index % 3 === 0) ? 'first' : (($index % 3 === 1) ? 'sec' : 'third');

                                    $name = htmlspecialchars($event['name']);
                                    $trimmedName = (strlen($name) > 54) ? substr($name, 0, 54) . '...' : $name;

                                    $day = substr($event['dayMonth'], 0, 2);
                                    $month = substr($event['dayMonth'], 2);

                                    $slug = htmlspecialchars($event['slug']);
                                    echo '<div>';
                                    echo '<div class="card ' . $cardClass . '" title="Slug: ' . $slug . '">';
                                    echo '  <a href="event-detail?slug=' . $slug . '">';
                                    echo '    <span class="date"><p class="date-a">' . htmlspecialchars($day) . '</p><p class="month-a">' . htmlspecialchars($month) . '</p></span>';
                                    echo '    <img src="' . htmlspecialchars($event['photo']) . '" class="card-img-top main-img" alt="Event Image">';
                                    echo '    <div class="card-body">';
                                    echo '        <h5 class="card-title">' . $trimmedName . '</h5>';
                                    echo '        <h4 class="time">' . htmlspecialchars($event['dateRange']) . '</h4>';
                                    echo '        <h5 class="location">' . htmlspecialchars($event['venue']) . '</h5>';
                                    echo '        <p class="desc">' . htmlspecialchars($event['organiser']) . '</p>';
                                    echo '        <span class="price">Starting at ' . htmlspecialchars($event['costRange']) . '</span>';
                                    if (!empty($event['discountTxt'])) {
                                        echo '        <span class="price-icon"><img src="images/discount-icon.png" alt=""> ' . htmlspecialchars($event['discountTxt']) . '</span>';
                                    }
                                    echo '    </div>';
                                    echo '  </a>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            } else {
                                echo '<p>No events found or incorrect data structure.</p>';
                            }
                            ?>
                        </div>
                        <!-- <img src="images/spons-right.png" alt="Next" class="category-right-arrow" data-bs-target="#carouselLike" data-bs-slide="next"> -->
                    </div>
                </div>
            </div>
        </div>

        <div id="ticket-info" class="ticket-attached" style="display: none;">
            <div class="ticket-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ticket-heading d-flex align-items-center">
                                <h2>Ticket Information</h2>
                                <img id="d-arrow" src="images/t-down.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="total-ticket-area" style="display: none;">
                <div class="container">
                    <div class="card-info row">
                        <div class="col-md-4">
                            <div class="event-name">
                                <h5><?php echo $sizeName; ?></h5>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="t-counter">
                                <button id="t-decrease">-</button>
                                <span id="t-count">1</span>
                                <button id="t-increase">+</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="price">
                                <h5 id="t-price"></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="selected-tickets"></div>
        </div>
        <div class="ticket-proceed">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="price-area">
                                <span class="rate"></span>
                                <p><span class="t-number"></span><span class="t-text">Tickets</span> <span><img id="u-arrow" src="images/t-pro.png" alt=""></span></p>
                            </div>
                            <div class="pro-btn">
                                <!-- <a href="" class="btn-process">Proceed</a> -->
                                <button class="btn-process">Proceed to Checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Seating Modal--->

        <div class="modal fade" id="seatingModal" aria-hidden="true" aria-labelledby="seatingModalLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="clsClose" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <a href="#" data-bs-target="#seatingModalFull" data-bs-toggle="modal" data-bs-dismiss="modal">
                            <img class="seat-img" src="images/seating-modal.png" alt="">
                            <img class="seat-zoom" src="images/seating-zoom-in.svg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="seatingModalFull" aria-hidden="true" aria-labelledby="seatingModalLabelFull" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="clsClose" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img class="seat-img" src="images/seating-modal.png" alt="">
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function() {
            $('.event-slider-detail').slick({
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: false,
                arrows: true,
                nextArrow: '<img src="images/spons-right.png" alt="Next" class="category-right">',
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                        },
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        },
                    },
                ],
            });
        });
    </script>

    <script>
        function initMap() {
            const address = "<?php echo $eventAddress; ?>";

            const geocoder = new google.maps.Geocoder();

            geocoder.geocode({
                address: address
            }, (results, status) => {
                if (status === "OK" && results[0]) {
                    const location = results[0].geometry.location;

                    const map = new google.maps.Map(document.getElementById("map"), {
                        zoom: 10,
                        center: location,
                    });

                    const marker = new google.maps.Marker({
                        position: location,
                        map: map,
                        title: "<?php echo $name; ?>",
                    });

                    // console.log("Address: " + results[0].formatted_address);

                    // const lat = location.lat();
                    // const lng = location.lng();
                    // const directionsLink = document.getElementById("directions-link");
                    // directionsLink.href = `map.php?lat=${lat}&lng=${lng}`;
                } else {
                    console.error("Geocode was not successful for the following reason: " + status);
                }
            });
        }
    </script>

    <script>
        var ticketData = {};
        var maxTickets = 20;

        function updatePrice(sizeId) {
            if (!ticketData[sizeId]) return;

            var count = ticketData[sizeId].count;
            var pricePerTicket = ticketData[sizeId].pricePerTicket;
            var totalPrice = count * pricePerTicket;

            document.getElementById('price-' + sizeId).textContent = `$${totalPrice.toFixed(2)}`;
            document.getElementById('count-' + sizeId).textContent = count;

            updateTotalPrice();
            updateTotalTicketCount();
            updateTicketArrayDisplay();

            sessionStorage.setItem('ticketData', JSON.stringify(ticketData));

            var totalCount = 0;
            for (var key in ticketData) {
                if (ticketData.hasOwnProperty(key)) {
                    totalCount += ticketData[key].count;
                }
            }
            document.querySelector('.ticket-proceed').style.display = totalCount > 0 ? 'block' : 'none';
        }

        function initTicket(sizeId, pricePerTicket, name, description, tax) {
            ticketData[sizeId] = {
                count: 0,
                pricePerTicket: pricePerTicket,
                name: name,
                description: description,
                tax: tax
            };
        }

        function updateTotalPrice() {
            var totalPrice = 0;
            for (var key in ticketData) {
                if (ticketData.hasOwnProperty(key)) {
                    totalPrice += ticketData[key].count * ticketData[key].pricePerTicket;
                }
            }
            document.querySelector('.rate').textContent = `$${totalPrice.toFixed(2)}`;
            document.getElementById('t-price').textContent = `$${totalPrice.toFixed(2)}`;
        }

        function updateTotalTicketCount() {
            var totalCount = 0;
            for (var key in ticketData) {
                if (ticketData.hasOwnProperty(key)) {
                    totalCount += ticketData[key].count;
                }
            }
            document.querySelector('.t-number').textContent = totalCount;
            document.getElementById('t-count').textContent = totalCount;

            if (totalCount === 0) {
                document.querySelector('.ticket-proceed').style.display = 'none';
            } else {
                document.querySelector('.ticket-proceed').style.display = 'block';
            }
        }

        function updateTicketArrayDisplay() {
            var cart_events = [];

            for (var key in ticketData) {
                if (ticketData.hasOwnProperty(key) && ticketData[key].count > 0) {
                    cart_events.push({
                        id: key,
                        name: ticketData[key].name,
                        count: ticketData[key].count,
                        totalPrice: (ticketData[key].count * ticketData[key].pricePerTicket).toFixed(2)
                    });
                }
            }

            var displayDiv = document.getElementById('selected-tickets');
            displayDiv.innerHTML = '';

            cart_events.forEach(function(ticket) {
                var ticketHTML = `
            <div class="total-ticket-area" data-id="${ticket.id}">
                <div class="container">
                    <div class="card-info row">
                        <div class="col-4 col-md-4">
                            <div class="event-name">
                                <h5>${ticket.name}</h5>
                            </div>
                        </div>
                        <div class="col-4 col-md-4 text-center mob-v">
                            <div class="t-counter">
                                <button class="decrease" data-id="${ticket.id}">-</button>
                                <span class="count">${ticket.count}</span>
                                <button class="increase" data-id="${ticket.id}">+</button>
                            </div>
                        </div>
                        <div class="col-4 col-md-4">
                            <div class="price">
                                <h5>$<span class="price-value">${ticket.totalPrice}</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;

                displayDiv.innerHTML += ticketHTML;
            });

            attachDynamicButtonListeners();
        }

        // function updateTicketArrayDisplay() {
        //     var cart_events = [];

        //     for (var key in ticketData) {
        //         if (ticketData.hasOwnProperty(key) && ticketData[key].count > 0) {
        //             cart_events.push({
        //                 id: key,
        //                 name: ticketData[key].name,
        //                 count: ticketData[key].count,
        //                 totalPrice: (ticketData[key].count * ticketData[key].pricePerTicket).toFixed(2)
        //             });
        //         }
        //     }

        //     var displayDiv = document.getElementById('selected-tickets');
        //     displayDiv.innerHTML = ''; 

        //     if (cart_events.length === 0) {

        //         document.getElementById('ticket-info').style.display = 'none';
        //         document.querySelector('.event-detail').classList.remove('fade-background');
        //     } else {

        //         // document.getElementById('ticket-info').style.display = 'block';

        //         cart_events.forEach(function(ticket) {
        //             var ticketHTML = `
        //                 <div class="total-ticket-area" data-id="${ticket.id}">
        //                     <div class="container">
        //                         <div class="card-info row">
        //                             <div class="col-md-4">
        //                                 <div class="event-name">
        //                                     <h5>${ticket.name}</h5>
        //                                 </div>
        //                             </div>
        //                             <div class="col-6 col-md-4 text-center mob-v">
        //                                 <div class="t-counter">
        //                                     <button class="decrease" data-id="${ticket.id}">-</button>
        //                                     <span class="count">${ticket.count}</span>
        //                                     <button class="increase" data-id="${ticket.id}">+</button>
        //                                 </div>
        //                             </div>
        //                             <div class="col-6 col-md-4">
        //                                 <div class="price">
        //                                     <h5>$<span class="price-value">${ticket.totalPrice}</span></h5>
        //                                 </div>
        //                             </div>
        //                         </div>
        //                     </div>
        //                 </div>
        //             `;
        //             displayDiv.innerHTML += ticketHTML;
        //         });

        //         attachDynamicButtonListeners();
        //     }
        // }

        function attachDynamicButtonListeners() {
            document.querySelectorAll('#selected-tickets .decrease').forEach(function(button) {
                button.addEventListener('click', function() {
                    var sizeId = this.getAttribute('data-id');
                    if (ticketData[sizeId] && ticketData[sizeId].count > 0) {
                        ticketData[sizeId].count--;
                        updatePrice(sizeId);
                        // updateTicketArrayDisplay();
                    }
                });
            });

            document.querySelectorAll('#selected-tickets .increase').forEach(function(button) {
                button.addEventListener('click', function() {
                    var sizeId = this.getAttribute('data-id');
                    if (ticketData[sizeId] && ticketData[sizeId].count < maxTickets) {
                        ticketData[sizeId].count++;
                        updatePrice(sizeId);
                        // updateTicketArrayDisplay();

                        const ticketElement = this.closest('.card-info').querySelector('.event-name h5');
                        if (ticketElement) {
                            const ticketName = ticketElement.textContent;

                            animateAddToCart(ticketElement, ticketName);
                        } else {
                            console.error('Ticket name element not found in .event-name h5.');
                        }

                        setTimeout(() => {
                            updateTicketArrayDisplay();
                        }, 1000);

                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Maximum Limit Reached',
                            text: 'You can only select a maximum of 20 tickets!',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });

            function animateAddToCart(ticketNameElement, ticketName) {
                const animatedName = document.createElement('span');
                animatedName.textContent = ticketName;
                animatedName.classList.add('cart-animation');

                document.body.appendChild(animatedName);

                const namePosition = ticketNameElement.getBoundingClientRect();
                animatedName.style.position = 'absolute';
                animatedName.style.top = `${namePosition.top + window.scrollY}px`;
                animatedName.style.left = `${namePosition.left + window.scrollX}px`;

                const proceedButton = document.querySelector('.btn-process');
                const buttonPosition = proceedButton.getBoundingClientRect();
                const buttonTop = buttonPosition.top + window.scrollY;
                const buttonLeft = buttonPosition.left + window.scrollX;

                setTimeout(() => {
                    animatedName.style.transition = 'all 1s ease';
                    animatedName.style.top = `${buttonTop}px`;
                    animatedName.style.left = `${buttonLeft}px`;
                    animatedName.style.opacity = '0';
                }, 10);

                setTimeout(() => {
                    animatedName.remove();
                }, 1000);
            }

        }

        document.addEventListener('DOMContentLoaded', function() {

            <?php

            $eid = isset($_GET['eid']) ? htmlspecialchars($_GET['eid']) : 'Unknown Event ID';
            echo "const eid = '{$eid}';\n";

            $name = isset($result['name']) ? htmlspecialchars($result['name']) : 'Unknown Event';
            $eventDate = isset($result['fromDate']) ? htmlspecialchars($result['fromDate']) : 'Unknown Date';
            $eventTime = isset($result['time']) ? htmlspecialchars($result['time']) : 'Unknown Time';
            $eventCost = isset($result['costRange']) ? htmlspecialchars($result['costRange']) : 'Unknown Cost';
            $photo = isset($result['photo']) ? htmlspecialchars($result['photo']) : 'default-banner.jpg';
            $sid = isset($result['sid']) ? htmlspecialchars($result['sid']) : 'Unknown sid';
            $sname = isset($result['store_name']) ? htmlspecialchars($result['store_name']) : 'Unknown sname';
            $pid = isset($result['pid']) ? htmlspecialchars($result['pid']) : 'Unknown pid';
            $deliveryDate = isset($result['fromDate']) ? htmlspecialchars($result['fromDate']) : 'Unknown deliveryDate';
            $deliveryFromTime = isset($result['time']) ? htmlspecialchars($result['time']) : 'Unknown deliveryFromTime';

            $eventDate = isset($result['dateRange']) ? htmlspecialchars($result['dateRange']) : 'Unknown Date';
            $eventTime = isset($result['time']) ? htmlspecialchars($result['time']) : 'Unknown Time';
            $simg = isset($result['store_icon']) ? htmlspecialchars($result['store_icon']) : 'Unknown store icon';


            $deliveryDisplayDate = $eventDate . " | " . $eventTime;

            echo "const name = '{$name}';\n";
            echo "const eventDate = '{$eventDate}';\n";
            echo "const eventTime = '{$eventTime}';\n";
            echo "const eventCost = '{$eventCost}';\n";
            echo "const photo = '{$photo}';\n";
            echo "const sid = '{$sid}';\n";
            echo "const sname = '{$sname}';\n";
            echo "const pid = '{$pid}';\n";
            echo "const deliveryDate = '{$deliveryDate}';\n";
            echo "const deliveryFromTime = '{$deliveryFromTime}';\n";
            echo "const deliveryDisplayDate = '{$deliveryDisplayDate}';\n";
            echo "const simg = '{$simg}';\n";



            foreach ($result['lstSizes'] as $size) {
                $sizeId = isset($size['sizeid']) ? htmlspecialchars($size['sizeid']) : 'unknown';
                $sizeCost = htmlspecialchars($size['cost']);
                $sizeName = htmlspecialchars($size['name']);
                $sizeDesc = htmlspecialchars($size['desp']);
                $sizeTax = htmlspecialchars($size['tax']);
                echo "initTicket('{$sizeId}', {$sizeCost}, '{$sizeName}', '{$sizeDesc}', '{$sizeTax}');";
            }

            ?>

            const storedTicketData = sessionStorage.getItem('ticketData');
            if (storedTicketData) {
                ticketData = JSON.parse(storedTicketData);
                updateTicketArrayDisplay();
                updateTotalPrice();
                updateTotalTicketCount();
            }

            const savedTicketData = JSON.parse(sessionStorage.getItem('ticketData')) || {};

            for (const sizeId in savedTicketData) {
                if (savedTicketData.hasOwnProperty(sizeId)) {
                    const ticketInfo = savedTicketData[sizeId];

                    // Update count
                    const countElement = document.getElementById(`count-${sizeId}`);
                    if (countElement) {
                        countElement.textContent = ticketInfo.count;
                    }

                    // Update price
                    const priceElement = document.getElementById(`price-${sizeId}`);
                    if (priceElement) {
                        const totalPrice = ticketInfo.count * ticketInfo.pricePerTicket;
                        priceElement.textContent = `$${totalPrice.toFixed(2)}`;
                    }
                }
            }

            document.querySelectorAll('.decrease').forEach(function(button) {
                button.addEventListener('click', function() {
                    var sizeId = this.getAttribute('data-id');
                    if (ticketData[sizeId].count > 0) {
                        ticketData[sizeId].count--;
                        updatePrice(sizeId);
                        updateTicketArrayDisplay();

                        document.querySelector('.btn-process').style.display = 'block';
                        document.querySelector('.btn-ticket').style.display = 'none';
                    }
                });
            });

            document.querySelectorAll('.increase').forEach(function(button) {
                button.addEventListener('click', function() {
                    var sizeId = this.getAttribute('data-id');
                    if (ticketData[sizeId].count < maxTickets) {
                        ticketData[sizeId].count++;
                        updatePrice(sizeId);
                        updateTicketArrayDisplay();

                        const ticketElement = this.closest('.card-info').querySelector('.event-name .tick-name');
                        const ticketName = ticketElement.textContent;

                        animateAddToCart(ticketElement, ticketName);

                        setTimeout(() => {
                            updateTicketArrayDisplay();
                        }, 1000);

                        document.querySelector('.btn-process').style.display = 'block';
                        document.querySelector('.btn-ticket').style.display = 'none';

                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Maximum Limit Reached',
                            text: 'You can only select a maximum of 20 tickets!',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });

            function animateAddToCart(ticketNameElement, ticketName) {
                const animatedName = document.createElement('span');
                animatedName.textContent = ticketName;
                animatedName.classList.add('cart-animation');

                document.body.appendChild(animatedName);

                const namePosition = ticketNameElement.getBoundingClientRect();
                animatedName.style.position = 'absolute';
                animatedName.style.top = `${namePosition.top + window.scrollY}px`;
                animatedName.style.left = `${namePosition.left + window.scrollX}px`;

                const proceedButton = document.querySelector('.btn-process');
                const buttonPosition = proceedButton.getBoundingClientRect();
                const buttonTop = buttonPosition.top + window.scrollY;
                const buttonLeft = buttonPosition.left + window.scrollX;

                setTimeout(() => {
                    animatedName.style.transition = 'all 1s ease';
                    animatedName.style.top = `${buttonTop}px`;
                    animatedName.style.left = `${buttonLeft}px`;
                    animatedName.style.opacity = '0';
                }, 10);

                setTimeout(() => {
                    animatedName.remove();
                }, 1000);
            }

            document.querySelector('.btn-process').addEventListener('click', function() {

                var totalQuantity = 0;

                for (var sizeId in ticketData) {
                    if (ticketData.hasOwnProperty(sizeId) && ticketData[sizeId].count > 0) {
                        totalQuantity += ticketData[sizeId].count;
                    }
                }

                if (totalQuantity === 0) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'No Tickets Selected',
                        text: 'Please select at least one ticket before proceeding.',
                        confirmButtonText: 'OK'
                    });
                    return;
                }

                var ticketsToSave = [];
                var addOns = [];
                var totalQuantity = 0;
                var addOnSizeIds = [];
                var addOnBaseQtys = [];
                var addOnQtys = [];
                var totalTax = 0;
                var totalCost = 0;
                var allRemarks = [];

                for (var sizeId in ticketData) {
                    if (ticketData.hasOwnProperty(sizeId) && ticketData[sizeId].count > 0) {
                        var ticketTax = parseFloat(ticketData[sizeId].tax) * ticketData[sizeId].count;
                        var ticketCost = parseFloat(ticketData[sizeId].pricePerTicket) * ticketData[sizeId].count;
                        totalTax += ticketTax;
                        totalCost += ticketCost;

                        var ticket = {
                            pid: pid,
                            name: ticketData[sizeId].name,
                            qty: ticketData[sizeId].count.toString(),
                            size: "",
                            sizeid: sizeId,
                            cost: ticketData[sizeId].pricePerTicket,
                            tax: ticketTax.toFixed(2)

                        };

                        ticketsToSave.push(ticket);
                        addOns.push(ticket);

                        allRemarks.push(`${ticketData[sizeId].name}(x${ticketData[sizeId].count})`);

                        addOnSizeIds.push(sizeId);
                        addOnBaseQtys.push(ticketData[sizeId].count);
                        addOnQtys.push(ticketData[sizeId].count);

                        totalQuantity += ticketData[sizeId].count;
                    }
                }

                const serviceFeeRate = 0.075; // 7.5% service fee
                const serviceFeeValue = (totalCost * serviceFeeRate).toFixed(2);
                const convenienceFeeRate = 0.035; // 3.5% convenience fee
                const convenienceFeevalue = (totalCost * convenienceFeeRate).toFixed(2);

                var response = {
                    cart_type: "events",
                    section: "events",
                    section_type: "events",
                    sid: sid,
                    sname: sname,
                    simg: simg,
                    smin: "0",
                    minorder: "0",
                    pid: pid,
                    eid: eid,
                    totalcalcqty: totalQuantity,
                    servicefeevalue: serviceFeeValue,
                    conveniencefeevalue: convenienceFeevalue,
                    cartid: cartID,
                    name: name,
                    deliveryType: "free",
                    qty: 1,
                    price: totalCost.toFixed(2),
                    baseTax: totalTax.toFixed(2),
                    tax: totalTax.toFixed(2),
                    calcprice: totalCost.toFixed(2),
                    total: totalCost.toFixed(2),
                    photo: photo,
                    remarks: allRemarks.join(", "),
                    customize: allRemarks.join(", "),
                    addOns: addOns,
                    add_on_sizeids: addOnSizeIds.join(","),
                    addOnBaseQtys: addOnBaseQtys.join(","),
                    addOnQtys: addOnQtys.join(","),
                    deliveryDate: deliveryDate,
                    deliveryDisplayDate: deliveryDisplayDate,
                    deliveryFromTime: deliveryFromTime,
                    deliveryToTime: "",
                    OrgainicPro: true
                };



                // sessionStorage.setItem('cart_events', JSON.stringify(ticketsToSave));
                sessionStorage.setItem('cart_events', JSON.stringify(response));

                var totalCount = document.getElementById('t-count').textContent;
                var totalPrice = document.getElementById('t-price').textContent;

                sessionStorage.setItem('totalCount', totalCount);
                sessionStorage.setItem('totalPrice', totalPrice);
                sessionStorage.setItem('name', name);
                sessionStorage.setItem('eventDate', eventDate);
                sessionStorage.setItem('eventTime', eventTime);
                sessionStorage.setItem('eventCost', eventCost);
                sessionStorage.setItem('photo', photo);
                sessionStorage.setItem('sid', sid);
                sessionStorage.setItem('sname', sname);
                sessionStorage.setItem('pid', pid);
                sessionStorage.setItem('deliveryDate', deliveryDate);
                sessionStorage.setItem('deliveryFromTime', deliveryFromTime);
                sessionStorage.setItem('deliveryDisplayDate', deliveryDisplayDate);
                sessionStorage.setItem('simg', simg);
                sessionStorage.setItem('totalPrice', totalCost.toFixed(2));
                sessionStorage.setItem('totalTax', totalTax.toFixed(2));
                sessionStorage.setItem('serviceFee', serviceFeeValue);

                document.querySelector('.ticket-proceed').style.display = 'none';

                window.location.href = 'order';
            });

            updateTotalTicketCount();
            updateTotalPrice();
            updateTicketArrayDisplay();
        });
    </script>

    <script>
        var cartID = <?php echo isset($_SESSION['cartID']) ? $_SESSION['cartID'] : 'null'; ?>;
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            document.querySelector('.btn-process').addEventListener('click', function(event) {
                event.preventDefault();

                document.querySelector('.event-detail').classList.remove('fade-background');

                if (document.getElementById('d-arrow').style.display === 'inline') {
                    document.getElementById('ticket-info').style.display = 'none';
                    document.querySelector('.ticket-proceed').style.display = 'none';
                }
            });

            document.getElementById('d-arrow').addEventListener('click', function() {
                document.getElementById('ticket-info').style.display = 'none';
                document.getElementById('d-arrow').style.display = 'none';
                document.getElementById('u-arrow').style.display = 'inline';

                document.querySelector('.event-detail').classList.remove('fade-background');
                document.querySelector('.side-area.side-fixed').style.zIndex = '1';
            });

            document.getElementById('u-arrow').addEventListener('click', function() {
                document.getElementById('ticket-info').style.display = 'block';
                document.getElementById('u-arrow').style.display = 'none';
                document.getElementById('d-arrow').style.display = 'inline';

                document.querySelector('.event-detail').classList.add('fade-background');
                document.querySelector('.side-area.side-fixed').style.zIndex = '0';
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const soldPElements = document.querySelectorAll('.sold-p.para');

            soldPElements.forEach(function(paragraph) {
                const fullText = paragraph.textContent.trim();
                const charLimit = 40;

                if (fullText.length > charLimit) {
                    const trimmedText = fullText.slice(0, charLimit) + '...';
                    paragraph.textContent = trimmedText;

                    const showMoreLink = paragraph.parentNode.querySelector('.show-more');
                    showMoreLink.style.display = 'inline';

                    showMoreLink.addEventListener('click', function(event) {
                        event.preventDefault();
                        const isShowingMore = paragraph.textContent === fullText;

                        paragraph.textContent = isShowingMore ? trimmedText : fullText;
                        showMoreLink.textContent = isShowingMore ? 'Show more' : 'Show less';
                    });
                } else {
                    const showMoreLink = paragraph.parentNode.querySelector('.show-more');
                    if (showMoreLink) {
                        showMoreLink.style.display = 'none';
                    }
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const side = document.querySelector('.summery-p');
            const sideSocial = document.querySelector('.social-p');
            const eventDetail = document.querySelector('.event-detail');

            function applyScrollBehavior() {
                const sideHeight = side.offsetHeight;
                const sideSocialHeight = sideSocial.offsetHeight;
                const eventDetailHeight = eventDetail.offsetHeight;
                const eventDetailOffsetTop = eventDetail.offsetTop;
                const eventDetailBottom = eventDetailOffsetTop + eventDetailHeight;

                window.addEventListener('scroll', function() {
                    const scrollY = window.scrollY;

                    // Disable for mobile screens (width <= 768px)
                    if (window.innerWidth <= 768) {
                        side.style.position = 'relative';
                        side.style.top = 'initial';
                        sideSocial.style.position = 'relative';
                        sideSocial.style.top = 'initial';
                        sideSocial.style.display = 'block';
                        return; // Exit early
                    }

                    const stopStickPosition = eventDetailBottom - sideHeight;
                    const stopSocialStickPosition = eventDetailBottom - sideSocialHeight;

                    if (scrollY >= eventDetailOffsetTop && scrollY <= stopStickPosition) {
                        side.style.position = 'fixed';
                        side.style.top = '10px';
                    } else if (scrollY > stopStickPosition) {
                        side.style.position = 'absolute';
                        side.style.top = `${eventDetailBottom - sideHeight}px`;
                    } else {
                        side.style.position = 'relative';
                        side.style.top = 'initial';
                    }

                    if (scrollY >= eventDetailOffsetTop && scrollY <= stopSocialStickPosition) {
                        sideSocial.style.position = 'fixed';
                        // sideSocial.style.top = '66%';
                        sideSocial.style.display = 'none';
                    } else if (scrollY > stopSocialStickPosition) {
                        sideSocial.style.position = 'absolute';
                        sideSocial.style.top = `${eventDetailBottom - sideSocialHeight}px`;
                    } else {
                        sideSocial.style.position = 'relative';
                        sideSocial.style.top = 'initial';
                        sideSocial.style.display = 'block';
                    }
                });
            }

            applyScrollBehavior();

            // Reapply scroll behavior on window resize
            window.addEventListener('resize', applyScrollBehavior);
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sideArea = document.querySelector('.side-area.side-fixed');
            const socialArea = document.querySelector('.side-area-social.social-side-fixed');
            const eventDetail = document.querySelector('.event-detail');

            function applyScrollBehavior() {
                const sideHeight = sideArea.offsetHeight;
                const eventDetailHeight = eventDetail.offsetHeight;
                const eventDetailOffsetTop = eventDetail.offsetTop;
                const eventDetailBottom = eventDetailOffsetTop + eventDetailHeight;

                const scrollY = window.scrollY;

                // Disable fixed positioning for mobile screens (width <= 768px)
                if (window.innerWidth <= 768) {
                    sideArea.style.position = 'relative';
                    socialArea.style.position = 'relative';
                    socialArea.style.top = 'initial';
                    socialArea.style.marginTop = '0';
                    return;
                }

                const sideAreaBottom = sideArea.getBoundingClientRect().bottom + scrollY;

                if (scrollY >= eventDetailOffsetTop && sideAreaBottom + socialArea.offsetHeight <= eventDetailBottom) {

                    socialArea.style.position = 'fixed';
                    socialArea.style.top = `${sideArea.getBoundingClientRect().bottom + 10}px`;
                    socialArea.style.marginTop = '0';
                } else if (scrollY + socialArea.offsetHeight > eventDetailBottom) {

                    socialArea.style.position = 'absolute';
                    socialArea.style.top = `${eventDetailBottom - socialArea.offsetHeight - eventDetailOffsetTop}px`;
                    socialArea.style.marginTop = '10px';
                } else {

                    socialArea.style.position = 'absolute';
                    socialArea.style.top = `${sideAreaBottom - eventDetailOffsetTop}px`;
                    socialArea.style.marginTop = '10px';
                }
            }

            function initializePosition() {
                if (window.innerWidth > 768) {
                    const sideAreaBottom = sideArea.getBoundingClientRect().bottom + window.scrollY;
                    socialArea.style.position = 'absolute';
                    socialArea.style.top = `${sideAreaBottom - eventDetail.offsetTop + 10}px`;
                    socialArea.style.marginTop = '10px';
                } else {
                    socialArea.style.position = 'relative';
                    socialArea.style.top = 'initial';
                    socialArea.style.marginTop = '0';
                }
            }

            initializePosition();

            window.addEventListener('scroll', applyScrollBehavior);
            window.addEventListener('resize', () => {
                initializePosition();
                applyScrollBehavior();
            });
        });
    </script>

    <script>
        var eventId = <?php echo json_encode($event_id); ?>;
        console.log("Event ID:", eventId);
    </script>


</body>
<?php include 'footer.php'; ?>

</html>