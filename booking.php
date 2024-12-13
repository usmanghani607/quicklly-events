<?php

ini_set('session.gc_maxlifetime', 3600 * 24 * 365); 

session_set_cookie_params([
    'lifetime' => 3600 * 24 * 365, 
    'path' => '/',
    'secure' => true, 
    'httponly' => true,
    'samesite' => 'Strict',
]);

session_start();

// print_r($_SESSION);

// echo $_SESSION['bearer_token'];

// echo $_SESSION['value_user_id'];
// echo $_SESSION['firstName'];
// echo $_SESSION['lastName'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'header-checkout.php'; ?>
    <link rel="shortcut icon" href="images/favicon.png">

    <style>
        .nav-tabs .nav-link.active {
            background-color: #E75E15 !important;
            color: #fff !important;
        }

        .nav-tabs .nav-link:hover {
            background-color: #f3f3f3;
        }

        .nav-tabs .nav-link:focus {
            border-color: #E4E4E4 !important;
            outline: none;
        }
    </style>
</head>

<body class="booking-bg">

    <div class="dashboard booking">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <div class="side-bar">
                        <button onclick="window.location.href='booking';"><img src="images/tickets-39.png" alt=""><span>My Bookings</span></button>
                        <button onclick="window.location.href='account';"><img src="images/profile.png" alt=""><span>Account Summary</span></button>
                        <button onclick="window.location.href='change-password';"><img src="images/key.png" alt=""><span>Change Password</span></button>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="main-area">
                        <div class="heading">
                            <h2>My Bookings</h2>
                        </div>

                        <ul class="nav nav-tabs tappes" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active all" id="tab-1" data-bs-toggle="tab" data-bs-target="#tabs-1" type="button" role="tab" aria-controls="tabs-1" aria-selected="true">
                                    All
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link upcoming" id="tab-2" data-bs-toggle="tab" data-bs-target="#tabs-2" type="button" role="tab" aria-controls="tabs-2" aria-selected="false">
                                    Upcoming
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link completed" id="tab-3" data-bs-toggle="tab" data-bs-target="#tabs-3" type="button" role="tab" aria-controls="tabs-3" aria-selected="false">
                                    Completed
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">

                            <div id="ticket-container"></div>

                            <!-- <div class="booking-pagination" id="pagination-container" style="display: none;">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination" id="pagination-controls">
                                        <li class="page-item" id="prev-button">
                                            <a class="page-link" href="#" aria-label="Previous">Previous</a>
                                        </li>
                                        <li class="page-item" id="next-button">
                                            <a class="page-link" href="#" aria-label="Next">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div> -->
                        </div>

                        <!-- <div class="modal fade" id="ticketModal" tabindex="-1" aria-labelledby="ticketModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <img id="ticketModal-image" src="" alt="">
                                        <img class="cross" src="images/modal-cross.png" alt="" data-bs-dismiss="modal" style="width: 26px;">
                                    </div>
                                    <div class="modal-body">
                                        <h2 id="ticketModal-name"></h2>
                                        <p id="ticketModal-date"></p>
                                        <p id="ticketModal-location"></p>
                                        <div class="ticket-border"></div>
                                        <div class="row">
                                            <div class="col-6 col-md-6">
                                                <p>Booking Id</p>
                                                <p class="t-number" id="ticketModal-booking-id"></p>
                                            </div>
                                            <div class="col-6 col-md-6">
                                                <p>Total Quantity</p>
                                                <p id="ticketModal-quantity" class="t-quantity"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="refund">
                                        <h2>Refund Details</h2>
                                    </div>
                                    <div class="modal-body bot">
                                        <div class="row">
                                            <div class="col-9 col-md-9">
                                                <div class="desc">
                                                    <p>Total Amount Paid</p>
                                                </div>
                                            </div>
                                            <div class="col-3 col-md-3">
                                                <div class="rate">
                                                    <p id="ticketModal-total-price"></p>
                                                </div>
                                            </div>
                                            <div class="ticket-border-sec"></div>
                                            <div class="col-9 col-md-9">
                                                <div class="desc">
                                                    <p>Total refundable Amount</p>
                                                    <p>Total Amount Paid</p>
                                                    <p>Service fees</p>
                                                    <p>Cancellation fees</p>
                                                </div>
                                            </div>
                                            <div class="col-3 col-md-3">
                                                <div class="rate">
                                                    <p id="ticketModal-refund"></p>
                                                    <p id="ticketModal-paid-amount"></p>
                                                    <p id="ticketModal-service-fee"></p>
                                                    <p id="ticketModal-cancel-fee"></p>
                                                </div>
                                            </div>
                                            <div class="refer">
                                                <p>Your refund will be credited to source of payment account</p>
                                            </div>
                                            <div class="t-btn">
                                                <button>Cancel Booking</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <div class="modal fade" id="ticketModal" tabindex="-1" aria-labelledby="ticketModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header cancel-text">
                                        <img class="cross-cancel-modal" src="images/modal-cross.png" alt="" data-bs-dismiss="modal" aria-label="Close">
                                    </div>
                                    <div class="modal-body">
                                        <p>To cancel an order, we kindly request you to reach out to our Customer Support team at <a href="tel:+17084069922" style="text-decoration: none;">+1 708 406 9922</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="ticketScanModal" tabindex="-1" aria-labelledby="ticketScanModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <img id="modal-event-image" src="images/dummy.jpg" alt="">
                                        <img class="cross" src="images/modal-cross.png" alt="" data-bs-dismiss="modal">

                                    </div>
                                    <div class="modal-body">
                                        <div class="t-body-bg">
                                            <h2 id="modal-event-name"></h2>
                                            <p id="modal-event-date"></p>
                                            <p id="modal-event-location"></p>
                                            <div class="ticket-border"></div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>Name</p>
                                                    <p class="t-number u-name" id="modal-user-name"></p>
                                                </div>
                                            </div>
                                            <div class="ticket-border-sec"></div>
                                            <div class="qr">
                                                <img id="modal-event-qr" src="images/QR_code.png" alt="">
                                                <div class="col-md-12 text-center">
                                                    <span class="b-id">Booking Id : </span><span class="b-number" id="modal-booking-id"></span>
                                                    <p id="modal-quantity"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grand-total">
                                            <div class="row">
                                                <div class="col-6 col-md-6">
                                                    <p>Total Amount</p>
                                                </div>
                                                <div class="col-6 col-md-6">
                                                    <p class="total-price" id="modal-total-price">$</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            const zipcode = "60610";
            const uid = "<?php echo isset($_SESSION['value_user_id']) ? $_SESSION['value_user_id'] : 'No User ID'; ?>";
            const bearer_token = "<?php echo isset($_SESSION['bearer_token']) ? $_SESSION['bearer_token'] : ''; ?>";

            let eventsData = [];

            fetch(`https://devrestapi.goquicklly.com/events/get-dashboard`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${bearer_token}`
                    },
                    body: JSON.stringify({
                        zipcode,
                        uid
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data && data.lstEvents) {
                        eventsData = data.lstEvents;
                        displayEvents(eventsData);
                    } else {
                        console.error('No events available or invalid data');
                        displayNoEventsMessage();
                    }
                })
                .catch(error => {
                    console.error('Error fetching event data:', error);
                    displayNoEventsMessage();
                });

            function displayEvents(events) {
                const container = document.getElementById("ticket-container");
                container.innerHTML = '';

                if (events.length === 0) {
                    displayNoEventsMessage();
                    return;
                }

                events.sort((a, b) => {

                    const bookDateA = new Date(a.orderDate);
                    const bookDateB = new Date(b.orderDate);

                    return bookDateB - bookDateA;
                });

                events.forEach(event => {
                    const eventHTML = `
                    <div class="row mb-4 ticket-area">
                        <div class="col-md-3">
                            <img class="t-img" src="${event.photo || 'images/dummy.jpg'}" alt="Event Image">
                        </div>
                        <div class="col-md-5">
                            <h2 class="event-name">${event.name || 'Event Name Not Available'}</h2>
                            <div class="date-time">
                                <span class="time">${event.date} ${event.time || 'Date and Time Not Available'}</span>
                                <img class="icon" src="images/loc.png" alt="">
                                <span class="place">${event.addr || 'Location Not Available'}</span>
                            </div>
                            <div class="row">
                                <div class="col-md-6 left">
                                    <p class="order-s"><span class="order-id">Order Id:</span> <span class="order-number">${event.bookingID || 'Unknown Order ID'}</span></p>
                                    <p class="quantity-s"><span class="quantity">Quantity:</span> <span class="ticket">${event.qty || '0'}</span></p>
                                </div>
                                <div class="col-md-6 right">
                                    <p class="stat"><span class="status">Status:</span> <span class="t-status success">${isEventCompleted(event.date) ? 'Completed' : 'Upcoming'}</span></p>
                                    <p class="pay"><span class="payment">Payment:</span> <span class="price">$${event.payment || '0.00'}</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="booking">
                                <p><span class="book-text">Booking Date:</span> <span class="book-date">${event.orderDate || 'Unknown Date'}</span></p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="ticket-button">
                                <button class="view" data-event='${JSON.stringify(event)}' data-bs-toggle="modal" data-bs-target="#ticketScanModal">View Ticket</button>
                                <button class="cancel" data-event='${JSON.stringify(event)}' data-bs-toggle="modal" data-bs-target="#ticketModal">Cancel Booking</button>
                            </div>
                        </div>
                    </div>
                `;
                    container.insertAdjacentHTML('beforeend', eventHTML);
                });

                attachEventListeners();
            }

            function isEventCompleted(eventDate) {
                
                const currentDate = new Date();
                
                const eventDateObj = new Date(eventDate);
                
                return eventDateObj < currentDate;
            }

            function displayNoEventsMessage() {
                const container = document.getElementById("ticket-container");
                container.innerHTML = '<p class="alert alert-info">Events not found</p>';
            }

            function attachEventListeners() {
                document.querySelectorAll(".view").forEach(button => {
                    button.addEventListener("click", function() {
                        const event = JSON.parse(this.getAttribute("data-event"));
                        const firstName = localStorage.getItem('firstName') || 'Guest';
                        const lastName = localStorage.getItem('lastName') || '';

                        const fullName = firstName + (lastName ? ' ' + lastName : '');

                        document.getElementById("modal-event-image").src = event.photo || 'images/dummy.jpg';
                        document.getElementById("modal-event-name").textContent = event.name || 'Event Name Not Available';
                        document.getElementById("modal-event-date").textContent = `${event.date || ''} ${event.time || ''}`;
                        document.getElementById("modal-event-location").textContent = event.addr || 'Location Not Available';
                        document.getElementById("modal-user-name").textContent = fullName || 'User Name Not Available';
                        document.getElementById("modal-booking-id").textContent = event.bookingID || 'Unknown Order ID';
                        document.getElementById("modal-quantity").textContent = `${event.qty || '0'}`;
                        // document.getElementById("modal-total-price").textContent = `$${event.payment || '0.00'}`;
                        document.getElementById("modal-total-price").textContent = `$${(parseFloat(event.payment || '0.00') + parseFloat(event.tax || '0.00')).toFixed(2)}`;
                        document.getElementById("modal-event-qr").src = event.qr || 'images/dummy.jpg';
                    });
                });

                document.querySelectorAll(".cancel").forEach(button => {
                    button.addEventListener("click", function() {
                        const event = JSON.parse(this.getAttribute("data-event"));

                        document.getElementById("ticketModal-image").src = event.photo || 'images/dummy.jpg';
                        document.getElementById("ticketModal-name").textContent = event.name || 'Event Name Not Available';
                        document.getElementById("ticketModal-date").textContent = `${event.date || ''} ${event.time || ''}`;
                        document.getElementById("ticketModal-location").textContent = event.addr || 'Location Not Available';
                        document.getElementById("ticketModal-booking-id").textContent = event.bookingID || 'Unknown Order ID';
                        document.getElementById("ticketModal-quantity").textContent = `${event.qty || '0'}`;
                        document.getElementById("ticketModal-total-price").textContent = `$${event.payment || '0.00'}`;
                        document.getElementById("ticketModal-refund").textContent = `$${event.refundAmt || '0.00'}`;
                        document.getElementById("ticketModal-paid-amount").textContent = `$${event.payment || '0.00'}`;
                        document.getElementById("ticketModal-service-fee").textContent = `$${event.eServiceFees || '0.00'}`;
                        document.getElementById("ticketModal-cancel-fee").textContent = `$${event.cancelCharges || '0.00'}`;
                    });
                });
            }

            document.getElementById("tab-1").addEventListener("click", function() {
                displayEvents(eventsData);
            });

            document.getElementById("tab-2").addEventListener("click", function() {
                const upcomingEvents = eventsData.filter(event => event.isUpcoming === true);
                displayEvents(upcomingEvents);
            });

            document.getElementById("tab-3").addEventListener("click", function() {
                const completedEvents = eventsData.filter(event => event.isUpcoming === false);
                displayEvents(completedEvents);
            });
        });
    </script> -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const bearer_token = "<?php echo isset($_SESSION['bearer_token']) ? $_SESSION['bearer_token'] : ''; ?>";
            const eventsData = <?php echo json_encode(isset($_SESSION['events']) ? $_SESSION['events'] : []); ?>;

            if (bearer_token && eventsData.length > 0) {
                displayEvents(eventsData);
            } else {
                displayNoEventsMessage();
            }

            function displayEvents(events) {
                const container = document.getElementById("ticket-container");
                container.innerHTML = '';

                if (events.length === 0) {
                    displayNoEventsMessage();
                    return;
                }

                events.sort((a, b) => {
                    const bookDateA = new Date(a.orderDate);
                    const bookDateB = new Date(b.orderDate);
                    return bookDateB - bookDateA;
                });

                events.forEach(event => {
                    const eventHTML = `
                <div class="row mb-4 ticket-area">
                    <div class="col-md-3">
                        <img class="t-img" src="${event.photo || 'images/dummy.jpg'}" alt="Event Image">
                    </div>
                    <div class="col-md-5">
                        <h2 class="event-name">${event.name || 'Event Name Not Available'}</h2>
                        <div class="date-time">
                            <span class="time">${event.date} ${event.time || 'Date and Time Not Available'}</span>
                            <img class="icon" src="images/loc.png" alt="">
                            <span class="place">${event.addr || 'Location Not Available'}</span>
                        </div>
                        <div class="row">
                            <div class="col-md-6 left">
                                <p class="order-s"><span class="order-id">Order Id:</span> <span class="order-number">${event.bookingID || 'Unknown Order ID'}</span></p>
                                <p class="quantity-s"><span class="quantity">Quantity:</span> <span class="ticket">${event.qty || '0'}</span></p>
                            </div>
                            <div class="col-md-6 right">
                                <p class="stat"><span class="status">Status:</span> <span class="t-status success">${isEventCompleted(event.date) ? 'Completed' : 'Upcoming'}</span></p>
                                <p class="pay"><span class="payment">Payment:</span> <span class="price">$${event.payment || '0.00'}</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="booking">
                            <p><span class="book-text">Booking Date:</span> <span class="book-date">${event.orderDate || 'Unknown Date'}</span></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="ticket-button">
                            <button class="view" data-event='${JSON.stringify(event)}' data-bs-toggle="modal" data-bs-target="#ticketScanModal">View Ticket</button>
                            <button class="cancel" data-event='${JSON.stringify(event)}' data-bs-toggle="modal" data-bs-target="#ticketModal">Cancel Booking</button>
                        </div>
                    </div>
                </div>
            `;
                    container.insertAdjacentHTML('beforeend', eventHTML);
                });

                attachEventListeners();
            }

            function isEventCompleted(eventDate) {
                const currentDate = new Date();
                const eventDateObj = new Date(eventDate);
                return eventDateObj < currentDate;
            }

            function displayNoEventsMessage() {
                const container = document.getElementById("ticket-container");
                container.innerHTML = '<p class="alert alert-info">Events not found</p>';
            }

            function attachEventListeners() {
                document.querySelectorAll(".view").forEach(button => {
                    button.addEventListener("click", function() {
                        const event = JSON.parse(this.getAttribute("data-event"));
                        const firstName = localStorage.getItem('firstName') || 'Guest';
                        const lastName = localStorage.getItem('lastName') || '';
                        const fullName = firstName + (lastName ? ' ' + lastName : '');

                        document.getElementById("modal-event-image").src = event.photo || 'images/dummy.jpg';
                        document.getElementById("modal-event-name").textContent = event.name || 'Event Name Not Available';
                        document.getElementById("modal-event-date").textContent = `${event.date || ''} ${event.time || ''}`;
                        document.getElementById("modal-event-location").textContent = event.addr || 'Location Not Available';
                        document.getElementById("modal-user-name").textContent = fullName || 'User Name Not Available';
                        document.getElementById("modal-booking-id").textContent = event.bookingID || 'Unknown Order ID';
                        document.getElementById("modal-quantity").textContent = `${event.qty || '0'}`;
                        document.getElementById("modal-total-price").textContent = `$${(parseFloat(event.payment || '0.00') + parseFloat(event.tax || '0.00')).toFixed(2)}`;
                        document.getElementById("modal-event-qr").src = event.qr || 'images/dummy.jpg';
                    });
                });

                document.querySelectorAll(".cancel").forEach(button => {
                    button.addEventListener("click", function() {
                        const event = JSON.parse(this.getAttribute("data-event"));

                        document.getElementById("ticketModal-image").src = event.photo || 'images/dummy.jpg';
                        document.getElementById("ticketModal-name").textContent = event.name || 'Event Name Not Available';
                        document.getElementById("ticketModal-date").textContent = `${event.date || ''} ${event.time || ''}`;
                        document.getElementById("ticketModal-location").textContent = event.addr || 'Location Not Available';
                        document.getElementById("ticketModal-booking-id").textContent = event.bookingID || 'Unknown Order ID';
                        document.getElementById("ticketModal-quantity").textContent = `${event.qty || '0'}`;
                        document.getElementById("ticketModal-total-price").textContent = `$${event.payment || '0.00'}`;
                        document.getElementById("ticketModal-refund").textContent = `$${event.refundAmt || '0.00'}`;
                        document.getElementById("ticketModal-paid-amount").textContent = `$${event.payment || '0.00'}`;
                        document.getElementById("ticketModal-transaction-id").textContent = event.transactionID || 'Transaction ID Not Available';
                    });
                });
            }

            document.getElementById("tab-1").addEventListener("click", function() {
                displayEvents(eventsData);
            });

            document.getElementById("tab-2").addEventListener("click", function() {
                const upcomingEvents = eventsData.filter(event => event.isUpcoming === true);
                displayEvents(upcomingEvents);
            });

            document.getElementById("tab-3").addEventListener("click", function() {
                const completedEvents = eventsData.filter(event => event.isUpcoming === false);
                displayEvents(completedEvents);
            });
            
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tabButtons = document.querySelectorAll('#myTab .nav-link');

            tabButtons.forEach(button => {
                button.addEventListener('click', function() {

                    tabButtons.forEach(btn => btn.classList.remove('active'));

                    this.classList.add('active');
                });
            });
        });
    </script>

    <script>
        function sendCartToSession() {
            var cartData = JSON.parse(sessionStorage.getItem('cart_events')) || {};

            fetch('save_cart.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        cart_events: cartData
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // console.log("Cart data synced with PHP session.");
                    } else {
                        console.error("Failed to sync cart data:", data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    </script>

    <script>
        var firstName = localStorage.getItem('firstName');

        if (firstName) {

            document.querySelector('.u-name').innerText = firstName;
            console.log("First Name: " + firstName);
        } else {
            console.log("First Name not found in localStorage.");

            document.querySelector('.u-name').innerText = 'Guest';
        }
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