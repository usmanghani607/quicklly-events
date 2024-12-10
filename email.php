<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.png">
</head>

<body>

    <!-- <div class="mail-temp">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mail-border">
                        <div class="head">
                            <img class="logo-img" src="images/logo.png" alt="">
                        </div>
                        <div class="mail-body">
                            <div class="booking-name">
                                <h2>Your booking is confirmed</h2>
                                <h4>Order ID 178181</h4>
                            </div>
                            <div class="ticket-body">
                                <img class="consert-img" src="images/mail-p.png" alt="">
                                <div class="consert-detail">
                                    <h3>Music Night Test</h3>
                                    <h5>26 Aug 2024 - 30 Sep 2024</h5>
                                    <h5>1140 North Wells Street, Chicago, IL, USA</h5>
                                </div>
                                <div class="ticket-border"></div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Name</p>
                                        <p class="t-number">Mandeep Singh</p>
                                    </div>
                                </div>
                                <div class="ticket-border"></div>
                                <div class="ticket-text">
                                    To view ticket and check your booking details, visit the Quicklly App.
                                </div>
                                <div class="ticket-download">
                                    Haven’t downloaded the Quicklly App yet? Scan the QR code below to get started!
                                </div>
                                <div class="route">
                                    <p>Quicklly App > Login > Profile > Event Dashboard > List of all the ticket is visible</p>
                                </div>
                                <div class="qr text-center">
                                    <img id="modal-event-qr" class="qr-img" src="https://www.dev.goquicklly.com/upload_images/events/qrcode/oid176181,pid615039,eventid54,userid48606.png" alt="">
                                </div>
                                <div class="social-link">
                                    <a href="#"><img class="me-2" src="images/google.png" alt=""></a>
                                    <a href="#"><img src="images/ios.png" alt=""></a>
                                </div>
                                <div class="ticket-border"></div>
                                <div class="bill-d">
                                    Billing Details
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="desc">
                                            <p>Subtotal</p>
                                            <p>Taxes & Other Fees</p>
                                            <p>Total Amount</p>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="rate">
                                            <p>$0.00</p>
                                            <p>$0.00</p>
                                            <p>$0.00</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="mail-temp">
        <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 480px; margin: 0 auto; font-family: 'Poppins', sans-serif; border: 1px solid #ddd;">
            <tr>
                <td class="mail-border">
                    <table class="head" width="100%" cellpadding="0" cellspacing="0" style="text-align: center; box-shadow: rgba(0, 0, 0, 0.16) 0px 0px 4px; opacity: 1; margin-bottom: 2px; padding: 6px 10px; background: 0% 0% no-repeat padding-box padding-box rgb(255, 255, 255);">
                        <tr>
                            <td align="center" style="padding: 6px 10px;">
                                <img class="logo-img" src="images/logo.png" alt="" style="height:50px; padding:7px;">
                            </td>
                        </tr>
                    </table>
                    <table class="mail-body" width="100%" cellpadding="0" cellspacing="0" style="padding: 20px;">
                        <tr style="padding: 20px; text-align: center;">
                            <td style="padding: 0 10px 20px 10px;">
                                <h2 style="font-size: 20px; font-weight: 600;">Your booking is confirmed</h2>
                                <h4 style="font-size: 18px; font-weight: 500;">Order ID 178181</h4>
                            </td>
                        </tr>

                        <tr>
                            <td class="aa" style="padding: 0 30px 10px 30px; margin: 10px 0;">
                                <table width="100%" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td style="padding: 10px 10px 0 10px; border: 1px solid #E4E4E4; border-bottom: 0;">
                                            <img class="consert-img" src="images/mail-p.png" alt="" style="width: 100%; max-width: 400px; display: block;">
                                            <div class="consert-detail">
                                                <h3 style="font-size: 18px; font-weight: 600;">Music Night Test</h3>
                                                <h5 style="font-size: 14px; font-weight: 400; color: #333333;">26 Aug 2024 - 30 Sep 2024</h5>
                                                <h5 style="font-size: 14px; font-weight: 400; color: #333333;">1140 North Wells Street, Chicago, IL, USA</h5>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0 10px 10px 10px; border: 1px solid #E4E4E4; border-bottom: 0; border-top: 0;">
                                            <table width="100%" cellpadding="0" cellspacing="0" style="border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; padding-top: 20px;">
                                                <tr>
                                                    <td>
                                                        <p style="font-size: 14px; font-weight: 400; margin-top:10px; margin-bottom:0;">Name</p>
                                                        <p style="font-size: 16px; font-weight: 500; margin-bottom:10px;">Mandeep Singh</p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0 10px 0 10px; border: 1px solid #E4E4E4; border-bottom: 0; border-top: 0;">
                                            <div class="ticket-text" style="font-size: 14px; font-weight: 500; text-align: center; color: #333333; padding: 10px 10px 20px 10px;">
                                                To view your ticket and check your booking details, visit the Quicklly App.
                                            </div>
                                            <div class="ticket-download" style="font-size: 16px; font-weight: 600; text-align: center; color: #333333; padding: 10px;">
                                                Haven’t downloaded the Quicklly App yet? Scan the QR code below to get started!
                                            </div>
                                            <div class="route" style="font-size: 12px; font-weight: 400; text-align: center; color: #333333; padding: 10px 15px 10px 15px;">
                                                <p style="margin-bottom: 0;">Quicklly App > Login > Profile > Event Dashboard > List of all the tickets is visible</p>
                                            </div>
                                            <div class="qr text-center">
                                                <img id="modal-event-qr" class="qr-img" src="https://www.dev.goquicklly.com/upload_images/events/qrcode/oid176181,pid615039,eventid54,userid48606.png" alt="" style="max-width: 200px; border: 2px solid #E4E4E4; border-radius: 8px;">
                                            </div>
                                            <div class="social-link" style="text-align: center; padding: 20px 0 10px 0;">
                                                <a href="#"><img class="me-2" src="images/google.png" alt=""></a>
                                                <a href="#"><img src="images/ios.png" alt=""></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 10px; border: 1px solid #E4E4E4; border-top: 0;">
                                            <table width="100%" cellpadding="0" cellspacing="0" style="border-top: 1px solid #ddd; padding-top: 20px;">
                                                <tr>
                                                    <td>
                                                        <h4 style="font-size: 16px; font-weight: 500; margin-top:10px; margin-bottom:5px;">Billing Details</h4>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table width="100%" cellpadding="0" cellspacing="0">
                                                            <tr>
                                                                <td width="70%" style="font-size: 16px; font-weight: 500;">
                                                                    <p style="margin-bottom:0;">Subtotal</p>
                                                                    <p style="margin-bottom:0;">Taxes & Other Fees</p>
                                                                    <p style="margin-bottom:0;">Total Amount</p>
                                                                </td>
                                                                <td width="30%" style="font-size: 16px; font-weight: 500; text-align: right;">
                                                                    <p style="margin-bottom:0;">$0.00</p>
                                                                    <p style="margin-bottom:0;">$0.00</p>
                                                                    <p style="margin-bottom:0;">$0.00</p>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>


</body>

</html>