<?php

// $login_api_url = 'https://devrestapi.goquicklly.com/login';
// $login_data = array(
//     "email" => getenv('LOGIN_EMAIL'),
//     "password" => getenv('LOGIN_PASSWORD')
// );

// $ch = curl_init($login_api_url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($login_data));
// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//     'Content-Type: application/json'
// ));

// $login_response = curl_exec($ch);
// curl_close($ch);

// $login_result = json_decode($login_response, true);

// if (isset($login_result['token'])) {
//     $bearer_token = htmlspecialchars($login_result['token']);

//     echo "<script>
//             localStorage.setItem('bearer_token', '$bearer_token');
//           </script>";

//     $api_url = 'https://devrestapi.goquicklly.com/events/get-home-data';

//     $data = array(
//         "zipcode" => "60610",
//         "query" => "",
//         "catID" => "0",
//         "city" => "",
//         "page" => "0",
//         "sendFilters" => "true"
//     );

//     $ch = curl_init($api_url);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_POST, true);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
//     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//         'Content-Type: application/json',
//         'Authorization: Bearer ' . $bearer_token
//     ));

//     $response = curl_exec($ch);
//     curl_close($ch);

//     $result = json_decode($response, true);

//     if ($result['success']) {
//         $cities = $result['lstCites'];
//         $categories = $result['lstCats'];
//     } else {
//         $eventName = "Event not found";
//     }
// } else {
//     echo "Login failed: " . htmlspecialchars($login_result['message']);
// }

session_start();

// echo $_SESSION['bearer_token'];

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
    // Store the token in session
    $_SESSION['bearer_token'] = $login_result['token'];
    $bearer_token = $_SESSION['bearer_token']; // Retrieve token from session

    $api_url = 'https://devrestapi.goquicklly.com/events/get-home-data';
    $data = array(
        "zipcode" => "60610",
        "query" => "",
        "catID" => "0",
        "city" => "",
        "page" => "0",
        "sendFilters" => "true"
    );

    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $_SESSION['bearer_token']
    ));

    $response = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($response, true);

    if (isset($result['success']) && $result['success']) {
        $cities = $result['lstCites'];
        $categories = $result['lstCats'];
    } else {
        $eventName = "Event not found";
    }
} else {
    // echo "Login failed: " . htmlspecialchars($login_result['message'] ?? 'Unknown error');
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'" media="all">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <script src="js/common-script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        button.swal2-confirm.swal2-styled {
            background: #F05336 !important;
        }
    </style>
</head>

<body>
    <div class="topheader">
        <div class="container-fluid">
            <div class="row">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="col">
                            <div class="logo_left">
                                <a href="/"><img src="images/logo.png" alt="logo"></a>
                            </div>
                        </div>
                        <div class="col bro-mob">
                            <div class="browse">
                                <span>Browse events</span>
                            </div>
                        </div>
                        <div class="collapse navbar-collapse">
                            <div class="city-filter">
                                <form id="indexForm" class="d-flex search-container mb-0" role="search">
                                    <select class="form-select state" id="citySelect" aria-label="Default select example">
                                        <option value="">Select City</option>
                                        <?php
                                        if (!empty($cities)) {
                                            foreach ($cities as $city) {
                                                $city = htmlspecialchars($city);
                                                echo "<option value='$city'>$city</option>";
                                            }
                                        } else {
                                            echo "<option>No cities available</option>";
                                        }

                                        ?>
                                    </select>
                                </form>
                            </div>
                            <div class="col">
                                <div class="right_btn d-flex align-items-center">
                                    <button class="btn_create"><img src="images/add-icon.png"> Create Event</button>
                                    <button class="btn_signup" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</button>
                                    <div class="dropdown" style="display: none;">
                                        <button class="btn dropdown-toggle login-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">

                                        </button>
                                        <ul class="dropdown-menu custom-dropdown-menu">
                                            <li><a class="dropdown-item" href="account">My Account</a></li>
                                            <li><a class="dropdown-item" href="booking">My Bookings</a></li>
                                            <li><a class="dropdown-item" href="" id="logoutBtn">Logout</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</body>
<?php
include 'login-page.php';
?>


