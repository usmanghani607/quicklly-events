<?php
// session_start();

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="js/common-script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .search-highlight {
            background-color: yellow;
            font-weight: bold;
        }

        .highlight {
            background: #F05336;
            color: #fff;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <div class="inner-header">
        <div class="container-fluid">
            <div class="row">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="col">
                            <div class="logo_left">
                                <a href="/"><img src="images/logo.png" alt="logo"></a>
                            </div>
                        </div>
                        <div class="collapse navbar-collapse">
                            <div class="col search-bar">
                                <form class="d-flex" role="search" onsubmit="return false;">
                                    <input id="header-search" class="form-control search-form" type="search" placeholder="Search Events" aria-label="Search">
                                </form>
                            </div>
                            <div class="col">
                                <!-- <div class="right_btn d-flex align-items-center">
                                    <?php if (isset($_SESSION['firstName'])): ?>
                                        <button class="btn_create"><img src="images/add-icon.png"> Create Event</button>
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle login-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <?php echo htmlspecialchars($_SESSION['firstName']); ?>
                                            </button>
                                            <ul class="dropdown-menu custom-dropdown-menu">
                                                <li><a class="dropdown-item" href="account">My Account</a></li>
                                                <li><a class="dropdown-item" href="booking">My Bookings</a></li>
                                                <li><a class="dropdown-item" href="logout.php" id="logoutBtn">Logout</a></li>
                                            </ul>
                                        </div>
                                    <?php else: ?>
                                        <button class="btn_signup" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</button>
                                    <?php endif; ?>
                                </div> -->
                                <div class="right_btn d-flex align-items-center">
                                    <button class="btn_create"><img src="images/add-icon.png"> Create Event</button>
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle login-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        </button>
                                        <ul class="dropdown-menu custom-dropdown-menu">
                                            <li><a class="dropdown-item" href="account">My Account</a></li>
                                            <li><a class="dropdown-item" href="booking">My Bookings</a></li>
                                            <li><a class="dropdown-item" href="logout.php" id="logoutBtn">Logout</a></li>
                                        </ul>
                                    </div>
                                    <button class="btn_signup" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <!-- <div id="search-results-container"></div> -->

    <div class="search-filter-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="SearchloaderOverlay" style="display: none;">
                        <div id="Searchloader" style="display: none; font-size: 18px; text-align: center; padding: 20px;">
                            <img src="images/logo.png" alt="Loading...">
                        </div>
                    </div>
                    <div id="search-results-container"></div>
                </div>
            </div>
        </div>
    </div>


    <?php
    include 'login-page.php';
    ?>

    <script>
        $(document).ready(function() {
            $("#logoutBtn").on("click", function(e) {
                e.preventDefault();

                localStorage.removeItem('firstName');
                localStorage.removeItem('uid');

                Swal.fire({
                    icon: 'success',
                    title: 'Logged Out',
                    text: 'You have successfully logged out.',
                    timer: 1500,
                    showConfirmButton: false
                });

                setTimeout(function() {
                    window.location.href = 'header-logout.php';
                }, 1500);
            });
        });
    </script>

    <!-- <script>
        $(document).ready(function() {
            
            const originalContent = $(".event-detail").html();

            $("#header-search").on("input", function() {
                const searchQuery = $(this).val().trim();

                if (searchQuery) {
                    $(".event-detail").html(originalContent); 

                    const regex = new RegExp(`(${searchQuery})`, "gi");

                    $(".event-detail *").contents().each(function() {
                        if (this.nodeType === 3) { 
                            const text = $(this).text();
                            const replacedText = text.replace(regex, "<span class='highlight'>$1</span>");
                            $(this).replaceWith(replacedText);
                        }
                    });
                } else {
                    $(".event-detail").html(originalContent); 
                }
            });

            $("form").on("submit", function(event) {
            event.preventDefault(); 
        });
        
        $("#header-search").on("keypress", function(e) {
            if (e.which === 13) { 
                e.preventDefault();
            }
        });

        });
    </script> -->

    <!-- <script>
        $(document).ready(function() {
            let ajaxRequest;
            let debounceTimeout;

            function handleSearch() {
                const query = $("#header-search").val().trim();

                if (query.length > 0) {
                    $(".body-content").hide();
                } else {
                    $(".body-content").show();
                }

                if (query.length > 0) {
                    $(".search-filter-area").css({
                        "background": "#f8f8f8",
                        "opacity": "1",
                        "padding": "25px 0 40px 0"
                    });
                } else {
                    $(".search-filter-area").css({
                        "background": "",
                        "opacity": "",
                        "padding": ""
                    });
                }

                if (ajaxRequest) ajaxRequest.abort();
                clearTimeout(debounceTimeout);

                if (query.length > 0) {
                    debounceTimeout = setTimeout(() => {
                        searchEvents(query);
                    }, 1000);
                } else {
                    $("#search-results-container").html("");
                    $("#Searchloader").hide();
                    $("#SearchloaderOverlay").hide();
                }
            }

            $("#header-search").on("keyup", function(e) {
                e.preventDefault();
                handleSearch();
            });

            function searchEvents(query) {

                $("#SearchloaderOverlay").show();
                $("#Searchloader").show();

                ajaxRequest = $.ajax({
                    type: "POST",
                    url: "get_home_data.php",
                    data: {
                        query: query,
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            displayEvents(response.events);
                        } else {
                            $("#search-results-container").html('<span style="display: block; text-align: center; margin: 20px auto; font-size: 16px; color: #555;">No events found.</span>');
                        }
                    },
                    error: function(xhr, status, error) {
                        if (status !== "abort") console.error("An error occurred:", error);
                    },
                    complete: function() {
                        $("#SearchloaderOverlay").hide();
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
                        <a href="event-detail?slug=${event.slug}">
                            <div class="event-card-header">
                                <span class="date">
                                    <p class="date-a">${day}</p>
                                    <p class="month-a">${month}</p>
                                </span>
                                <img src="${event.photo}" class="card-img-top main-img" alt="Event Image">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">${trimmedName}</h5>
                                <h4 class="event-time">${event.dateRange}</h4>
                                <p class="event-location">${event.venue}</p>
                                <p class="event-desc">${event.organiser}</p>
                                <div class="event-price">
                                    <span class="price">Starting at ${event.costRange}</span>`;
                    if (event.discountTxt) {
                        html += `<span class="price-icon"><img src="images/discount-icon.png" alt="Discount"> ${event.discountTxt}</span>`;
                    }
                    html += `
                                </div>
                            </div>
                        </a>
                    </div>
                </div>`;
                });

                html += '</div>';
                $("#search-results-container").html(html);
            }
        });
    </script> -->

    <!-- <script>
        $(document).ready(function() {
            let ajaxRequest;
            let debounceTimeout;

            function handleSearch() {
                const query = $("#header-search").val().trim();

                if (query.length > 0) {
                    $(".body-content").hide();
                } else {
                    $(".body-content").show();
                }

                if (ajaxRequest) ajaxRequest.abort();
                clearTimeout(debounceTimeout);

                if (query.length > 0) {
                    debounceTimeout = setTimeout(() => {
                        searchEvents(query);
                    }, 1000);
                } else {
                    $("#search-results-container").html("");
                    $("#Searchloader").hide();
                    $("#SearchloaderOverlay").hide();

                    // Reset CSS for empty search
                    $(".search-filter-area").css({
                        "background": "",
                        "opacity": "",
                        "padding": ""
                    });
                }
            }

            $("#header-search").on("keyup", function(e) {
                e.preventDefault();
                handleSearch();
            });

            function searchEvents(query) {
                $("#SearchloaderOverlay").show();
                $("#Searchloader").show();

                ajaxRequest = $.ajax({
                    type: "POST",
                    url: "get_home_data.php",
                    data: {
                        query: query,
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            displayEvents(response.events);

                            // Apply background and padding after showing results
                            $(".search-filter-area").css({
                                "background": "#f8f8f8",
                                "opacity": "1",
                                "padding": "25px 0 40px 0"
                            });
                        } else {
                            $("#search-results-container").html('<span style="display: block; text-align: center; margin: 20px auto; font-size: 16px; color: #555;">No events found.</span>');

                            // Reset CSS if no events are found
                            $(".search-filter-area").css({
                                "background": "",
                                "opacity": "",
                                "padding": ""
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        if (status !== "abort") console.error("An error occurred:", error);
                    },
                    complete: function() {
                        $("#SearchloaderOverlay").hide();
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
                    <a href="event-detail?slug=${event.slug}">
                        <div class="event-card-header">
                            <span class="date">
                                <p class="date-a">${day}</p>
                                <p class="month-a">${month}</p>
                            </span>
                            <img src="${event.photo}" class="card-img-top main-img" alt="Event Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">${trimmedName}</h5>
                            <h4 class="event-time">${event.dateRange}</h4>
                            <p class="event-location">${event.venue}</p>
                            <p class="event-desc">${event.organiser}</p>
                            <div class="event-price">
                                <span class="price">Starting at ${event.costRange}</span>`;
                    if (event.discountTxt) {
                        html += `<span class="price-icon"><img src="images/discount-icon.png" alt="Discount"> ${event.discountTxt}</span>`;
                    }
                    html += `
                            </div>
                        </div>
                    </a>
                </div>
            </div>`;
                });

                html += '</div>';
                $("#search-results-container").html(html);
            }
        });
    </script> -->

    <script>
        $(document).ready(function() {
            let ajaxRequest;
            let debounceTimeout;

            function handleSearch() {
                const query = $("#header-search").val().trim();

                if (ajaxRequest) ajaxRequest.abort();
                clearTimeout(debounceTimeout);

                if (query.length > 0) {
                    debounceTimeout = setTimeout(() => {
                        searchEvents(query);
                    }, 1000);
                } else {
                    // Reset results and show body content if search is empty
                    $("#search-results-container").html("");
                    $("#Searchloader").hide();
                    $("#SearchloaderOverlay").hide();
                    $(".body-content").show();

                    // Reset CSS
                    $(".search-filter-area").css({
                        "background": "",
                        "opacity": "",
                        "padding": ""
                    });
                }
            }

            $("#header-search").on("keyup", function(e) {
                e.preventDefault();
                handleSearch();
            });

            function searchEvents(query) {
                $("#SearchloaderOverlay").show();
                $("#Searchloader").show();

                ajaxRequest = $.ajax({
                    type: "POST",
                    url: "get_home_data.php",
                    data: {
                        query: query,
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            displayEvents(response.events);

                            // Apply background and padding after showing results
                            $(".search-filter-area").css({
                                "background": "#f8f8f8",
                                "opacity": "1",
                                "padding": "25px 0 40px 0"
                            });

                            // Hide body content after results are displayed
                            $(".body-content").hide();
                        } else {
                            $("#search-results-container").html('<span style="display: block; text-align: center; margin: 20px auto; font-size: 16px; color: #555;">No events found.</span>');

                            // Reset CSS if no events are found
                            $(".search-filter-area").css({
                                "background": "",
                                "opacity": "",
                                "padding": ""
                            });

                            // Show body content if no results are found
                            $(".body-content").show();
                        }
                    },
                    error: function(xhr, status, error) {
                        if (status !== "abort") console.error("An error occurred:", error);
                    },
                    complete: function() {
                        $("#SearchloaderOverlay").hide();
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
                    <a href="event-detail?slug=${event.slug}">
                        <div class="event-card-header">
                            <span class="date">
                                <p class="date-a">${day}</p>
                                <p class="month-a">${month}</p>
                            </span>
                            <img src="${event.photo}" class="card-img-top main-img" alt="Event Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">${trimmedName}</h5>
                            <h4 class="event-time">${event.dateRange}</h4>
                            <p class="event-location">${event.venue}</p>
                            <p class="event-desc">${event.organiser}</p>
                            <div class="event-price">
                                <span class="price">Starting at ${event.costRange}</span>`;
                    if (event.discountTxt) {
                        html += `<span class="price-icon"><img src="images/discount-icon.png" alt="Discount"> ${event.discountTxt}</span>`;
                    }
                    html += `
                            </div>
                        </div>
                    </a>
                </div>
            </div>`;
                });

                html += '</div>';
                $("#search-results-container").html(html);
            }
        });
    </script>


    <script>
        setInterval(function() {

            fetch('refresh_session.php')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Session refreshed');
                    }
                });
        }, 1800000);
    </script>

</body>

</html>