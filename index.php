<?php
// session_start();
// $_SESSION['value_user_id'] = "12345"; 
// header('Content-Type: application/json');

// echo json_encode(array(
//     'value_user_id' => isset($_SESSION['value_user_id']) ? $_SESSION['value_user_id'] : 'No User ID'
// ));
?>
<!DOCTYPE html>
<html>

<head>
    <?php include 'header-main.php'; ?>
    <link rel="shortcut icon" href="images/favicon.png">

    <style>
        input[type="search"]::-webkit-search-cancel-button {
            -webkit-appearance: none;
            appearance: none;
        }

        .slider-wrapper {
            /* width: 90%; */
            margin: 20px auto;
        }

        .event-card img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }
    </style>
</head>

<body>

    <div class="city-filter-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="CityloaderOverlay" style="display: none;">
                        <div id="Cityloader" style="display: none; font-size: 18px; text-align: center; padding: 20px;">
                            <img src="images/logo.png" alt="Loading...">
                        </div>
                    </div>
                    <div id="city-results"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="index-page" class="index-page">
        <div class="home-banner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="banner-text">
                            <h2>Lorem ipsum dolor sit amet</h2>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr sed diam</p>
                            <div class="search-area row">
                                <div class="col-3">
                                    <select class="form-select form-select-lg country" id="countrySelect" aria-label="Large select example">
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
                                </div>
                                <div class="col-9">
                                    <form class="d-flex" id="searchForm" role="search" onsubmit="return false;">
                                        <input class="form-control search-form" id="searchInput" type="search" placeholder="Search events…" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-filter">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="loaderOverlay" style="display: none;">
                            <div id="loader" style="display: none; font-size: 18px; text-align: center; padding: 20px;">
                                <img src="images/logo.png" alt="Loading...">
                            </div>
                        </div>
                        <div id="search-results" class="mt-3"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="category-area">
            <div class="container">
                <div class="row">
                    <div class="category-slider">
                        <?php
                        if (!empty($result['lstCats'])) {
                            $categories = $result['lstCats'];

                            foreach ($categories as $category) {
                                $catName = htmlspecialchars($category['name']);
                                $catImage = htmlspecialchars($category['img']);
                                $catID = htmlspecialchars($category['catID']);

                                $formattedCatName = $catName;
                                
                                echo '<div class="category-slide">';
                                echo '    <a href="javascript:void(0)" class="category-item" data-catid="' . $catID . '">';
                                echo '        <img src="' . $catImage . '" alt="' . $catName . '" class="img-fluid">';
                                // echo '        <p class="text-center">' . $catName . '</p>';
                                echo '        <p class="text-center category-name">' . $formattedCatName . '</p>';
                                echo '    </a>';
                                echo '</div>';
                            }
                        } else {
                            echo '<div>No categories available</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="category-filter">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="CategoryloaderOverlay" style="display: none;">
                            <div id="Categoryloader" style="display: none; font-size: 18px; text-align: center; padding: 20px;">
                                <img src="images/logo.png" alt="Loading...">
                            </div>
                        </div>
                        <div id="category-results" class="mt-3"></div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="category-filter">
            <div id="CategoryloaderOverlay" style="display: none;">
                <div id="Categoryloader">
                    <img src="images/logo.png" alt="Loading...">
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="category-results" class="mt-3"></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="popular-event">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading-top">
                            <h2>Popular Events in Chicago</h2>
                        </div>

                        <!-- <div class="nav-tabs-wrapper">
                            <ul class="nav nav-tabs tappes" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active week" id="tab-1" data-bs-toggle="tab" data-bs-target="#tabs-1" type="button" role="tab" aria-controls="tabs-1" aria-selected="true">
                                        This Week
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link weekend" id="tab-2" data-bs-toggle="tab" data-bs-target="#tabs-2" type="button" role="tab" aria-controls="tabs-2" aria-selected="false">
                                        This Weekend
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link month" id="tab-3" data-bs-toggle="tab" data-bs-target="#tabs-3" type="button" role="tab" aria-controls="tabs-3" aria-selected="false">
                                        This Month
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link all" id="tab-4" data-bs-toggle="tab" data-bs-target="#tabs-4" type="button" role="tab" aria-controls="tabs-4" aria-selected="false">
                                        All
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tabs-1" role="tabpanel" aria-labelledby="tab-1">
                                <div class="row row-cols-1 row-cols-md-3 g-4 mb-5 tab-b">
                                    <?php

                                    $currentDate = new DateTime();

                                    $weekStart = clone $currentDate;
                                    $weekStart->modify('Monday this week');
                                    $weekEnd = clone $currentDate;
                                    $weekEnd->modify('Friday this week');

                                    $foundCurrentWeekEvents = false;

                                    if (isset($result['lstProds']) && count($result['lstProds']) > 0) {
                                        $counter = 1;
                                        foreach ($result['lstProds'] as $event) {

                                            $eventDayMonth = explode(' ', $event['dayMonth']);
                                            $eventMonth = $eventDayMonth[1];
                                            $eventDay = $eventDayMonth[0];

                                            $eventDateRangeParts = explode(' ', $event['dateRange']);
                                            $eventYear = $eventDateRangeParts[2];

                                            $eventDate = DateTime::createFromFormat('Y-M-d', "$eventYear-$eventMonth-$eventDay");

                                            if ($eventDate >= $weekStart && $eventDate <= $weekEnd) {
                                                $foundCurrentWeekEvents = true;

                                                $cardClass = ($counter == 1) ? 'first' : (($counter == 2) ? 'sec' : 'third');

                                                $name = htmlspecialchars($event['name']);
                                                $trimmedName = (strlen($name) > 54) ? substr($name, 0, 54) . '...' : $name;

                                                // $eid = htmlspecialchars($event['eid']);
                                                $slug = htmlspecialchars($event['slug']);


                                                echo '<div class="col">';
                                                // echo '    <div class="card ' . $cardClass . '">';
                                                // echo '      <a href="event-detail?eid=' . $eid . '">';
                                                echo '    <div class="card ' . $cardClass . '" title="Slug: ' . $slug . '">';
                                                echo '      <a href="event-detail?slug=' . $slug . '">';
                                                echo '        <span class="date"><p class="date-a">' . htmlspecialchars($eventDay) . '</p><p class="month-a">' . htmlspecialchars($eventMonth) . '</p></span>';
                                                echo '        <img src="' . htmlspecialchars($event['photo']) . '" class="card-img-top main-img" alt="Event Image">';
                                                echo '        <div class="card-body">';
                                                echo '            <h5 class="card-title">' . $trimmedName . '</h5>';
                                                echo '            <h4 class="time">' . htmlspecialchars($event['dateRange']) . '</h4>';
                                                echo '            <h5 class="location">' . htmlspecialchars($event['venue']) . '</h5>';
                                                echo '            <p class="desc">' . htmlspecialchars($event['organiser']) . '</p>';
                                                echo '            <span class="price">Starting at ' . htmlspecialchars($event['costRange']) . '</span>';

                                                if (!empty($event['discountTxt'])) {
                                                    echo '            <span class="price-icon"><img src="images/discount-icon.png" alt=""> ' . htmlspecialchars($event['discountTxt']) . '</span>';
                                                }

                                                echo '        </div>';
                                                echo '      </a>';
                                                echo '    </div>';
                                                echo '</div>';

                                                $counter++;
                                                if ($counter > 3) {
                                                    $counter = 1;
                                                }
                                            }
                                        }

                                        if (!$foundCurrentWeekEvents) {
                                            echo '<p>No events found for this week.</p>';
                                        }
                                    } else {
                                        echo '<p>No events found or incorrect data structure.</p>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabs-2" role="tabpanel" aria-labelledby="tab-2">
                                <div class="row row-cols-1 row-cols-md-3 g-4 mb-5 tab-b">
                                    <?php
                                    if (isset($result['lstProds']) && count($result['lstProds']) > 0) {
                                        $counter = 1;

                                        $today = new DateTime();
                                        $currentWeekSaturday = (clone $today)->modify('next saturday');
                                        $currentWeekSunday = (clone $today)->modify('next sunday');

                                        foreach ($result['lstProds'] as $event) {
                                            $cardClass = ($counter == 1) ? 'first' : (($counter == 2) ? 'sec' : 'third');

                                            $name = htmlspecialchars($event['name']);
                                            $trimmedName = (strlen($name) > 54) ? substr($name, 0, 54) . '...' : $name;

                                            $day = substr($event['dayMonth'], 0, 2);
                                            $month = substr($event['dayMonth'], 2);

                                            // $eid = htmlspecialchars($event['eid']);
                                            $slug = htmlspecialchars($event['slug']);


                                            $eventDate = DateTime::createFromFormat('dM Y', $day . $month . $today->format('Y'));

                                            if ($eventDate && ($eventDate->format('Y-m-d') == $currentWeekSaturday->format('Y-m-d') || $eventDate->format('Y-m-d') == $currentWeekSunday->format('Y-m-d'))) {
                                                echo '<div class="col">';
                                                // echo '    <div class="card ' . $cardClass . '">';
                                                // echo '      <a href="event-detail?eid=' . $eid . '">';
                                                echo '    <div class="card ' . $cardClass . '" title="Slug: ' . $slug . '">';
                                                echo '      <a href="event-detail?slug=' . $slug . '">';
                                                echo '        <span class="date"><p class="date-a">' . htmlspecialchars($day) . '</p><p class="month-a">' . htmlspecialchars($month) . '</p></span>';
                                                echo '        <img src="' . htmlspecialchars($event['photo']) . '" class="card-img-top main-img" alt="Event Image">';
                                                echo '        <div class="card-body">';
                                                echo '            <h5 class="card-title">' . $trimmedName . '</h5>';
                                                echo '            <h4 class="time">' . htmlspecialchars($event['dateRange']) . '</h4>';
                                                echo '            <h5 class="location">' . htmlspecialchars($event['venue']) . '</h5>';
                                                echo '            <p class="desc">' . htmlspecialchars($event['organiser']) . '</p>';
                                                echo '            <span class="price">Starting at ' . htmlspecialchars($event['costRange']) . '</span>';

                                                if (!empty($event['discountTxt'])) {
                                                    echo '            <span class="price-icon"><img src="images/discount-icon.png" alt=""> ' . htmlspecialchars($event['discountTxt']) . '</span>';
                                                }

                                                echo '        </div>';
                                                echo '      </a>';
                                                echo '    </div>';
                                                echo '</div>';

                                                $counter++;
                                                if ($counter > 3) {
                                                    $counter = 1;
                                                }
                                            }
                                        }

                                        if ($counter == 1) {
                                            echo '<p>No events found for the current weekend.</p>';
                                        }
                                    } else {
                                        echo '<p>No events found or incorrect data structure.</p>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabs-3" role="tabpanel" aria-labelledby="tab-3">
                                <div class="row row-cols-1 row-cols-md-3 g-4 mb-5 tab-b">
                                    <?php
                                    $currentMonth = date('M');
                                    $currentYear = date('Y');

                                    $foundCurrentMonthEvents = false;

                                    if (isset($result['lstProds']) && count($result['lstProds']) > 0) {
                                        $counter = 1;

                                        foreach ($result['lstProds'] as $event) {

                                            $eventDayMonth = explode(' ', $event['dayMonth']);
                                            if (count($eventDayMonth) == 2) {
                                                $eventDay = $eventDayMonth[0];
                                                $eventMonth = $eventDayMonth[1];

                                                $eventDateRangeParts = explode(' ', $event['dateRange']);
                                                if (count($eventDateRangeParts) >= 4) {
                                                    $eventYear = date('Y');

                                                    $eventDate = DateTime::createFromFormat('j M Y', "$eventDay $eventMonth $eventYear");

                                                    if ($eventDate && $eventDate->format('M') == $currentMonth && $eventDate->format('Y') == $currentYear) {
                                                        $foundCurrentMonthEvents = true;

                                                        $cardClass = ($counter == 1) ? 'first' : (($counter == 2) ? 'sec' : 'third');
                                                        $name = htmlspecialchars($event['name']);
                                                        $trimmedName = (strlen($name) > 54) ? substr($name, 0, 54) . '...' : $name;
                                                        // $eid = htmlspecialchars($event['eid']);
                                                        $slug = htmlspecialchars($event['slug']);


                                                        echo '<div class="col" data-date="' . $eventDate->format('Y-m-d') . '">';
                                                        // echo '    <div class="card ' . $cardClass . '">';
                                                        // echo '      <a href="event-detail?eid=' . $eid . '">';
                                                        echo '    <div class="card ' . $cardClass . '" title="Slug: ' . $slug . '">';
                                                        echo '      <a href="event-detail?slug=' . $slug . '">';
                                                        echo '        <span class="date"><p class="date-a">' . htmlspecialchars($eventDay) . '</p><p class="month-a">' . htmlspecialchars($eventMonth) . '</p></span>';
                                                        echo '        <img src="' . htmlspecialchars($event['photo']) . '" class="card-img-top main-img" alt="Event Image">';
                                                        echo '        <div class="card-body">';
                                                        echo '            <h5 class="card-title">' . $trimmedName . '</h5>';
                                                        echo '            <h4 class="time">' . htmlspecialchars($event['dateRange']) . '</h4>';
                                                        echo '            <h5 class="location">' . htmlspecialchars($event['venue']) . '</h5>';
                                                        echo '            <p class="desc">' . htmlspecialchars($event['organiser']) . '</p>';
                                                        echo '            <span class="price">Starting at ' . htmlspecialchars($event['costRange']) . '</span>';

                                                        if (!empty($event['discountTxt'])) {
                                                            echo '            <span class="price-icon"><img src="images/discount-icon.png" alt=""> ' . htmlspecialchars($event['discountTxt']) . '</span>';
                                                        }

                                                        echo '        </div>';
                                                        echo '      </a>';
                                                        echo '    </div>';
                                                        echo '</div>';

                                                        $counter++;
                                                        if ($counter > 3) {
                                                            $counter = 1;
                                                        }
                                                    }
                                                }
                                            }
                                        }

                                        if (!$foundCurrentMonthEvents) {
                                            echo '<p>No events found for the current month.</p>';
                                        }
                                    } else {
                                        echo '<p>No events found or incorrect data structure.</p>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabs-4" role="tabpanel" aria-labelledby="tab-4">
                                <div class="row row-cols-1 row-cols-md-3 g-4 mb-5 tab-b">
                                    <?php
                                    if (isset($result['lstProds']) && count($result['lstProds']) > 0) {
                                        $counter = 1;
                                        foreach ($result['lstProds'] as $event) {

                                            $cardClass = ($counter == 1) ? 'first' : (($counter == 2) ? 'sec' : 'third');

                                            $name = htmlspecialchars($event['name']);
                                            $trimmedName = (strlen($name) > 54) ? substr($name, 0, 54) . '...' : $name;

                                            $day = substr($event['dayMonth'], 0, 2);
                                            $month = substr($event['dayMonth'], 2);

                                            // $eid = htmlspecialchars($event['eid']);
                                            $slug = htmlspecialchars($event['slug']);

                                            echo '<div class="col">';
                                            // echo '    <div class="card ' . $cardClass . '">';
                                            // echo '      <a href="event-detail?eid=' . $eid . '">';
                                            echo '    <div class="card ' . $cardClass . '" title="Slug: ' . $slug . '">';
                                            echo '      <a href="event-detail?slug=' . $slug . '">';
                                            // echo '      <a href="event-detail/' . $slug . '">';
                                            echo '        <span class="date"><p class="date-a">' . htmlspecialchars($day) . '</p><p class="month-a">' . htmlspecialchars($month) . '</p></span>';
                                            echo '        <img src="' . htmlspecialchars($event['photo']) . '" class="card-img-top main-img" alt="Event Image">';
                                            echo '        <div class="card-body">';
                                            echo '            <h5 class="card-title">' . $trimmedName . '</h5>';
                                            // echo '            <h3>' . htmlspecialchars($event['status']) . '</h3>';
                                            echo '            <h4 class="time">' . htmlspecialchars($event['dateRange']) . '</h4>';
                                            echo '            <h5 class="location">' . htmlspecialchars($event['venue']) . '</h5>';
                                            echo '            <p class="desc">' . htmlspecialchars($event['organiser']) . '</p>';
                                            echo '            <span class="price">Starting at ' . htmlspecialchars($event['costRange']) . '</span>';

                                            if (!empty($event['discountTxt'])) {
                                                echo '            <span class="price-icon"><img src="images/discount-icon.png" alt=""> ' . htmlspecialchars($event['discountTxt']) . '</span>';
                                            }

                                            echo '        </div>';
                                            echo '          </a>';
                                            echo '    </div>';
                                            echo '</div>';

                                            $counter++;
                                            if ($counter > 3) {
                                                $counter = 1;
                                            }
                                        }
                                    } else {
                                        echo '<p>No events found or incorrect data structure.</p>';
                                    }

                                    ?>
                                </div>
                            </div>
                        </div> -->

                        <div class="nav-tabs-wrapper">
                            <ul class="nav nav-tabs tappes" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active week" id="tab-1" data-bs-toggle="tab" data-bs-target="#tabs-1" type="button" role="tab" aria-controls="tabs-1" aria-selected="true">
                                        This Week
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link weekend" id="tab-2" data-bs-toggle="tab" data-bs-target="#tabs-2" type="button" role="tab" aria-controls="tabs-2" aria-selected="false">
                                        This Weekend
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link month" id="tab-3" data-bs-toggle="tab" data-bs-target="#tabs-3" type="button" role="tab" aria-controls="tabs-3" aria-selected="false">
                                        This Month
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link all" id="tab-4" data-bs-toggle="tab" data-bs-target="#tabs-4" type="button" role="tab" aria-controls="tabs-4" aria-selected="false">
                                        All
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tabs-1" role="tabpanel" aria-labelledby="tab-1">
                                <div class="row row-cols-1 row-cols-md-3 g-4 mb-5 tab-b">


                                    <?php
                                    // echo date('jM');
                                    $currentDay = date('d');  
                                    $currentMonth = date('M');  
                                    $currentYear = date('Y');  

                                    $nextFriday = new DateTime('next friday');
                                    $today = new DateTime();
                                    $foundEvents = false;

                                    if (isset($result['lstProds']) && count($result['lstProds']) > 0) {
                                        $counter = 1;

                                        foreach ($result['lstProds'] as $event) {
                                            // print_r($event);
                                            $eventDayMonth = explode(' ', $event['dayMonth']);
                                            if (count($eventDayMonth) == 2) {
                                                $eventDay = $eventDayMonth[0];
                                                $eventMonth = $eventDayMonth[1];

                                                $eventDateRangeParts = explode(' ', $event['dateRange']);
                                                if (count($eventDateRangeParts) >= 4) {
                                                    $eventYear = date('Y');  

                                                    $eventDate = DateTime::createFromFormat('j M Y', "$eventDay $eventMonth $eventYear");

                                                    if ($eventDate && $eventDate >= $today->format('Y-m-d') == $eventDate->format('Y-m-d') <= $nextFriday->format('Y-m-d')) {
                                                    // if ($eventDate && $eventDate->format('Y-m-d') == $today->format('Y-m-d')) {
                                                        $foundEvents = true;

                                                        $cardClass = ($counter == 1) ? 'first' : (($counter == 2) ? 'sec' : 'third');
                                                        $name = htmlspecialchars($event['name']);
                                                        $trimmedName = (strlen($name) > 54) ? substr($name, 0, 54) . '...' : $name;
                                                        $slug = htmlspecialchars($event['slug']);

                                                        echo '<div class="col" data-date="' . $eventDate->format('Y-m-d') . '">';
                                                        echo '    <div class="card ' . $cardClass . '" title="Slug: ' . $slug . '">';
                                                        echo '      <a href="event-detail?slug=' . $slug . '">';
                                                        echo '        <span class="date"><p class="date-a">' . htmlspecialchars($eventDay) . '</p><p class="month-a">' . htmlspecialchars($eventMonth) . '</p></span>';
                                                        echo '        <img src="' . htmlspecialchars($event['photo']) . '" class="card-img-top main-img" alt="Event Image">';
                                                        echo '        <div class="card-body">';
                                                        echo '            <h5 class="card-title">' . $trimmedName . '</h5>';
                                                        echo '            <h4 class="time">' . htmlspecialchars($event['dateRange']) . '</h4>';
                                                        echo '            <h5 class="location">' . htmlspecialchars($event['venue']) . '</h5>';
                                                        echo '            <p class="desc">' . htmlspecialchars($event['organiser']) . '</p>';
                                                        echo '            <span class="price">Starting at ' . htmlspecialchars($event['costRange']) . '</span>';

                                                        if (!empty($event['discountTxt'])) {
                                                            echo '            <span class="price-icon"><img src="images/discount-icon.png" alt=""> ' . htmlspecialchars($event['discountTxt']) . '</span>';
                                                        }

                                                        echo '        </div>';
                                                        echo '      </a>';
                                                        echo '    </div>';
                                                        echo '</div>';

                                                        $counter++;
                                                        if ($counter > 3) {
                                                            $counter = 1;
                                                        }
                                                    }
                                                }
                                            }
                                        }

                                        if (!$foundEvents) {
                                            echo '<p>No events found for this week.</p>';
                                        }
                                    } else {
                                        echo '<p>No events found or incorrect data structure.</p>';
                                    }
                                    ?>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabs-2" role="tabpanel" aria-labelledby="tab-2">
                                <div class="row row-cols-1 row-cols-md-3 g-4 mb-5 tab-b">
                                    <?php
                                    if (isset($result['lstProds']) && count($result['lstProds']) > 0) {
                                        $counter = 1;

                                        $today = new DateTime();
                                        $currentWeekSaturday = (clone $today)->modify('next saturday');
                                        $currentWeekSunday = (clone $today)->modify('next sunday');

                                        foreach ($result['lstProds'] as $event) {
                                            // print_r($event['dateRange']);

                                            $cardClass = ($counter == 1) ? 'first' : (($counter == 2) ? 'sec' : 'third');

                                            $name = htmlspecialchars($event['name']);
                                            $trimmedName = (strlen($name) > 54) ? substr($name, 0, 54) . '...' : $name;

                                            $day = substr($event['dayMonth'], 0, 2);
                                            $month = substr($event['dayMonth'], 2);
                                            // $eid = htmlspecialchars($event['eid']);
                                            $slug = htmlspecialchars($event['slug']);
                                            // echo $day . $month . " ". $today->format('Y');
                                            $eventDate = DateTime::createFromFormat('d M Y', $day . $month . " ". $today->format('Y'));
                                            // var_dump($eventDate);
                                            // echo $currentWeekSaturday->format('Y-m-d');
                                            if ($eventDate && ($eventDate->format('Y-m-d') == $currentWeekSaturday->format('Y-m-d') || $eventDate->format('Y-m-d') == $currentWeekSunday->format('Y-m-d'))) {
                                                echo '<div class="col">';
                                                // echo '    <div class="card ' . $cardClass . '">';
                                                // echo '      <a href="event-detail?eid=' . $eid . '">';
                                                echo '    <div class="card ' . $cardClass . '" title="Slug: ' . $slug . '">';
                                                echo '      <a href="event-detail?slug=' . $slug . '">';
                                                echo '        <span class="date"><p class="date-a">' . htmlspecialchars($day) . '</p><p class="month-a">' . htmlspecialchars($month) . '</p></span>';
                                                echo '        <img src="' . htmlspecialchars($event['photo']) . '" class="card-img-top main-img" alt="Event Image">';
                                                echo '        <div class="card-body">';
                                                echo '            <h5 class="card-title">' . $trimmedName . '</h5>';
                                                echo '            <h4 class="time">' . htmlspecialchars($event['dateRange']) . '</h4>';
                                                echo '            <h5 class="location">' . htmlspecialchars($event['venue']) . '</h5>';
                                                echo '            <p class="desc">' . htmlspecialchars($event['organiser']) . '</p>';
                                                echo '            <span class="price">Starting at ' . htmlspecialchars($event['costRange']) . '</span>';

                                                if (!empty($event['discountTxt'])) {
                                                    echo '            <span class="price-icon"><img src="images/discount-icon.png" alt=""> ' . htmlspecialchars($event['discountTxt']) . '</span>';
                                                }

                                                echo '        </div>';
                                                echo '      </a>';
                                                echo '    </div>';
                                                echo '</div>';

                                                $counter++;
                                                if ($counter > 3) {
                                                    $counter = 1;
                                                }
                                            }
                                        }

                                        // if ($counter == 1) {
                                        //     echo '<p>No events found for the current weekend.</p>';
                                        // }
                                    } else {
                                        echo '<p>No events found for the current weekend.</p>';
                                    }
                                    ?>


                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabs-3" role="tabpanel" aria-labelledby="tab-3">
                                <div class="row row-cols-1 row-cols-md-3 g-4 mb-5 tab-b">
                                    <?php
                                    $currentMonth = date('M');
                                    $currentYear = date('Y');

                                    $foundCurrentMonthEvents = false;

                                    if (isset($result['lstProds']) && count($result['lstProds']) > 0) {
                                        $counter = 1;

                                        foreach ($result['lstProds'] as $event) {

                                            $eventDayMonth = explode(' ', $event['dayMonth']);
                                            if (count($eventDayMonth) == 2) {
                                                $eventDay = $eventDayMonth[0];
                                                $eventMonth = $eventDayMonth[1];

                                                $eventDateRangeParts = explode(' ', $event['dateRange']);
                                                if (count($eventDateRangeParts) >= 4) {
                                                    $eventYear = date('Y');

                                                    $eventDate = DateTime::createFromFormat('j M Y', "$eventDay $eventMonth $eventYear");

                                                    if ($eventDate && $eventDate->format('M') == $currentMonth && $eventDate->format('Y') == $currentYear) {
                                                        $foundCurrentMonthEvents = true;

                                                        $cardClass = ($counter == 1) ? 'first' : (($counter == 2) ? 'sec' : 'third');
                                                        $name = htmlspecialchars($event['name']);
                                                        $trimmedName = (strlen($name) > 54) ? substr($name, 0, 54) . '...' : $name;
                                                        // $eid = htmlspecialchars($event['eid']);
                                                        $slug = htmlspecialchars($event['slug']);


                                                        echo '<div class="col" data-date="' . $eventDate->format('Y-m-d') . '">';
                                                        // echo '    <div class="card ' . $cardClass . '">';
                                                        // echo '      <a href="event-detail?eid=' . $eid . '">';
                                                        echo '    <div class="card ' . $cardClass . '" title="Slug: ' . $slug . '">';
                                                        echo '      <a href="event-detail?slug=' . $slug . '">';
                                                        echo '        <span class="date"><p class="date-a">' . htmlspecialchars($eventDay) . '</p><p class="month-a">' . htmlspecialchars($eventMonth) . '</p></span>';
                                                        echo '        <img src="' . htmlspecialchars($event['photo']) . '" class="card-img-top main-img" alt="Event Image">';
                                                        echo '        <div class="card-body">';
                                                        echo '            <h5 class="card-title">' . $trimmedName . '</h5>';
                                                        echo '            <h4 class="time">' . htmlspecialchars($event['dateRange']) . '</h4>';
                                                        echo '            <h5 class="location">' . htmlspecialchars($event['venue']) . '</h5>';
                                                        echo '            <p class="desc">' . htmlspecialchars($event['organiser']) . '</p>';
                                                        echo '            <span class="price">Starting at ' . htmlspecialchars($event['costRange']) . '</span>';

                                                        if (!empty($event['discountTxt'])) {
                                                            echo '            <span class="price-icon"><img src="images/discount-icon.png" alt=""> ' . htmlspecialchars($event['discountTxt']) . '</span>';
                                                        }

                                                        echo '        </div>';
                                                        echo '      </a>';
                                                        echo '    </div>';
                                                        echo '</div>';

                                                        $counter++;
                                                        if ($counter > 3) {
                                                            $counter = 1;
                                                        }
                                                    }
                                                }
                                            }
                                        }

                                        if (!$foundCurrentMonthEvents) {
                                            echo '<p>No events found for the current month.</p>';
                                        }
                                    } else {
                                        echo '<p>No events found or incorrect data structure.</p>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabs-4" role="tabpanel" aria-labelledby="tab-4">
                                <div class="row row-cols-1 row-cols-md-3 g-4 mb-5 tab-b">
                                    <?php
                                    if (isset($result['lstProds']) && count($result['lstProds']) > 0) {
                                        $counter = 1;
                                        foreach ($result['lstProds'] as $event) {

                                            $cardClass = ($counter == 1) ? 'first' : (($counter == 2) ? 'sec' : 'third');

                                            $name = htmlspecialchars($event['name']);
                                            $trimmedName = (strlen($name) > 54) ? substr($name, 0, 54) . '...' : $name;

                                            $day = substr($event['dayMonth'], 0, 2);
                                            $month = substr($event['dayMonth'], 2);

                                            // $eid = htmlspecialchars($event['eid']);
                                            $slug = htmlspecialchars($event['slug']);

                                            echo '<div class="col">';
                                            // echo '    <div class="card ' . $cardClass . '">';
                                            // echo '      <a href="event-detail?eid=' . $eid . '">';
                                            echo '    <div class="card ' . $cardClass . '" title="Slug: ' . $slug . '">';
                                            echo '      <a href="event-detail?slug=' . $slug . '">';
                                            // echo '      <a href="event-detail/' . $slug . '">';
                                            echo '        <span class="date"><p class="date-a">' . htmlspecialchars($day) . '</p><p class="month-a">' . htmlspecialchars($month) . '</p></span>';
                                            echo '        <img src="' . htmlspecialchars($event['photo']) . '" class="card-img-top main-img" alt="Event Image">';
                                            echo '        <div class="card-body">';
                                            echo '            <h5 class="card-title">' . $trimmedName . '</h5>';
                                            // echo '            <h3>' . htmlspecialchars($event['status']) . '</h3>';
                                            echo '            <h4 class="time">' . htmlspecialchars($event['dateRange']) . '</h4>';
                                            echo '            <h5 class="location">' . htmlspecialchars($event['venue']) . '</h5>';
                                            echo '            <p class="desc">' . htmlspecialchars($event['organiser']) . '</p>';
                                            echo '            <span class="price">Starting at ' . htmlspecialchars($event['costRange']) . '</span>';

                                            if (!empty($event['discountTxt'])) {
                                                echo '            <span class="price-icon"><img src="images/discount-icon.png" alt=""> ' . htmlspecialchars($event['discountTxt']) . '</span>';
                                            }

                                            echo '        </div>';
                                            echo '          </a>';
                                            echo '    </div>';
                                            echo '</div>';

                                            $counter++;
                                            if ($counter > 3) {
                                                $counter = 1;
                                            }
                                        }
                                    } else {
                                        echo '<p>No events found.</p>';
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="host-area">
            <div class="container">
                <div class="row row-cols-1 row-cols-md-3">
                    <div class="col-md-12">
                        <div class="heading">
                            <h2>Host Benefits</h2>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card fst">
                            <img src="images/host1.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Extra Income</h5>
                                <p class="card-text">We pay you 50% of every ticket’s service fees.*</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card sec">
                            <img src="images/host2.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Offline Payments To Hosts</h5>
                                <p class="card-text">We handle tickets for the offline/cash payments you directly receive from attendees.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card third">
                            <img src="images/host3.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Fast Payouts</h5>
                                <p class="card-text">Receive your ticket sales and service fees in 3 days after the event.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sponsored-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading">
                            <h5>Sponsored*</h5>
                        </div>
                        <div class="sponsored-slider">
                            <div>
                                <div class="row two-images-row">
                                    <div class="col-12 col-md-6">
                                        <img src="images/sponsored2.png" class="d-block w-100 spose" alt="...">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <img src="images/sponsored1.png" class="d-block w-100 spose" alt="...">
                                    </div>
                                </div>
                                <div class="row one-image-row">
                                    <div class="col-12">
                                        <img src="images/sponsored2.png" class="d-block w-100 spose" alt="...">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="row two-images-row">
                                    <div class="col-12 col-md-6">
                                        <img src="images/sponsored2.png" class="d-block w-100 spose" alt="...">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <img src="images/sponsored1.png" class="d-block w-100 spose" alt="...">
                                    </div>
                                </div>
                                <div class="row one-image-row">
                                    <div class="col-12">
                                        <img src="images/sponsored1.png" class="d-block w-100 spose" alt="...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="near-event">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading">
                            <h3>Events Near You</h3>
                            <p>Looking for something fun to do? From music to theatre, the Desi NRI Adda offers a variety of events happening near you to choose from.</p>
                        </div>
                    </div>
                    <div class="event-slider">
                        <?php
                        // if (isset($result['lstProds']) && count($result['lstProds']) > 0) {
                        //     $events = $result['lstProds'];

                        //     foreach ($events as $index => $event) {
                        //         $cardClass = ($index % 3 === 0) ? 'first' : (($index % 3 === 1) ? 'sec' : 'third');

                        //         $name = htmlspecialchars($event['name']);
                        //         $trimmedName = (strlen($name) > 54) ? substr($name, 0, 54) . '...' : $name;

                        //         $day = substr($event['dayMonth'], 0, 2);
                        //         $month = substr($event['dayMonth'], 2);

                        //         $slug = htmlspecialchars($event['slug']);
                        //         echo '<div>';
                        //         echo '<div class="card ' . $cardClass . '" title="Slug: ' . $slug . '">';
                        //         echo '  <a href="event-detail?slug=' . $slug . '">';
                        //         echo '    <span class="date"><p class="date-a">' . htmlspecialchars($day) . '</p><p class="month-a">' . htmlspecialchars($month) . '</p></span>';
                        //         echo '    <img src="' . htmlspecialchars($event['photo']) . '" class="card-img-top main-img" alt="Event Image">';
                        //         echo '    <div class="card-body">';
                        //         echo '        <h5 class="card-title">' . $trimmedName . '</h5>';
                        //         echo '        <h4 class="time">' . htmlspecialchars($event['dateRange']) . '</h4>';
                        //         echo '        <h5 class="location">' . htmlspecialchars($event['venue']) . '</h5>';
                        //         echo '        <p class="desc">' . htmlspecialchars($event['organiser']) . '</p>';
                        //         echo '        <span class="price">Starting at ' . htmlspecialchars($event['costRange']) . '</span>';
                        //         if (!empty($event['discountTxt'])) {
                        //             echo '        <span class="price-icon"><img src="images/discount-icon.png" alt=""> ' . htmlspecialchars($event['discountTxt']) . '</span>';
                        //         }
                        //         echo '    </div>';
                        //         echo '  </a>';
                        //         echo '</div>';
                        //         echo '</div>';
                        //     }
                        // } else {
                        //     echo '<p>No events found or incorrect data structure.</p>';
                        // }
                        ?>
                    </div>
                </div>
                <div class="event-arrow">
                    <div class="col-md-12">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function(position) {
                        const latitude = position.coords.latitude;
                        const longitude = position.coords.longitude;

                        console.log(`Your current location is: Latitude = ${latitude}, Longitude = ${longitude}`);

                        // Reverse geocode to get city name
                        fetch(`https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${latitude}&longitude=${longitude}&localityLanguage=en`)
                            .then(response => response.json())
                            .then(locationData => {
                                const city = locationData.city || locationData.locality || 'Unknown';
                                console.log(`Detected city: ${city}`);

                                fetch('get-events-by-location.php', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json'
                                        },
                                        body: JSON.stringify({
                                            city
                                        })
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        const eventArrow = document.querySelector('.event-arrow');

                                        if (data && data.success) {
                                            if (data.events && data.events.length > 0) {
                                                renderEvents(data.events);
                                                eventArrow.style.display = 'block';
                                            } else {
                                                document.querySelector('.event-slider').innerHTML = '<p>No events found for your location.</p>';
                                                eventArrow.style.display = 'none';
                                            }
                                        } else {
                                            document.querySelector('.event-slider').innerHTML = `<p>${data.message || 'No events found for your location.'}</p>`;
                                            eventArrow.style.display = 'none';
                                        }
                                    })
                                    .catch(err => {
                                        console.error('Error fetching events:', err);
                                        document.querySelector('.event-slider').innerHTML = '<p>Error fetching events. Please try again later.</p>';
                                        document.querySelector('.event-arrow').style.display = 'none';
                                    });
                            })
                            .catch(err => {
                                console.error('Error reverse geocoding:', err);
                                showDefaultEvents(); // Fetch and show default events
                            });
                    },
                    function(error) {
                        console.error('Error obtaining location:', error.message);
                        document.querySelector('.event-slider').innerHTML = '';
                        showDefaultEvents(); // Fetch and show default events
                    }
                );
            } else {
                console.error('Geolocation is not supported by this browser.');
                document.querySelector('.event-slider').innerHTML = '<p>Geolocation not supported. Showing default events.</p>';
                showDefaultEvents();
            }
        });

        function showDefaultEvents() {
            fetch('get-events-by-location.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        city: ''
                    })
                })
                .then(response => response.json())
                .then(data => {
                    const eventArrow = document.querySelector('.event-arrow');

                    if (data && data.success) {
                        if (data.events && data.events.length > 0) {
                            renderEvents(data.events);
                            eventArrow.style.display = 'block';
                        } else {
                            document.querySelector('.event-slider').innerHTML = '<p>No events found.</p>';
                            eventArrow.style.display = 'none';
                        }
                    } else {
                        document.querySelector('.event-slider').innerHTML = '<p>Error fetching default events. Please try again later.</p>';
                        eventArrow.style.display = 'none';
                    }
                })
                .catch(err => {
                    console.error('Error fetching default events:', err);
                    document.querySelector('.event-slider').innerHTML = '<p>Error fetching default events. Please try again later.</p>';
                    document.querySelector('.event-arrow').style.display = 'none';
                });
        }


        function renderEvents(events) {
            const eventSlider = document.querySelector('.event-slider');
            eventSlider.innerHTML = '';

            events.forEach((event, index) => {
                const cardClass = index % 3 === 0 ? 'first' : (index % 3 === 1 ? 'sec' : 'third');
                const name = event.name.length > 54 ? `${event.name.substring(0, 54)}...` : event.name;
                const day = event.dayMonth.substring(0, 2);
                const month = event.dayMonth.substring(2);

                const eventHTML = `
            <div>
                <div class="card ${cardClass}" title="Slug: ${event.slug}">
                    <a href="event-detail?slug=${event.slug}">
                        <span class="date">
                            <p class="date-a">${day}</p>
                            <p class="month-a">${month}</p>
                        </span>
                        <img src="${event.photo}" class="card-img-top main-img" alt="Event Image">
                        <div class="card-body">
                            <h5 class="card-title">${name}</h5>
                            <h4 class="time">${event.dateRange}</h4>
                            <h5 class="location">${event.venue}</h5>
                            <p class="desc">${event.organiser}</p>
                            <span class="price">Starting at ${event.costRange}</span>
                            ${
                                event.discountTxt
                                    ? `<span class="price-icon"><img src="images/discount-icon.png" alt=""> ${event.discountTxt}</span>`
                                    : ''
                            }
                        </div>
                    </a>
                </div>
            </div>
        `;
                eventSlider.insertAdjacentHTML('beforeend', eventHTML);
            });

            if ($('.event-slider').hasClass('slick-initialized')) {
                $('.event-slider').slick('unslick');
            }

            $('.event-slider').slick({
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: false,
                arrows: true,
                prevArrow: '<img src="images/event-left.png" alt="Previous" class="event-left">',
                nextArrow: '<img src="images/event-right.png" alt="Next" class="event-right">',
                appendArrows: '.event-arrow .col-md-12',
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            let ajaxRequest;
            let debounceTimeout;

            function handleSearch() {
                const query = $("#searchInput").val().trim();
                const selectedCity = $("#countrySelect").val();

                if (ajaxRequest) ajaxRequest.abort();
                clearTimeout(debounceTimeout);


                if (query.length > 0 || selectedCity) {
                    debounceTimeout = setTimeout(() => {
                        searchEvents(query, selectedCity);
                    }, 1000);
                } else {
                    $("#search-results").html("");
                    $("#loader").hide();
                    $("#loaderOverlay").hide();
                }
            }

            $("#searchInput").on("keyup", function(e) {
                e.preventDefault();
                handleSearch();
            });

            $("#countrySelect").on("change", function() {
                handleSearch();
            });

            function searchEvents(query, selectedCity) {
                $("#loaderOverlay").show();
                $("#loader").show();

                ajaxRequest = $.ajax({
                    type: "POST",
                    url: "get_home_data.php",
                    data: {
                        query: query,
                        city: selectedCity,
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            displayEvents(response.events);
                        } else {
                            $("#search-results").html('<span style="display: block; text-align: center; margin: 20px auto; font-size: 16px; color: #555;">No events found.</span>');
                        }
                    },
                    error: function(xhr, status, error) {
                        if (status !== "abort") console.error("An error occurred:", error);
                    },
                    complete: function() {
                        $("#loaderOverlay").hide();
                    },
                });
            }

            function displayEvents(events) {
                let html = '<div class="row row-cols-1 row-cols-md-3 g-4">';

                events.forEach((event, index) => {
                    const cardClass = (index % 3 === 0) ? 'first' : ((index % 3 === 1) ? 'sec' : 'third');
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
                $("#search-results").html(html);
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            let ajaxRequest;

            $(".category-item").on("click", function(e) {
                e.preventDefault();

                const selectedCategoryID = $(this).data("catid");

                console.log("Selected Category ID:", selectedCategoryID);

                if (ajaxRequest) ajaxRequest.abort();

                searchEventsByCategory(selectedCategoryID || 0);

                if (selectedCategoryID) {
                    searchEventsByCategory(selectedCategoryID);
                }
            });

            function searchEventsByCategory(catID) {
                console.log("Sending catID to API:", catID);

                $("#CategoryloaderOverlay").show();

                ajaxRequest = $.ajax({
                    type: "POST",
                    url: "category_data.php",
                    data: {
                        category: catID,
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            displayCategoryEvents(response.events);
                        } else {
                            $("#category-results").html('<span style="display: block; text-align: center; margin: 20px auto; font-size: 16px; color: #555;">No events found for this category.</span>');
                        }
                    },
                    error: function(xhr, status, error) {
                        if (status !== "abort") console.error("An error occurred:", error);
                    },
                    complete: function() {
                        
                        $("#CategoryloaderOverlay").hide();
                    },
                });
            }

            function displayCategoryEvents(events) {
                let html = '<div class="row row-cols-1 row-cols-md-3 g-4">';

                events.forEach((event, index) => {
                    const cardClass = (index % 3 === 0) ? 'first' : ((index % 3 === 1) ? 'sec' : 'third');
                    const trimmedName = event.name.length > 54 ? event.name.substring(0, 54) + '...' : event.name;
                    const day = event.dayMonth.substring(0, 2);
                    const month = event.dayMonth.substring(2);

                    html += `
                    <div class="col">
                        <div class="card ${cardClass}" title="Slug: ${event.slug}">
                            <a href="event-detail?slug=${event.slug}">
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
                $("#category-results").html(html);
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.sponsored-slider').slick({
                dots: false,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                prevArrow: '<img src="images/spons-left.png" alt="Previous" class="spons-left">',
                nextArrow: '<img src="images/spons-right.png" alt="Next" class="spons-right">',
                autoplay: false,
                autoplaySpeed: 3000
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.category-slider').slick({
                slidesToShow: 7,
                slidesToScroll: 7,
                infinite: true,
                dots: false,
                arrows: true,
                prevArrow: '<img src="images/spons-left.png" alt="Previous" class="category-left">',
                nextArrow: '<img src="images/spons-right.png" alt="Next" class="category-right">',
                responsive: [{
                        breakpoint: 1024, // For medium devices
                        settings: {
                            slidesToShow: 5, // Show 5 slides
                            slidesToScroll: 5,
                        }
                    },
                    {
                        breakpoint: 768, // For small devices
                        settings: {
                            slidesToShow: 3, // Show 3 slides
                            slidesToScroll: 3,
                        }
                    },
                    {
                        breakpoint: 480, // For extra small devices
                        settings: {
                            slidesToShow: 4, // Show 2 slides
                            slidesToScroll: 4,
                        }
                    }
                ]
            });
        });
    </script>

    <script>
        sessionStorage.removeItem('ticketData');
    </script>


</body>
<?php include 'footer.php'; ?>

</html>