<!-- <script>
    $(document).ready(function() {
        let ajaxRequest;

        $("#citySelect").on("change", function() {
            const selectedCity = $(this).val();

            if (ajaxRequest) {
                ajaxRequest.abort(); 
            }

            if (selectedCity) {
                searchEvents(selectedCity); 
            } else {
                
                $("#city-results").html("").css("padding", "0");
                $("#loader").hide();
                $("#loaderOverlay").hide();
            }
        });

        function searchEvents(selectedCity) {
            $("#loaderOverlay").show();
            $("#loader").show();

            ajaxRequest = $.ajax({
                type: "POST",
                url: "get_home_data.php",
                data: {
                    city: selectedCity,
                },
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        displayEvents(response.events);
                    } else {
                        $("#city-results").html("<p>No events found for the selected city.</p>");
                    }
                },
                error: function(xhr, status, error) {
                    if (status !== "abort") {
                        console.error("An error occurred:", error);
                    }
                },
                complete: function() {
                    $("#loaderOverlay").hide();
                },
            });
        }

        function displayEvents(events) {
            let html = '<div class="row row-cols-1 row-cols-md-3 g-4">';

            events.forEach((event, index) => {
                const cardClass = (index % 3 === 0) ? 'first' : (index % 3 === 1 ? 'sec' : 'third');
                const trimmedName = event.name.length > 54 ? event.name.substring(0, 54) + '...' : event.name;
                const day = event.dayMonth.substring(0, 2);
                const month = event.dayMonth.substring(2);

                html += `
            <div class="col">
                <div class="card ${cardClass}">
                    <a href="event-detail?eid=${event.eid}">
                        <span class="date">
                            <p class="date-a">${day}</p>
                            <p class="month-a">${month}</p>
                        </span>
                        <img src="${event.photo}" class="card-img-top main-img" alt="Event Image">
                        <div class="card-body">
                            <h5 class="card-title">${trimmedName}</h5>
                            <h4 class="time">${event.dateRange}</h4>
                            <h5 class="location">${event.venue}</h5>
                            <p class="desc">${event.organiser}</p>
                            <span class="price">Starting at ${event.costRange}</span>`;

                if (event.discountTxt) {
                    html += `<span class="price-icon"><img src="images/discount-icon.png" alt=""> ${event.discountTxt}</span>`;
                }

                html += `
                        </div>
                    </a>
                </div>
            </div>`;
            });

            html += '</div>';
            $("#city-results").html(html).css("padding", "35px 0"); 
        }
    });
</script> -->

<script>
    $(document).ready(function() {
        let ajaxRequest;

        $("#citySelect").on("change", function() {
            const selectedCity = $(this).val();

            if (ajaxRequest) {
                ajaxRequest.abort();
            }

            if (selectedCity) {
                toggleVisibility(false); 
                searchEvents(selectedCity);
            } else {
                $("#city-results").html("").css("padding", "0");
                $("#Cityloader").hide();
                $("#CityloaderOverlay").hide();
                toggleVisibility(true); 
            }
        });

        function searchEvents(selectedCity) {
            $("#CityloaderOverlay").show();
            $("#Cityloader").show();

            ajaxRequest = $.ajax({
                type: "POST",
                url: "get_home_data.php",
                data: {
                    city: selectedCity,
                },
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        displayEvents(response.events);
                    } else {
                        $("#city-results").html("<p>No events found for the selected city.</p>");
                    }
                },
                error: function(xhr, status, error) {
                    if (status !== "abort") {
                        console.error("An error occurred:", error);
                    }
                },
                complete: function() {
                    $("#CityloaderOverlay").hide();
                },
            });
        }

        function displayEvents(events) {
            let html = '<div class="row row-cols-1 row-cols-md-3 g-4">';

            events.forEach((event, index) => {
                const cardClass = (index % 3 === 0) ? 'first' : (index % 3 === 1) ? 'sec' : 'third';
                const trimmedName = event.name.length > 54 ? event.name.substring(0, 54) + '...' : event.name;
                const day = event.dayMonth.substring(0, 2);
                const month = event.dayMonth.substring(2);

                html += `
            <div class="col">
                <div class="card ${cardClass}">
                    <a href="event-detail?eid=${event.eid}">
                        <span class="date">
                            <p class="date-a">${day}</p>
                            <p class="month-a">${month}</p>
                        </span>
                        <img src="${event.photo}" class="card-img-top main-img" alt="Event Image">
                        <div class="card-body">
                            <h5 class="card-title">${trimmedName}</h5>
                            <h4 class="time">${event.dateRange}</h4>
                            <h5 class="location">${event.venue}</h5>
                            <p class="desc">${event.organiser}</p>
                            <span class="price">Starting at ${event.costRange}</span>`;

                if (event.discountTxt) {
                    html += `<span class="price-icon"><img src="images/discount-icon.png" alt=""> ${event.discountTxt}</span>`;
                }

                html += `
                        </div>
                    </a>
                </div>
            </div>`;
            });

            html += '</div>';
            $("#city-results").html(html).css("padding", "35px 0");
        }

        function toggleVisibility(showIndexPage) {
            if (showIndexPage) {
                $("#index-page").show(); 
                $(".city-filter-area").hide(); 
            } else {
                $("#index-page").hide(); 
                $(".city-filter-area").show(); 
            }
        }
    });
</script>


</html>