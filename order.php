<?php
session_start();

/*$_SESSION['value_user_id'];
if (isset($_SESSION['cart_events'])) {
    echo '<pre>', print_r($_SESSION['cart_events'], true), '</pre>';
} else {
    echo "No cart data in session.";
}*/

?>

<!DOCTYPE html>
<html>

<head>
    <?php include 'header-checkout.php'; ?>

    <link rel="shortcut icon" href="images/favicon.png">
    <style>
        div:where(.swal2-container) button:where(.swal2-styled):where(.swal2-confirm) {
            background: #F05336;
            color: #fff;
        }

        div:where(.swal2-container) button:focus {
            outline: none;
        }

        button.swal2-confirm.swal2-styled.swal2-default-outline {
            background: #F05336 !important;
            color: #fff;
        }

        button.swal2-cancel.swal2-styled.swal2-default-outline {
            background-color: #911D59 !important;
            color: #fff;
        }

        .offer.error {
            color: #FF0000 !important;
        }

        .form-control[readonly] {
            background-color: #fff;
            opacity: 1;
        }
    </style>

</head>

<body>

    <div class="order-detail">
        <div class="container">
            <div class="row">
                <div class="col-md-8 main-area">
                    <div class="heading">
                        <p>Your order</p>
                    </div>
                    <div class="order-info">
                        <div class="card-info row">
                            <div class="col-md-2">
                                <div class="event-name">
                                    <img id="event-banner" src="images/order-img.png" alt="">
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="counter">
                                    <h2 id="event-name"></h2>
                                    <p class="address" id="event-address"></p>
                                    <h3 class="price" id="event-price"></h3>
                                </div>
                            </div>
                        </div>
                        <div class="title-border"></div>

                        <!-- <div class="total-ticket-area">
                            <div class="container">
                                <div class="card-info row">
                                    <div class="col-md-6">
                                        <div class="event-name">
                                            <h5>Student Special - Early Bird - Ar</h5>
                                            <h5>$25.00</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="t-counter">
                                            <button id="t-decrease-earlybird">-</button>
                                            <span id="t-count-earlybird">1</span>
                                            <button id="t-increase-earlybird">+</button>
                                        </span>
                                        <span class="recycle">
                                            <img src="images/delete.png" alt="">
                                        </span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="price">
                                            <h5 id="t-price-earlybird">$25.00</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <div class="total-ticket-area order">
                            <div class="container" id="ticket-container">
                            </div>
                        </div>

                        <!-- <div class="total-ticket-area">
                            <div class="container">
                                <div class="card-info row">
                                    <div class="col-md-6">
                                        <div class="event-name">
                                            <h5>Family Zone - Ar</h5>
                                            <h5>$35.00</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="t-counter">
                                            <button id="t-decrease-familyzone">-</button>
                                            <span id="t-count-familyzone">1</span>
                                            <button id="t-increase-familyzone">+</button>
                                        </span>
                                        <span class="recycle">
                                            <img src="images/delete.png" alt="">
                                        </span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="price">
                                            <h5 id="t-price-familyzone">$35.00</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="total-ticket-area last-t">
                            <div class="container">
                                <div class="card-info row">
                                    <div class="col-md-6">
                                        <div class="event-name">
                                            <h5>VVIP Ticket - Ar</h5>
                                            <h5>$100.00</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="t-counter">
                                            <button id="t-decrease-vvip">-</button>
                                            <span id="t-count-vvip">1</span>
                                            <button id="t-increase-vvip">+</button>
                                        </span>
                                        <span class="recycle">
                                            <img src="images/delete.png" alt="">
                                        </span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="price">
                                            <h5 id="t-price-vvip">$100.00</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->


                    </div>

                    <div class="billing-area">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="heading">
                                    <p>Billing details</p>
                                </div>
                            </div>

                            <div class="main-area">
                                <div class="form-info">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="first-name" class="form-label">First Name *</label>
                                            <input type="text" class="form-control" id="first-name" readonly>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="last-name" class="form-label">Last Name *</label>
                                            <input type="text" class="form-control" id="last-name" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="phone" class="form-label">Phone *</label>
                                            <input type="text" class="form-control" id="user-phone" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Email Address *</label>
                                            <input type="email" class="form-control" id="email" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 side">
                    <div class="heading">
                        <p>Order Summary</p>
                    </div>
                    <div class="side-area">
                        <div class="promo-section">
                            <div class="heading">
                                <p>Promo Code</p>
                            </div>
                            <div id="code-apply">
                                <div class="row">
                                    <div class="col-8 col-sm-8">
                                        <input type="text" class="form-control" id="promoCodeInput" placeholder="Enter e-voucher code">
                                    </div>
                                    <div class="col-4 col-sm-4">
                                        <button class="btn-apply" id="applyButton">Apply</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="promoRow" style="display: none;">
                                <div class="col-md-12 position-relative">
                                    <input type="text" class="form-control" id="promoInput" placeholder="Enter another code">
                                    <button type="button" id="removeBtn" class="remove-btn" style="display: none;">Remove</button>
                                    <span class="offer" style="display: none;">Promo code applied successfully!</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="value-area mb-2">
                        <div id="ticketSummery">
                            <div class="row mb-2 ticketSummery">
                                <div class="col-md-12">
                                    <h2 id="ticket-name"></h2>
                                </div>
                                <div class="col-md-8">
                                    <h5 id="ticket-quantity"></h5>
                                </div>
                                <div class="col-md-4">
                                    <h3 class="total-price"></h3>
                                </div>
                            </div>
                        </div>

                        <div class="value-border mb-2"></div>
                        <div class="green-value" id="discountSection" style="display: none;">
                            <div class="row mb-2">
                                <div class="col-md-8">
                                    <h2>HappyEvents10</h2>
                                    <!-- <span class="tex">Item Discount</span><span class="ser-icon"><img src="images/circle.png" alt="">
                                        <span class="tooltipcheckoutbody">Promo code applied on tickets</span></span>
                                    </span> -->
                                    <span class="tex">Item Discount</span>
                                </div>
                                <div class="col-md-4">
                                    <h3></h3>
                                </div>
                            </div>
                            <div class="value-border mb-2"></div>
                        </div>
                        <div class="mob row align-items-center mb-2">
                            <div class="col-8 col-md-8">
                                <h2>Subtotal</h2>
                            </div>
                            <div class="col-4 col-md-4 text-end">
                                <h3 class="total-price"></h3>
                            </div>
                        </div>
                        <div class="mob row align-items-center mb-2">
                            <div class="col-8 col-md-8">
                                <h2>Estimated Tax</h2>
                            </div>
                            <div class="col-4 col-md-4 text-end">
                                <h3 class="est-tax">$0.00</h3>
                            </div>
                        </div>
                        <div class="mob row align-items-center mb-2">
                            <div class="col-8 col-md-8">
                                <span class="service">Service Fee</span>
                                <span class="ser-icon">
                                    <img src="images/circle.png" alt="">
                                    <span class="tooltipcheckoutbody">This fee helps cover Quicklly's operational cost</span>
                                </span>
                            </div>
                            <div class="col-4 col-md-4 text-end">
                                <h3 class="s-fee"></h3>
                            </div>
                        </div>
                        <div class="value-border mb-2"></div>
                        <div class="mob row align-items-center">
                            <div class="col-8 col-md-8">
                                <p>Total</p>
                            </div>
                            <div class="col-4 col-md-4 text-end">
                                <p class="val"></p>
                            </div>
                        </div>
                    </div>

                    <!--<div class="bank-pay">-->
                    <!--    <button class="btn-bank">Pay by Bank <span class="final-p">$340.00</span> <span class="dis-p">Save $10</span></button>-->
                    <!--    <span class="ico"><img src="images/circle-outline.png" alt=""></span>-->
                    <!--</div>-->

                    <div class="card-pay">
                        <!--<button class="btn-card" data-bs-toggle="modal" data-bs-target="#paymentPopup" onclick="getValues()">Pay by Card <span class="final-p">$350.62</span></button>-->
                        <!-- <button class="btn-card" data-bs-toggle="modal" data-bs-target="#paymentPopup" onclick="getValues()">Proceed to checkout <span class="final-p"></span></button> -->
                        <button class="btn-card" onclick="handleCheckoutClick()">
                            Proceed to payment <span class="final-p"></span>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="load-spin" id="loader">
        <div class="text-center">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="confirmModalLabel"><img src="images/confirm-ticket.png" alt=""></h1>
                </div>
                <div class="modal-body">
                    <p class="heading">Your booking is confirmed!</p>
                    <p class="sub-head">To view ticket and check your booking details, visit the Quicklly App.</p>
                    <div class="ticket-co">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="images/order-img.png" alt="">
                            </div>
                            <div class="col-md-9">
                                <p class="t-name" id="t-name">Bollywood Holi Mela with DJ Nish</p>
                                <p class="t-time">Saturday, March 30 , 4 - 8pm CDT</p>
                                <p class="t-qty">2 Tickets</p>
                                <p class="t-price">$160.99</p>
                            </div>
                        </div>
                    </div>
                    <h2>Havent downloaded the Quicklly App yet?</h2>
                    <h2>Get the link to download the app</h2>

                    <div class="phone-area">
                        <div class="row">
                            <div class="col-md-12">
                                <div style="display: flex; justify-content: center; align-items: center;">
                                    <input type="text" class="num" placeholder="+1">
                                    <input type="text" class="phone" placeholder="Enter phone number">
                                    <button type="button" class="send-sms">Send SMS</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ios-android">
                        <div class="row">
                            <div class="col-md-6">
                                <img class="google" src="images/google.png" alt="">
                            </div>
                            <div class="col-md-6">
                                <img class="ios" src="images/ios.png" alt="">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <div class="home-btn">
                        <a href="index" class="btn go-home">Go to Homepage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('promoInput').addEventListener('input', function() {
            const removeBtn = document.getElementById('removeBtn');
            if (this.value.length > 0) {
                removeBtn.style.display = 'block';
            } else {
                removeBtn.style.display = 'none';
            }
        });

        document.getElementById('removeBtn').addEventListener('click', function() {
            const input = document.getElementById('promoInput');
            const promoCodeInput = document.getElementById('promoCodeInput');
            input.value = '';
            promoCodeInput.value = '';
            this.style.display = 'none';
        });
    </script>

    <script>
        const discountSection = document.getElementById("discountSection");
        const applyButton = document.getElementById("applyButton");
        const removeButton = document.getElementById("removeBtn");
        const promoInput = document.getElementById("promoInput");
        const offerAppliedText = document.querySelector(".offer");
        const promoRow = document.getElementById("promoRow");
        const promoCodeInput = document.getElementById("promoCodeInput");
        const codeApplyDiv = document.getElementById('code-apply');

        applyButton.addEventListener("click", function() {
            const promoCodeEntered = promoCodeInput.value.trim();

            if (promoCodeEntered === "") {
                alert("Please enter a valid promo code.");
                return;
            }

            discountSection.style.display = "block";

            promoRow.style.display = "block";
            removeButton.style.display = "inline-block";
            offerAppliedText.style.display = "block";

            promoInput.value = promoCodeEntered;

            codeApplyDiv.style.display = "none";
        });

        removeButton.addEventListener("click", function() {

            discountSection.style.display = "none";
            promoInput.value = "";
            promoRow.style.display = "none";
            removeButton.style.display = "none";
            offerAppliedText.style.display = "none";
            codeApplyDiv.style.display = "block";
        });
    </script>

    <!-- <script>
        function loadTickets() {
            var tickets = JSON.parse(sessionStorage.getItem('cart_events')) || [];
            var ticketContainer = document.getElementById('ticket-container');
            var ticketSummery = document.getElementById('ticketSummery');
            var totalPriceElements = document.querySelectorAll('.total-price');

            ticketContainer.innerHTML = '';
            ticketSummery.innerHTML = '';
            let total = 0;

            if (!tickets.addOns || tickets.addOns.length === 0) {
                ticketContainer.innerHTML = '<p>No tickets selected.</p>';
                ticketSummery.innerHTML = '<p>No tickets selected.</p>';
                totalPriceElements.forEach(function(el) {
                    el.textContent = '$0.00';
                });
                updateTaxDisplay(0);
                updateServiceFee(0);
                updateGrandTotal();
                sendCartToSession();
                return;
            }

            tickets.addOns.forEach(function(ticket) {
                var ticketRow = document.createElement('div');
                var summeryRow = document.createElement('div');
                ticketRow.className = 'card-info row';
                ticketRow.innerHTML = `
                    <div class="col-md-6">
                        <div class="event-name">
                            <h5>${ticket.name}</h5>
                            <h5>$${ticket.cost.toFixed(2)}</h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <span class="t-counter">
                            <button class="t-decrease" data-id="${ticket.sizeid}">-</button>
                            <span class="t-count">${ticket.qty}</span>
                            <button class="t-increase" data-id="${ticket.sizeid}">+</button>
                        </span>
                        <span class="recycle">
                            <img src="images/delete.png" alt="Delete" class="delete-ticket" data-id="${ticket.sizeid}" title="Remove this ticket">
                        </span>
                    </div>
                    <div class="col-md-2">
                        <div class="price">
                            <h5 class="t-price" data-id="${ticket.sizeid}">$${(ticket.cost * ticket.qty).toFixed(2)}</h5>
                        </div>
                    </div>
                `;

                summeryRow.className = 'row mb-2';
                summeryRow.innerHTML = `
                    <div class="col-md-12">
                        <h2>${ticket.name}</h2>
                    </div>
                    <div class="col-8 col-md-8">
                        <h5 data-id="${ticket.sizeid}">$${ticket.cost.toFixed(2)} x ${ticket.qty} = $${(ticket.cost * ticket.qty).toFixed(2)}</h5>
                    </div>
                    <div class="col-4 col-md-4">
                        <h3 class="ticket-total" data-id="${ticket.sizeid}">$${(ticket.cost * ticket.qty).toFixed(2)}</h3>
                    </div>
                `;

                ticketContainer.appendChild(ticketRow);
                ticketSummery.appendChild(summeryRow);

                total += ticket.cost * ticket.qty;
            });

            totalPriceElements.forEach(function(el) {
                el.textContent = `$${total.toFixed(2)}`;
            });

            updateTotalPrice(total);
            updateTaxDisplay();
            updateGrandTotal();
            sendCartToSession();

            attachEventListeners();
        }

        // function updateTotalPrice(total) {
        //     var tickets = JSON.parse(sessionStorage.getItem('cart_events')) || [];

        //     var totalPriceElements = document.querySelectorAll('.total-price');
        //     totalPriceElements.forEach(function(el) {
        //         el.textContent = `$${total.toFixed(2)}`;
        //     });

        //     if (tickets.addOns) {
        //         tickets.addOns.forEach(function(ticket) {
        //             var ticketTotalElement = document.querySelector(`.ticket-total[data-id="${ticket.sizeid}"]`);
        //             if (ticketTotalElement) {
        //                 ticketTotalElement.textContent = `$${(ticket.cost * ticket.qty).toFixed(2)}`;
        //             }
        //         });
        //     }

        //     updateServiceFee(total);
        //     updateTaxDisplay(total);

        //     updateSessionDetails();
        //     updateGrandTotal();
        //     sendCartToSession();
        // }

        function updateTotalPrice(total) {
            const totalPriceElements = document.querySelectorAll('.total-price');
            const discountSection = document.getElementById('discountSection');
            let discount = 0;

            // Check if promo code is applied
            if (promoApplied) {
                discount = total * 0.10; // 10% discount
                total -= discount;
            }

            totalPriceElements.forEach(function (el) {
                el.textContent = `$${total.toFixed(2)}`;
            });

            if (promoApplied) {
                discountSection.style.display = 'block';
                discountSection.querySelector('h3').textContent = `-$${discount.toFixed(2)}`;
            } else {
                discountSection.style.display = 'none';
            }

            updateServiceFee(total);
            updateTaxDisplay(total);
            updateGrandTotal();
            sendCartToSession();
        }


        function updateServiceFee(total) {
            const serviceFeeRate = 0.075;
            const serviceFee = total * serviceFeeRate;
            document.querySelector('.s-fee').textContent = `$${serviceFee.toFixed(2)}`;
            // document.querySelector('.tooltipwrapv').textContent = `$${serviceFee.toFixed(2)}`;
            updateGrandTotal();
            sendCartToSession();
        }

        function updatePrice(sizeId, count) {
            var tickets = JSON.parse(sessionStorage.getItem('cart_events'));
            var ticket = tickets.addOns.find(t => t.sizeid === sizeId);
            if (ticket) {
                ticket.qty = count;

                var priceElement = document.querySelector(`.t-price[data-id="${sizeId}"]`);
                if (priceElement) {
                    priceElement.textContent = `$${(ticket.cost * count).toFixed(2)}`;
                }

                var ticketTotalElement = document.querySelector(`.ticket-total[data-id="${sizeId}"]`);
                if (ticketTotalElement) {
                    ticketTotalElement.textContent = `$${(ticket.cost * count).toFixed(2)}`;
                }

                var detailedPriceElement = document.querySelector(`.row.mb-2 h5[data-id="${sizeId}"]`);
                if (detailedPriceElement) {
                    detailedPriceElement.textContent = `$${ticket.cost.toFixed(2)} x ${count} = $${(ticket.cost * count).toFixed(2)}`;
                }

                sessionStorage.setItem('cart_events', JSON.stringify(tickets));

                updateSessionStorage(sizeId, count);
                updateTotalPrice(getTotalCost());
                sendCartToSession();
            }
        }


        function updateSessionStorage(sizeId, count) {
            var tickets = JSON.parse(sessionStorage.getItem('cart_events'));
            var ticket = tickets.addOns.find(t => t.sizeid === sizeId);
            if (ticket) {
                ticket.qty = count;
                sessionStorage.setItem('cart_events', JSON.stringify(tickets));

                sendCartToSession();
            }
        }

        function updateSessionDetails() {
            var tickets = JSON.parse(sessionStorage.getItem('cart_events')) || [];
            var totalQuantity = tickets.addOns.reduce((total, ticket) => total + ticket.qty, 0);
            var totalCost = getTotalCost();
            const serviceFeeRate = 0.075; // 7.5% service fee
            const serviceFeeValue = (totalCost * serviceFeeRate).toFixed(2);
            var remarks = tickets.addOns.map(ticket => `${ticket.name}(x${ticket.qty})`).join(", ");

            var taxRate = tickets.taxRate || 0;

            var addOnBaseQtys = tickets.addOns.map(ticket => ticket.qty).join(",");
            var addOnQtys = tickets.addOns.map(ticket => ticket.qty).join(",");

            tickets.totalcalcqty = totalQuantity;
            tickets.remarks = remarks;
            tickets.customize = remarks;
            tickets.calcprice = totalCost.toFixed(2);
            tickets.total = totalCost.toFixed(2);
            tickets.servicefeevalue = serviceFeeValue;
            tickets.price = totalCost.toFixed(2);
            tickets.taxRate = taxRate;
            tickets.addOnBaseQtys = addOnBaseQtys;
            tickets.addOnQtys = addOnQtys;

            sessionStorage.setItem('cart_events', JSON.stringify(tickets));

            sendCartToSession();
        }

        function attachEventListeners() {
            document.querySelectorAll('.t-decrease').forEach(function(button) {
                button.addEventListener('click', function() {
                    var sizeId = this.getAttribute('data-id');
                    var countElement = this.nextElementSibling;
                    var count = parseInt(countElement.textContent);
                    if (count > 1) {
                        count--;
                        countElement.textContent = count;
                        updatePrice(sizeId, count);
                    }
                });
            });

            document.querySelectorAll('.t-increase').forEach(function(button) {
                button.addEventListener('click', function() {
                    var sizeId = this.getAttribute('data-id');
                    var countElement = this.previousElementSibling;
                    var count = parseInt(countElement.textContent);

                    var tickets = JSON.parse(sessionStorage.getItem('cart_events'));
                    var ticket = tickets.addOns.find(t => t.sizeid === sizeId);

                    if (count < 20) {
                        count++;
                        countElement.textContent = count;
                        updatePrice(sizeId, count);
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Maximum Limit Reached',
                            text: 'You can only buy a maximum of 20 tickets!',
                        });
                    }
                });
            });

            document.querySelectorAll('.delete-ticket').forEach(function(button) {
                button.addEventListener('click', function() {
                    var sizeId = this.getAttribute('data-id');
                    removeTicket(sizeId);
                });
            });

            // document.querySelectorAll('.delete-ticket').forEach(function(button) {
            //     button.addEventListener('click', function() {
            //         var sizeId = this.getAttribute('data-id');

            //         Swal.fire({
            //             title: 'Are you sure?',
            //             text: "Do you really want to delete this ticket?",
            //             icon: 'warning',
            //             showCancelButton: true,
            //             confirmButtonColor: '#d33',
            //             cancelButtonColor: '#3085d6',
            //             confirmButtonText: 'Yes, delete it!',
            //             cancelButtonText: 'Cancel'
            //         }).then((result) => {
            //             if (result.isConfirmed) {

            //                 removeTicket(sizeId);
            //                 Swal.fire(
            //                     'Deleted!',
            //                     'The ticket has been removed.',
            //                     'success'
            //                 );
            //             }
            //         });
            //     });
            // });
            
        }


        function getTotalTicketCount() {
            var tickets = JSON.parse(sessionStorage.getItem('cart_events')) || [];
            return tickets.addOns.reduce((total, ticket) => total + ticket.qty, 0);
        }

        function getTotalCost() {
            var tickets = JSON.parse(sessionStorage.getItem('cart_events')) || [];
            return tickets.addOns.reduce((total, ticket) => total + (ticket.qty * ticket.cost), 0);
        }


        function updateTaxDisplay() {
            var tickets = JSON.parse(sessionStorage.getItem('cart_events')) || [];
            var total = getTotalCost();

            // var taxRate = parseFloat(tickets.taxRate) || 0;
            var taxRate = 0;

            var estimatedTax = total * taxRate;
            document.querySelector('.est-tax').textContent = `$${estimatedTax.toFixed(2)}`;
            // document.querySelector('.tooltipwrapv.tax').textContent = `$${estimatedTax.toFixed(2)}`;

            updateGrandTotal();
            sendCartToSession();
        }


        function removeTicket(sizeId) {
            var tickets = JSON.parse(sessionStorage.getItem('cart_events'));
            if (tickets && tickets.addOns) {
                var ticketIndex = tickets.addOns.findIndex(t => t.sizeid === sizeId);
                if (ticketIndex !== -1) {
                    tickets.addOns.splice(ticketIndex, 1);
                    sessionStorage.setItem('cart_events', JSON.stringify(tickets));

                    sendCartToSession();
                    loadTickets();
                }
            }
        }

        window.onload = loadTickets;
    </script> -->

    <script>
        function loadTickets() {
            var tickets = JSON.parse(sessionStorage.getItem('cart_events')) || [];
            var ticketContainer = document.getElementById('ticket-container');
            var ticketSummery = document.getElementById('ticketSummery');
            var totalPriceElements = document.querySelectorAll('.total-price');

            ticketContainer.innerHTML = '';
            ticketSummery.innerHTML = '';
            let total = 0;

            if (!tickets.addOns || tickets.addOns.length === 0) {
                ticketContainer.innerHTML = '<p>No tickets selected.</p>';
                ticketSummery.innerHTML = '<p>No tickets selected.</p>';
                totalPriceElements.forEach(function(el) {
                    el.textContent = '$0.00';
                });
                updateTaxDisplay(0);
                updateServiceFee(0);
                updateGrandTotal();
                sendCartToSession();
                return;
            }

            tickets.addOns.forEach(function(ticket) {
                var ticketRow = document.createElement('div');
                var summeryRow = document.createElement('div');
                ticketRow.className = 'card-info row';
                ticketRow.innerHTML = `
                    <div class="col-md-6">
                        <div class="event-name">
                            <h5>${ticket.name}</h5>
                            <h5>$${ticket.cost.toFixed(2)}</h5>
                        </div>
                    </div>
                    <div class="col-8 col-md-4">
                        <span class="t-counter">
                            <button class="t-decrease" data-id="${ticket.sizeid}">-</button>
                            <span class="t-count">${ticket.qty}</span>
                            <button class="t-increase" data-id="${ticket.sizeid}">+</button>
                        </span>
                        <span class="recycle">
                            <img src="images/delete.png" alt="Delete" class="delete-ticket" data-id="${ticket.sizeid}" title="Remove this ticket">
                        </span>
                    </div>
                    <div class="col-4 col-md-2">
                        <div class="price">
                            <h5 class="t-price" data-id="${ticket.sizeid}">$${(ticket.cost * ticket.qty).toFixed(2)}</h5>
                        </div>
                    </div>
                `;

                summeryRow.className = 'row mb-2';
                summeryRow.innerHTML = `
                    <div class="col-md-12">
                        <h2>${ticket.name}</h2>
                    </div>
                    <div class="col-8 col-md-8">
                        <h5 data-id="${ticket.sizeid}">$${ticket.cost.toFixed(2)} x ${ticket.qty} = $${(ticket.cost * ticket.qty).toFixed(2)}</h5>
                    </div>
                    <div class="col-4 col-md-4">
                        <h3 class="ticket-total" data-id="${ticket.sizeid}">$${(ticket.cost * ticket.qty).toFixed(2)}</h3>
                    </div>
                `;

                ticketContainer.appendChild(ticketRow);
                ticketSummery.appendChild(summeryRow);

                total += ticket.cost * ticket.qty;
            });

            totalPriceElements.forEach(function(el) {
                el.textContent = `$${total.toFixed(2)}`;
            });

            updateTotalPrice(total);
            updateTaxDisplay();
            updateGrandTotal();
            sendCartToSession();

            attachEventListeners();
        }

        // function updateTotalPrice(total) {
        //     var tickets = JSON.parse(sessionStorage.getItem('cart_events')) || [];

        //     var totalPriceElements = document.querySelectorAll('.total-price');
        //     totalPriceElements.forEach(function(el) {
        //         el.textContent = `$${total.toFixed(2)}`;
        //     });

        //     if (tickets.addOns) {
        //         tickets.addOns.forEach(function(ticket) {
        //             var ticketTotalElement = document.querySelector(`.ticket-total[data-id="${ticket.sizeid}"]`);
        //             if (ticketTotalElement) {
        //                 ticketTotalElement.textContent = `$${(ticket.cost * ticket.qty).toFixed(2)}`;
        //             }
        //         });
        //     }

        //     updateServiceFee(total);
        //     updateTaxDisplay(total);

        //     updateSessionDetails();
        //     updateGrandTotal();
        //     sendCartToSession();
        // }

        function updateTotalPrice(total) {
            const totalPriceElements = document.querySelectorAll('.total-price');
            const discountSection = document.getElementById('discountSection');
            let discount = 0;

            // Check if promo code is applied
            if (promoApplied) {
                discount = total * 0.10; // 10% discount
                total -= discount;
            }

            totalPriceElements.forEach(function (el) {
                el.textContent = `$${total.toFixed(2)}`;
            });

            if (promoApplied) {
                discountSection.style.display = 'block';
                discountSection.querySelector('h3').textContent = `-$${discount.toFixed(2)}`;
            } else {
                discountSection.style.display = 'none';
            }

            updateServiceFee(total);
            updateTaxDisplay(total);
            updateGrandTotal();
            sendCartToSession();
        }


        function updateServiceFee(total) {
            const serviceFeeRate = 0.075;
            const serviceFee = total * serviceFeeRate;
            document.querySelector('.s-fee').textContent = `$${serviceFee.toFixed(2)}`;
            // document.querySelector('.tooltipwrapv').textContent = `$${serviceFee.toFixed(2)}`;
            updateGrandTotal();
            sendCartToSession();
        }

        function updatePrice(sizeId, count) {
            var tickets = JSON.parse(sessionStorage.getItem('cart_events'));
            var ticket = tickets.addOns.find(t => t.sizeid === sizeId);
            if (ticket) {
                ticket.qty = count;

                var priceElement = document.querySelector(`.t-price[data-id="${sizeId}"]`);
                if (priceElement) {
                    priceElement.textContent = `$${(ticket.cost * count).toFixed(2)}`;
                }

                var ticketTotalElement = document.querySelector(`.ticket-total[data-id="${sizeId}"]`);
                if (ticketTotalElement) {
                    ticketTotalElement.textContent = `$${(ticket.cost * count).toFixed(2)}`;
                }

                var detailedPriceElement = document.querySelector(`.row.mb-2 h5[data-id="${sizeId}"]`);
                if (detailedPriceElement) {
                    detailedPriceElement.textContent = `$${ticket.cost.toFixed(2)} x ${count} = $${(ticket.cost * count).toFixed(2)}`;
                }

                sessionStorage.setItem('cart_events', JSON.stringify(tickets));

                updateSessionStorage(sizeId, count);
                updateTotalPrice(getTotalCost());
                sendCartToSession();
            }
        }


        function updateSessionStorage(sizeId, count) {
            var tickets = JSON.parse(sessionStorage.getItem('cart_events'));
            var ticket = tickets.addOns.find(t => t.sizeid === sizeId);
            if (ticket) {
                ticket.qty = count;
                sessionStorage.setItem('cart_events', JSON.stringify(tickets));

                sendCartToSession();
            }
        }

        function updateSessionDetails() {
            var tickets = JSON.parse(sessionStorage.getItem('cart_events')) || [];
            var totalQuantity = tickets.addOns.reduce((total, ticket) => total + ticket.qty, 0);
            var totalCost = getTotalCost();
            const serviceFeeRate = 0.075; // 7.5% service fee
            const serviceFeeValue = (totalCost * serviceFeeRate).toFixed(2);
            var remarks = tickets.addOns.map(ticket => `${ticket.name}(x${ticket.qty})`).join(", ");

            var taxRate = tickets.taxRate || 0;

            var addOnBaseQtys = tickets.addOns.map(ticket => ticket.qty).join(",");
            var addOnQtys = tickets.addOns.map(ticket => ticket.qty).join(",");

            tickets.totalcalcqty = totalQuantity;
            tickets.remarks = remarks;
            tickets.customize = remarks;
            tickets.calcprice = totalCost.toFixed(2);
            tickets.total = totalCost.toFixed(2);
            tickets.servicefeevalue = serviceFeeValue;
            tickets.price = totalCost.toFixed(2);
            tickets.taxRate = taxRate;
            tickets.addOnBaseQtys = addOnBaseQtys;
            tickets.addOnQtys = addOnQtys;

            sessionStorage.setItem('cart_events', JSON.stringify(tickets));

            sendCartToSession();
        }

        function attachEventListeners() {
            document.querySelectorAll('.t-decrease').forEach(function(button) {
                button.addEventListener('click', function() {
                    var sizeId = this.getAttribute('data-id');
                    var countElement = this.nextElementSibling;
                    var count = parseInt(countElement.textContent);
                    if (count > 1) {
                        count--;
                        countElement.textContent = count;
                        updatePrice(sizeId, count);
                    }
                });
            });

            document.querySelectorAll('.t-increase').forEach(function(button) {
                button.addEventListener('click', function() {
                    var sizeId = this.getAttribute('data-id');
                    var countElement = this.previousElementSibling;
                    var count = parseInt(countElement.textContent);

                    var tickets = JSON.parse(sessionStorage.getItem('cart_events'));
                    var ticket = tickets.addOns.find(t => t.sizeid === sizeId);

                    if (count < 20) {
                        count++;
                        countElement.textContent = count;
                        updatePrice(sizeId, count);
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Maximum Limit Reached',
                            text: 'You can only buy a maximum of 20 tickets!',
                        });
                    }
                });
            });

            // document.querySelectorAll('.delete-ticket').forEach(function(button) {
            //     button.addEventListener('click', function() {
            //         var sizeId = this.getAttribute('data-id');
            //         removeTicket(sizeId);
            //     });
            // });

            // document.querySelectorAll('.delete-ticket').forEach(function(button) {
            //     button.addEventListener('click', function() {
            //         var sizeId = this.getAttribute('data-id');

            //         Swal.fire({
            //             title: 'Are you sure?',
            //             text: "Do you really want to delete this ticket?",
            //             icon: 'warning',
            //             showCancelButton: true,
            //             confirmButtonColor: '#d33',
            //             cancelButtonColor: '#3085d6',
            //             confirmButtonText: 'Yes, delete it!',
            //             cancelButtonText: 'Cancel'
            //         }).then((result) => {
            //             if (result.isConfirmed) {

            //                 removeTicket(sizeId);
            //                 Swal.fire(
            //                     'Deleted!',
            //                     'The ticket has been removed.',
            //                     'success'
            //                 );
            //             }
            //         });
            //     });
            // });

            document.querySelectorAll('.delete-ticket').forEach(function(button) {
                button.addEventListener('click', function() {
                    var sizeId = this.getAttribute('data-id');

                    var isConfirmed = confirm("Do you really want to delete this ticket?");
         
                    if (isConfirmed) {
                        removeTicket(sizeId);

                        // alert('The ticket has been removed.');
                    } else {
                        
                        // alert('The ticket was not deleted.');
                    }
                });
            });
            
        }


        function getTotalTicketCount() {
            var tickets = JSON.parse(sessionStorage.getItem('cart_events')) || [];
            return tickets.addOns.reduce((total, ticket) => total + ticket.qty, 0);
        }

        function getTotalCost() {
            var tickets = JSON.parse(sessionStorage.getItem('cart_events')) || [];
            return tickets.addOns.reduce((total, ticket) => total + (ticket.qty * ticket.cost), 0);
        }


        function updateTaxDisplay() {
            var tickets = JSON.parse(sessionStorage.getItem('cart_events')) || [];
            var total = getTotalCost();

            // var taxRate = parseFloat(tickets.taxRate) || 0;
            var taxRate = 0;

            var estimatedTax = total * taxRate;
            document.querySelector('.est-tax').textContent = `$${estimatedTax.toFixed(2)}`;
            // document.querySelector('.tooltipwrapv.tax').textContent = `$${estimatedTax.toFixed(2)}`;

            updateGrandTotal();
            sendCartToSession();
        }


        function removeTicket(sizeId) {
            var tickets = JSON.parse(sessionStorage.getItem('cart_events'));
            if (tickets && tickets.addOns) {
                var ticketIndex = tickets.addOns.findIndex(t => t.sizeid === sizeId);
                if (ticketIndex !== -1) {
                    tickets.addOns.splice(ticketIndex, 1);
                    sessionStorage.setItem('cart_events', JSON.stringify(tickets));

                    sendCartToSession();
                    loadTickets();
                }
            }
        }

        window.onload = loadTickets;
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
        function loadEventName() {
            var name = sessionStorage.getItem('name');
            var eventDate = sessionStorage.getItem('eventDate');
            var eventTime = sessionStorage.getItem('eventTime');
            var eventCost = sessionStorage.getItem('eventCost');
            var photo = sessionStorage.getItem('photo');



            if (eventDate && eventTime) {
                document.getElementById('event-address').textContent = `${eventDate} - ${eventTime}`;
            }

            if (name) {
                document.getElementById('event-name').textContent = name;
            }
            if (eventCost) {
                document.getElementById('event-price').textContent = eventCost;
            }

            if (photo) {
                const bannerElement = document.getElementById('event-banner');
                bannerElement.src = photo;
            }
        }

        window.onload = function() {
            loadTickets();
            loadEventName();
            // loadEventAddress();
        };
    </script>

    <!-- <script>
        document.getElementById('applyButton').addEventListener('click', function() {
            const promoCode = document.getElementById('promoCodeInput').value;
            const totalPriceElement = document.querySelector('.total-price');
            let totalPrice = parseFloat(totalPriceElement.textContent.replace('$', '')) || 0;

            if (promoCode === 'HappyEvents10') {
                const discount = totalPrice * 0.10;
                const discountedTotal = totalPrice - discount;

                document.querySelectorAll('.total-price').forEach(function(el) {
                    el.textContent = `$${discountedTotal.toFixed(2)}`;
                });

                document.getElementById('discountSection').style.display = 'block';
                document.getElementById('discountSection').querySelector('h3').textContent = `-$${discount.toFixed(2)}`;

                updateGrandTotal();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Promo Code',
                    text: 'Please enter a valid promo code.',
                });
            }
        });

        function updateGrandTotal() {
            const totalPrice = parseFloat(document.querySelector('.total-price').textContent.replace('$', '')) || 0;
            const estimatedTax = parseFloat(document.querySelector('.est-tax').textContent.replace('$', '')) || 0;
            const serviceFee = parseFloat(document.querySelector('.s-fee').textContent.replace('$', '')) || 0;

            const grandTotal = totalPrice + estimatedTax + serviceFee;

            document.querySelector('.val').textContent = `$${grandTotal.toFixed(2)}`;
            document.querySelector('.final-p').textContent = `$${grandTotal.toFixed(2)}`;
        }
    </script> -->

    <!-- <script>
        let promoApplied = false;
        let originalPrice = null;

        document.getElementById('applyButton').addEventListener('click', function() {
            const promoCode = document.getElementById('promoCodeInput').value.trim();
            const totalPriceElement = document.querySelector('.total-price');
            let totalPrice = parseFloat(totalPriceElement.textContent.replace('$', '')) || 0;

            const offerMessage = document.querySelector('.offer');
            const discountSection = document.getElementById('discountSection');

            offerMessage.style.display = 'none';
            offerMessage.textContent = '';

            if (!originalPrice) {
                originalPrice = totalPrice;
            }

            if (promoApplied) {

                offerMessage.style.display = 'block';
                offerMessage.className = 'offer error';
                offerMessage.textContent = 'Promo code can only be used once.';

                discountSection.style.display = 'none';
                return;
            }

            if (promoCode === 'HappyEvents10') {

                const discount = totalPrice * 0.10;
                const discountedTotal = totalPrice - discount;

                document.querySelectorAll('.total-price').forEach(function(el) {
                    el.textContent = `$${discountedTotal.toFixed(2)}`;
                });

                discountSection.style.display = 'block';
                discountSection.querySelector('h3').textContent = `-$${discount.toFixed(2)}`;

                promoApplied = true;
                updateGrandTotal();

                offerMessage.style.display = 'block';
                offerMessage.className = 'offer success';
                offerMessage.textContent = 'Promo code applied successfully!';
            } else {

                offerMessage.style.display = 'block';
                offerMessage.className = 'offer error';
                offerMessage.textContent = 'Invalid promo code. Please try again.';

                discountSection.style.display = 'none';
            }
        });

        document.getElementById('removeBtn').addEventListener('click', function() {
            const totalPriceElement = document.querySelector('.total-price');
            const offerMessage = document.querySelector('.offer');
            const discountSection = document.getElementById('discountSection');
            const promoCodeInput = document.getElementById('promoCodeInput');

            if (originalPrice) {
                document.querySelectorAll('.total-price').forEach(function(el) {
                    el.textContent = `$${originalPrice.toFixed(2)}`;
                });
            }

            updateGrandTotal();

            discountSection.style.display = 'none';
            promoCodeInput.value = '';

            offerMessage.style.display = 'none';

            promoApplied = false;
            originalPrice = null;
        });

        function updateGrandTotal() {
            const totalPrice = parseFloat(document.querySelector('.total-price').textContent.replace('$', '')) || 0;
            const estimatedTax = parseFloat(document.querySelector('.est-tax')?.textContent.replace('$', '')) || 0;
            const serviceFee = parseFloat(document.querySelector('.s-fee')?.textContent.replace('$', '')) || 0;

            const grandTotal = totalPrice + estimatedTax + serviceFee;

            document.querySelector('.val').textContent = `$${grandTotal.toFixed(2)}`;
            document.querySelector('.final-p').textContent = `$${grandTotal.toFixed(2)}`;
        }
    </script> -->

    <script>
        let promoApplied = false;
        let originalPrice = null;

        document.getElementById('applyButton').addEventListener('click', function() {
            const promoCode = document.getElementById('promoCodeInput').value.trim();
            const totalPriceElement = document.querySelector('.total-price');
            let totalPrice = parseFloat(totalPriceElement.textContent.replace('$', '')) || 0;

            const offerMessage = document.querySelector('.offer');
            const discountSection = document.getElementById('discountSection');

            offerMessage.style.display = 'none';
            offerMessage.textContent = '';

            if (!originalPrice) {
                originalPrice = totalPrice;
            }

            if (promoApplied) {

                offerMessage.style.display = 'block';
                offerMessage.className = 'offer error';
                offerMessage.textContent = 'Promo code can only be used once.';

                discountSection.style.display = 'none';
                return;
            }

            if (promoCode === 'HappyEvents10') {

                const discount = totalPrice * 0.10;
                const discountedTotal = totalPrice - discount;

                document.querySelectorAll('.total-price').forEach(function(el) {
                    el.textContent = `$${discountedTotal.toFixed(2)}`;
                });

                discountSection.style.display = 'block';
                discountSection.querySelector('h3').textContent = `-$${discount.toFixed(2)}`;

                promoApplied = true;
                updateGrandTotal();

                offerMessage.style.display = 'block';
                offerMessage.className = 'offer success';
                offerMessage.textContent = 'Promo code applied successfully!';
            } else {

                offerMessage.style.display = 'block';
                offerMessage.className = 'offer error';
                offerMessage.textContent = 'Invalid promo code. Please try again.';

                discountSection.style.display = 'none';
            }
        });

        document.getElementById('removeBtn').addEventListener('click', function() {
            const totalPriceElement = document.querySelector('.total-price');
            const offerMessage = document.querySelector('.offer');
            const discountSection = document.getElementById('discountSection');
            const promoCodeInput = document.getElementById('promoCodeInput');

            if (originalPrice) {
                document.querySelectorAll('.total-price').forEach(function(el) {
                    el.textContent = `$${originalPrice.toFixed(2)}`;
                });
            }

            updateGrandTotal();

            discountSection.style.display = 'none';
            promoCodeInput.value = '';

            offerMessage.style.display = 'none';

            promoApplied = false;
            originalPrice = null;
        });

        function updateGrandTotal() {
            const totalPrice = parseFloat(document.querySelector('.total-price').textContent.replace('$', '')) || 0;
            const estimatedTax = parseFloat(document.querySelector('.est-tax')?.textContent.replace('$', '')) || 0;
            const serviceFee = parseFloat(document.querySelector('.s-fee')?.textContent.replace('$', '')) || 0;

            const grandTotal = totalPrice + estimatedTax + serviceFee;

            document.querySelector('.val').textContent = `$${grandTotal.toFixed(2)}`;
            document.querySelector('.final-p').textContent = `$${grandTotal.toFixed(2)}`;
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const apiUrl = 'https://devrestapi.goquicklly.com/user/my-account';
            // const bearerToken = localStorage.getItem('bearer_token');
            const bearerToken = "<?php echo $_SESSION['bearer_token']; ?>";
            const uid = localStorage.getItem('uid');

            if (!uid || !bearerToken) {
                console.error('User ID or Bearer Token is missing');
                return;
            }

            async function loadUserProfile() {
                try {
                    const response = await fetch(apiUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': `Bearer ${bearerToken}`
                        },
                        body: JSON.stringify({
                            "uid": uid
                        })
                    });

                    if (!response.ok) {
                        throw new Error('Failed to fetch profile data');
                    }

                    const data = await response.json();
                    populateFormFields(data);

                } catch (error) {
                    console.error('Error:', error);
                }
            }

            // Populate form fields with data from the API
            function populateFormFields(data) {
                if (data && data.success) {
                    document.getElementById("first-name").value = data.firstName || '';
                    document.getElementById("last-name").value = data.lastName || '';
                    document.getElementById("user-phone").value = data.phone || '';
                    document.getElementById("email").value = data.email || '';
                } else {
                    console.log("Data fields are missing in the API response.");
                }
            }

            // Load profile data on page load
            loadUserProfile();
        });

        function getValues() {
            var total = $(".val").html();
            $(".showtotalonnp").html(total);
            $("#subtotal").val(total.replace("$", ""));
            var tax = $(".est-tax").html();
            $("#stax").val(tax.replace("$", ""));
            var serviceFee = $(".s-fee").html();
            $("#eservicetax").val(serviceFee.replace("$", ""));
        }
    </script>

    <script>
        function closetooltip() {
            document.querySelector(".tooltipcheckoutbody").style.visibility = "hidden";
        }
    </script>

    <script>
        function handleCheckoutClick() {
            const bearerToken = "<?php echo $_SESSION['bearer_token']; ?>";
            const uid = localStorage.getItem('uid');

            if (!uid || !bearerToken) {

                Swal.fire({
                    icon: 'warning',
                    title: 'Not Logged In',
                    text: 'Please log in to proceed to payment.',
                    confirmButtonText: 'OK'
                });
            } else {

                getValues();

                const paymentModal = new bootstrap.Modal(document.getElementById('paymentPopup'), {});
                paymentModal.show();
            }
        }

        function getValues() {
            var total = $(".val").html();
            $(".showtotalonnp").html(total);
            $("#subtotal").val(total.replace("$", ""));
            var tax = $(".est-tax").html();
            $("#stax").val(tax.replace("$", ""));
            var serviceFee = $(".s-fee").html();
            $("#eservicetax").val(serviceFee.replace("$", ""));
        }
    </script>

</body>

<div id="paymentPopup" class="modal fade" role="dialog">
    <div class="modal-dialog ">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-body" style="background-color: #f3f3f3;">
                <?php include("app-payment.php"); ?>
            </div>

        </div>

    </div>
</div>
<?php include 'footer.php'; ?>

</html>