<style>
    div:where(.swal2-container) h2:where(.swal2-title){
        font-size: 24px;
    }
    div:where(.swal2-container) .swal2-html-container { 
        font-size: 18px;
    }
</style>


<?php

$countryCodes = [
    "+1" => "United States/Canada",
    "+91" => "India"
];

?>



<!-- login Modal -->

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="loginModalLabel">Sign In</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2>Need an Account? <a href="#" data-bs-toggle="modal" data-bs-target="#signupModal" data-bs-dismiss="modal">Signup</a></h2>
                <form id="loginForm">
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email</label>
                        <input type="text" class="form-control loginemail" placeholder="Enter email">
                        <div id="emailError" class="error-message text-danger"></div>
                    </div>
                    <div class="mb-3">
                        <label for="pass" class="col-form-label">Password</label>
                        <input type="password" class="form-control loginpassword" placeholder="Enter password">
                        <div id="passwordError" class="error-message text-danger"></div>
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" class="check-remember login-rememberMe"><span>Remember me</span>
                    </div>
                    <div class="mb-3">
                        <button type="button" id="loginBtn" class="login-btn">Login</button>
                    </div>
                    <div class="forgot-pass">
                        <p><a href="change-password">Forgot Password?</a></p>
                    </div>
                    <!-- <div class="as-guest text-center">
                        <a href="#">Continue as a Guest</a>
                    </div> -->
                </form>
            </div>
        </div>
    </div>
</div>

<!-- sign-up Modal -->

<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="signupModalLabel">Sign Up</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2>Already have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">Log in</a></h2>
                <form id="signupForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstName" class="col-form-label">First Name</label>
                                <input type="text" name="firstName" class="form-control signup-firstName" placeholder="First Name">
                                <div id="firstNameError" class="error-message text-danger"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="lastName" class="col-form-label">Last Name</label>
                                <input type="text" name="lastName" class="form-control signup-lastName" placeholder="Last Name">
                                <div id="lastNameError" class="error-message text-danger"></div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="col-form-label">Address</label>
                            <input type="text" name="addr" class="form-control signupaddress" placeholder="Enter your address">
                            <div id="addressError" class="error-message text-danger"></div>
                        </div>

                        <div class="mb-3">
                            <label for="apartment" class="col-form-label">Apartment, Suite, Building (Optional)</label>
                            <input type="text" name="apartment" class="form-control signup-apartment" placeholder="Apartment, Suite, Building">
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone" class="col-form-label">Phone Number</label>
                                <div class="input-group">
                                    <select name="countryCode" class="form-select" id="countryCode">
                                        <?php foreach ($countryCodes as $code => $country): ?>
                                            <option value="<?php echo $code; ?>"><?php echo $code; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <input type="tel" name="phone" class="form-control signupphone" placeholder="Phone Number" minlength="10" maxlength="10" id="phone" pattern="\d*" inputmode="numeric">
                                </div>
                                <div id="phoneError" class="error-message text-danger"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="col-form-label">Email Address</label>
                                <input type="email" name="email" class="form-control signup-email" placeholder="Email Address">
                                <div id="emailError" class="error-message text-danger"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password" class="col-form-label">Password</label>
                                <input type="password" name="pass" class="form-control signup-password" placeholder="Enter Password">
                                <div id="passwordError" class="error-message text-danger"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="confirmPassword" class="col-form-label">Confirm Password</label>
                                <input type="password" name="confirmPassword" class="form-control signup-confirmPassword" placeholder="Confirm Password">
                                <div id="confirmPasswordError" class="error-message text-danger"></div>
                                <div id="passwordError" style="font-size: 14px;"></div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <!-- <button type="button" class="login-btn btn btn-primary" data-bs-toggle="modal" data-bs-target="#otpModal" id="sendOtpButton">Send Otp</button>     -->
                            <button type="button" class="login-btn btn btn-primary" id="sendOtpButton">Send Otp</button>
                            <button type="submit" class="login-btn btn btn-primary" id="registerButton" style="display: none;">Register</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="otpModal" tabindex="-1" aria-labelledby="otpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="otpModalLabel">OTP Verification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="head">
                    <p>We are sending you an OTP to verify your Phone Number <span>+1 ******789</span></p>
                </div>
                <div class="phone-edit">
                    <p>Edit phone number<a href="#" data-bs-toggle="modal" data-bs-target="#signupModal" data-bs-dismiss="modal"><img src="images/icon-edit.png" alt="" class="edit-pencil"></a></p>
                </div>
                <div class="otp-code">
                    Please enter your code here
                </div>
                <div class="code-box mb-3">
                    <div id="otpInputBoxes" class="d-flex otp-container">
                        <input type="tel" maxlength="1" class="form-control otp-input" inputmode="numeric">
                        <input type="tel" maxlength="1" class="form-control otp-input" inputmode="numeric">
                        <input type="tel" maxlength="1" class="form-control otp-input" inputmode="numeric">
                        <input type="tel" maxlength="1" class="form-control otp-input" inputmode="numeric">
                        <input type="tel" maxlength="1" class="form-control otp-input" inputmode="numeric">
                    </div>
                    <span id="otpError" class="text-danger"></span>
                </div>
                <div class="not-recieve">
                    <span class="no-rec"> Didn’t receive a code?</span><span class="re-send"><a href="#" id="resendCodeLink">Resend code</a></span>
                </div>
                <div class="otp-button-area">
                    <button type="button" class="otp-btn btn" id="submitOtpButton">Verify</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    const otpInputs = document.querySelectorAll('.otp-input');

    otpInputs.forEach((input, index) => {
        input.addEventListener('input', (event) => {
            const value = event.target.value;

            if (value.length === 1) {
                if (index < otpInputs.length - 1) {
                    otpInputs[index + 1].focus();
                }
            } else if (value.length === 0 && index > 0) {
                otpInputs[index - 1].focus();
            }
        });

        input.addEventListener('keydown', (event) => {
            const key = event.key;

            if (!/^\d$/.test(key) && key !== 'Backspace') {
                event.preventDefault();
            }

            if (key === 'Backspace' && index > 0 && input.value === '') {
                otpInputs[index - 1].focus();
                otpInputs[index - 1].value = '';
            }
        });
    });
</script>

<!-- <script>
    $(document).ready(function() {

        updateUI();

        $(".loginemail, .loginpassword").on("keypress", function(e) {
            if (e.which === 13) { 
                $("#loginBtn").click(); 
            }
        });

        $("#loginBtn").on("click", function() {

            $(".error-message").text(""); 

            var email = $(".loginemail").val().trim();
            var password = $(".loginpassword").val().trim();
            var isValid = true;

            if (email === "") {
                $("#emailError").text("Email is required.");
                isValid = false;
            }
            if (password === "") {
                $("#passwordError").text("Password is required.");
                isValid = false;
            }

            if (!isValid) {
                return;
            }

            if ($('.login-rememberMe').is(':checked')) {
                localStorage.setItem('email', email);
                localStorage.setItem('password', password);
            } else {
                localStorage.removeItem('email');
                localStorage.removeItem('password');
            }

            $.ajax({
                type: "POST",
                url: "login.php",
                data: {
                    email: email,
                    pass: password
                },
                success: function(response) {
                    var data = JSON.parse(response);

                    if (data.success) {

                        localStorage.setItem('firstName', data.firstName);
                        localStorage.setItem('lastName', data.lastName);
                        localStorage.setItem('uid', data.uid);

                        updateUI();

                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message,
                            timer: 1500,
                            showConfirmButton: false
                        });

                        setTimeout(function() {
                            location.reload(); 
                        }, 1500);
                    } else {

                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data.message
                        });
                    }
                },
                error: function(xhr, status, error) {

                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred: ' + error
                    });
                }
            });
        });

        if (localStorage.getItem('email') && localStorage.getItem('password')) {
            $('.loginemail').val(localStorage.getItem('email'));
            $('.loginpassword').val(localStorage.getItem('password'));
            $('#rememberMe').prop('checked', true);
        }

        function updateUI() {
            var firstName = localStorage.getItem('firstName');
            if (firstName) {
                $('.dropdown').show();
                $('.btn_signup').hide();
                $('.dropdown-toggle').text(firstName);
            } else {
                $('.dropdown').hide();
                $('.btn_signup').show();
            }
        }

        $(document).on('click', '#logoutBtn', function() {
            localStorage.removeItem('firstName');
            localStorage.removeItem('lastName');
            localStorage.removeItem('uid');
            updateUI();

            Swal.fire({
                icon: 'success',
                title: 'Logged Out',
                text: 'You have successfully logged out.',
                timer: 1500,
                showConfirmButton: false
            });
        });

    });
</script> -->

<script>
    $(document).ready(function() {

        updateUI();

        $(".loginemail, .loginpassword").on("keypress", function(e) {
            if (e.which === 13) { 
                $("#loginBtn").click(); 
            }
        });

        $("#loginBtn").on("click", function() {

            $(".error-message").text(""); 

            var email = $(".loginemail").val().trim();
            var password = $(".loginpassword").val().trim();
            var isValid = true;

            if (email === "") {
                $("#emailError").text("Email is required.");
                isValid = false;
            }
            if (password === "") {
                $("#passwordError").text("Password is required.");
                isValid = false;
            }

            if (!isValid) {
                return;
            }

            if ($('.login-rememberMe').is(':checked')) {
                // Remember user credentials with cookies if needed (optional)
                // Cookies can't be as secure as sessions for sensitive data
                document.cookie = "email=" + email + "; path=/; max-age=" + (60 * 60 * 24 * 30); // 30 days
                document.cookie = "password=" + password + "; path=/; max-age=" + (60 * 60 * 24 * 30);
            } else {
                // Remove cookies if not remembered
                document.cookie = "email=; path=/; max-age=0";
                document.cookie = "password=; path=/; max-age=0";
            }

            $.ajax({
                type: "POST",
                url: "login.php",
                data: {
                    email: email,
                    pass: password
                },
                success: function(response) {
                    var data = JSON.parse(response);

                    if (data.success) {
                        
                        $.ajax({
                            type: "POST",
                            url: "set_session.php", 
                            data: {
                                firstName: data.firstName,
                                lastName: data.lastName,
                                uid: data.uid
                            },
                            success: function() {
                                updateUI();

                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: data.message,
                                    timer: 1500,
                                    showConfirmButton: false
                                });

                                setTimeout(function() {
                                    location.reload(); 
                                }, 1500);
                            }
                        });
                    } else {

                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data.message
                        });
                    }
                },
                error: function(xhr, status, error) {

                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred: ' + error
                    });
                }
            });
        });

        $.ajax({
            type: "GET",
            url: "check_session.php", 
            success: function(response) {
                var data = JSON.parse(response);
                if (data.firstName) {
                    $('.loginemail').val(data.email); 
                    $('.dropdown').show();
                    $('.btn_signup').hide();
                    $('.dropdown-toggle').text(data.firstName);
                } else {
                    $('.dropdown').hide();
                    $('.btn_signup').show();
                }
            }
        });

        function updateUI() {
            $.ajax({
                type: "GET",
                url: "check_session.php", 
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data.firstName) {
                        $('.dropdown').show();
                        $('.btn_signup').hide();
                        $('.dropdown-toggle').text(data.firstName);
                    } else {
                        $('.dropdown').hide();
                        $('.btn_signup').show();
                    }
                }
            });
        }

        $(document).on('click', '#logoutBtn', function() {
            
            $.ajax({
                type: "POST",
                url: "logout.php",  
                success: function() {
                    updateUI();

                    Swal.fire({
                        icon: 'success',
                        title: 'Logged Out',
                        text: 'You have successfully logged out.',
                        timer: 1500,
                        showConfirmButton: false
                    });
                }
            });
        });

    });
</script>


<!-- <script>
    $(document).ready(function() {

        $("#sendOtpButton").on("click", function(event) {
            event.preventDefault();

            var firstName = $(".signup-firstName").val()?.trim() || "";
            var lastName = $(".signup-lastName").val()?.trim() || "";
            var addr = $(".signupaddress").val()?.trim() || "";
            var countryCode = $("#countryCode").val();
            var phone = $(".signupphone").val()?.trim() || "";
            var email = $(".signup-email").val()?.trim() || "";

            if (!firstName || !lastName || !phone || !email) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Please fill in all required fields.'
                });
                return;
            }

            // Format the phone number to match the pattern (+1 ******789)
            var formattedPhone = '+' + countryCode.replace('+', '') + ' ' + '******' + phone.slice(-3);

            $('#otpModal .head span').text(formattedPhone);

            sessionStorage.setItem("signupData", JSON.stringify({
                firstName: firstName,
                lastName: lastName,
                addr: addr,
                phone: phone,
                email: email
            }));

            $.ajax({
                type: "GET",
                url: "getToken.php",
                dataType: "json",
                success: function(tokenResponse) {
                    if (!tokenResponse.success) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: tokenResponse.message
                        });
                        return;
                    }

                    $.ajax({
                        type: "POST",
                        url: "https://devrestapi.goquicklly.com/common/send-otp",
                        headers: {
                            "Authorization": "Bearer " + tokenResponse.bearer_token
                        },
                        data: JSON.stringify({
                            countryCode: countryCode,
                            mobile: phone,
                            email: email,
                            firstName: firstName,
                            lastName: lastName
                        }),
                        contentType: "application/json",
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'OTP Sent',
                                text: 'Please check your phone for the OTP.'
                            }).then(() => {

                                $('#otpModal').modal('show');
                                $('#signupModal').modal('hide');
                            });

                            sessionStorage.setItem("otpTag", response.tag);
                            sessionStorage.setItem("bearerToken", tokenResponse.bearer_token);
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Failed to send OTP. Please try again.'
                            });
                        }
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Failed to retrieve bearer token from session.'
                    });
                }
            });
        });

        $("#resendCodeLink").on("click", function(event) {
            event.preventDefault();

            var signupData = JSON.parse(sessionStorage.getItem("signupData"));
            var countryCode = $("#countryCode").val();
            var phone = signupData.phone;
            var email = signupData.email;
            var firstName = signupData.firstName;
            var lastName = signupData.lastName;

            var formattedPhone = '+' + countryCode.replace('+', '') + ' ' + '******' + phone.slice(-3);

            $('#otpModal .head span').text(formattedPhone);

            $.ajax({
                type: "POST",
                url: "https://devrestapi.goquicklly.com/common/send-otp",
                headers: {
                    "Authorization": "Bearer " + sessionStorage.getItem("bearerToken")
                },
                data: JSON.stringify({
                    countryCode: countryCode,
                    mobile: phone,
                    email: email,
                    firstName: firstName,
                    lastName: lastName
                }),
                contentType: "application/json",
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'OTP Sent Again',
                        text: 'Please check your phone for the OTP.'
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Failed to resend OTP. Please try again.'
                    });
                }
            });
        });

        $("#submitOtpButton").on("click", function(event) {
            event.preventDefault();

            var otp = Array.from(document.querySelectorAll('.otp-input'))
                .map(input => input.value.trim())
                .join("");

            var signupData = JSON.parse(sessionStorage.getItem("signupData"));
            var otpTag = sessionStorage.getItem("otpTag");
            var bearerToken = sessionStorage.getItem("bearerToken");

            if (!otp || otp.length < 5) {
                $("#otpError").text("Complete OTP is required.");
                return;
            }

            $.ajax({
                type: "POST",
                url: "https://devrestapi.goquicklly.com/common/verify-otp",
                headers: {
                    "Authorization": "Bearer " + bearerToken
                },
                data: JSON.stringify({
                    mobile: signupData.phone,
                    email: signupData.email,
                    otp: otp,
                    tag: otpTag
                }),
                contentType: "application/json",
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'OTP Verified',
                            text: 'OTP verification successful. You can now proceed to register.'
                        }).then(() => {
                            $("#sendOtpButton").hide();
                            $("#registerButton").show();
                            $('#otpModal').modal('hide');
                            $('#signupModal').modal('show');
                        });
                        sessionStorage.setItem("isOtpVerified", "true");
                    } else {
                        $("#otpError").text("Invalid OTP. Please try again.");
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Failed to verify OTP. Please try again.'
                    });
                }
            });
        });

        $("#registerButton").on("click", function(event) {
            event.preventDefault();

            if (sessionStorage.getItem("isOtpVerified") !== "true") {
                Swal.fire({
                    icon: 'error',
                    title: 'OTP Required',
                    text: 'Please complete OTP verification before registering.'
                });
                return;
            }

            var firstName = $(".signup-firstName").val()?.trim() || "";
            var lastName = $(".signup-lastName").val()?.trim() || "";
            var addr = $(".signupaddress").val()?.trim() || "";
            var apartment = $(".signup-apartment").val()?.trim() || "";
            var phone = $(".signupphone").val()?.trim() || "";
            var email = $(".signup-email").val()?.trim() || "";
            var pass = $(".signup-password").val()?.trim() || "";
            var confirmPassword = $(".signup-confirmPassword").val()?.trim() || "";

            var formData = {
                firstName: firstName,
                lastName: lastName,
                addr: addr,
                apartment: apartment,
                phone: phone,
                email: email,
                pass: pass,
                confirmPassword: confirmPassword,
                callFrom: "WEB",
                apiKey: "UEjYnQ9yN7D3NCHEoGBMDq8lDUpKio"
            };

            $.ajax({
                type: "POST",
                url: "signup.php",
                data: JSON.stringify(formData),
                contentType: "application/json",
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Registration Successful',
                            text: data.message
                        }).then(() => {
                            // window.location.href = 'index';
                            $('#signupModal').modal('hide');
                            $('#loginModal').modal('show');
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data.message
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred: ' + error
                    });
                }
            });
        });
    });
</script> -->

<script>
    $(document).ready(function() {

        $("#sendOtpButton").on("click", function(event) {
            event.preventDefault();

            var firstName = $(".signup-firstName").val()?.trim() || "";
            var lastName = $(".signup-lastName").val()?.trim() || "";
            var addr = $(".signupaddress").val()?.trim() || "";
            var countryCode = $("#countryCode").val();
            var phone = $(".signupphone").val()?.trim() || "";
            var email = $(".signup-email").val()?.trim() || "";

            if (!firstName || !lastName || !phone || !email) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Please fill in all required fields.'
                });
                return;
            }

            var formattedPhone = '+' + countryCode.replace('+', '') + ' ' + '******' + phone.slice(-3);
            $('#otpModal .head span').text(formattedPhone);

            $.ajax({
                type: "POST",
                url: "https://devrestapi.goquicklly.com/user/check-email-phone",
                contentType: "application/json",
                data: JSON.stringify({
                    phone: phone,
                    email: email
                }),
                success: function(response) {

                    if (response.dupPhone && response.dupEmail) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Duplicate Records Found',
                            text: 'The phone number and email are already in use. Please use a different one.'
                        });
                        return;
                    }

                    if (response.dupPhone) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Phone Already Exists',
                            text: 'This phone number is already in use. Please use a different phone number.'
                        });
                        return;
                    }

                    if (response.dupEmail) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Email Already Exists',
                            text: 'This email address is already in use. Please use a different email address.'
                        });
                        return;
                    }

                    $.ajax({
                        type: "GET",
                        url: "getToken.php",
                        dataType: "json",
                        success: function(tokenResponse) {
                            if (!tokenResponse.success) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: tokenResponse.message
                                });
                                return;
                            }

                            $.ajax({
                                type: "POST",
                                url: "https://devrestapi.goquicklly.com/common/send-otp",
                                headers: {
                                    "Authorization": "Bearer " + tokenResponse.bearer_token
                                },
                                data: JSON.stringify({
                                    countryCode: countryCode,
                                    mobile: phone,
                                    email: email,
                                    firstName: firstName,
                                    lastName: lastName
                                }),
                                contentType: "application/json",
                                success: function(response) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'OTP Sent',
                                        text: 'Please check your phone for the OTP.'
                                    }).then(() => {
                                        $('#otpModal').modal('show');
                                        $('#signupModal').modal('hide');
                                    });

                                    sessionStorage.setItem("otpTag", response.tag);
                                    sessionStorage.setItem("bearerToken", tokenResponse.bearer_token);
                                    sessionStorage.setItem("phone", phone);
                                    sessionStorage.setItem("email", email);
                                    sessionStorage.setItem("firstName", firstName);
                                    sessionStorage.setItem("lastName", lastName);
                                },
                                error: function(xhr, status, error) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: 'Failed to send OTP. Please try again.'
                                    });
                                }
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Failed to retrieve bearer token from session.'
                            });
                        }
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Failed to check email and phone for duplication.'
                    });
                }
            });
        });

        $("#resendCodeLink").on("click", function(event) {
            event.preventDefault();

            var phone = sessionStorage.getItem("phone");
            var email = sessionStorage.getItem("email");
            var firstName = sessionStorage.getItem("firstName");
            var lastName = sessionStorage.getItem("lastName");
            var countryCode = $("#countryCode").val();

            if (!phone || !email || !firstName || !lastName) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Session data is missing. Please sign up again.'
                });
                return;
            }

            var formattedPhone = '+' + countryCode.replace('+', '') + ' ' + '******' + phone.slice(-3);
            $('#otpModal .head span').text(formattedPhone);

            $.ajax({
                type: "POST",
                url: "https://devrestapi.goquicklly.com/common/send-otp",
                headers: {
                    "Authorization": "Bearer " + sessionStorage.getItem("bearerToken")
                },
                data: JSON.stringify({
                    countryCode: countryCode,
                    mobile: phone,
                    email: email,
                    firstName: firstName,
                    lastName: lastName
                }),
                contentType: "application/json",
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'OTP Sent Again',
                        text: 'Please check your phone for the OTP.'
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Failed to resend OTP. Please try again.'
                    });
                }
            });
        });

        $("#submitOtpButton").on("click", function(event) {
            event.preventDefault();

            var otp = Array.from(document.querySelectorAll('.otp-input'))
                .map(input => input.value.trim())
                .join("");

            var otpTag = sessionStorage.getItem("otpTag");
            var bearerToken = sessionStorage.getItem("bearerToken");

            if (!otp || otp.length < 5) {
                $("#otpError").text("Complete OTP is required.");
                return;
            }

            $.ajax({
                type: "POST",
                url: "https://devrestapi.goquicklly.com/common/verify-otp",
                headers: {
                    "Authorization": "Bearer " + bearerToken
                },
                data: JSON.stringify({
                    mobile: sessionStorage.getItem("phone"),
                    email: sessionStorage.getItem("email"),
                    otp: otp,
                    tag: otpTag
                }),
                contentType: "application/json",
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'OTP Verified',
                            text: 'OTP verification successful. You can now proceed to register.'
                        }).then(() => {
                            $("#sendOtpButton").hide();
                            $("#registerButton").show();
                            $('#otpModal').modal('hide');
                            $('#signupModal').modal('show');
                        });
                        sessionStorage.setItem("isOtpVerified", "true");
                    } else {
                        $("#otpError").text("Invalid OTP. Please try again.");
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Failed to verify OTP. Please try again.'
                    });
                }
            });
        });

        $("#registerButton").on("click", function(event) {
            event.preventDefault();

            if (sessionStorage.getItem("isOtpVerified") !== "true") {
                Swal.fire({
                    icon: 'error',
                    title: 'OTP Required',
                    text: 'Please complete OTP verification before registering.'
                });
                return;
            }

            var formData = {
                firstName: $(".signup-firstName").val()?.trim() || "",
                lastName: $(".signup-lastName").val()?.trim() || "",
                addr: $(".signupaddress").val()?.trim() || "",
                apartment: $(".signup-apartment").val()?.trim() || "",
                phone: $(".signupphone").val()?.trim() || "",
                email: $(".signup-email").val()?.trim() || "",
                pass: $(".signup-password").val()?.trim() || "",
                confirmPassword: $(".signup-confirmPassword").val()?.trim() || "",
                callFrom: "WEB",
                apiKey: "UEjYnQ9yN7D3NCHEoGBMDq8lDUpKio"
            };

            $.ajax({
                type: "POST",
                url: "signup.php",
                data: JSON.stringify(formData),
                contentType: "application/json",
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Registration Successful',
                            text: data.message
                        }).then(() => {
                            $('#signupModal').modal('hide');
                            $('#loginModal').modal('show');
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data.message
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred: ' + error
                    });
                }
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const modals = document.querySelectorAll('.modal');

        modals.forEach(modal => {

            modal.addEventListener('shown.bs.modal', function() {
                document.body.classList.add('modal-open');
                modal.style.overflowY = 'auto';
            });

            modal.addEventListener('hidden.bs.modal', function() {
                modal.style.overflowY = ''; // Reset overflow
                if (!document.querySelector('.modal.show')) {
                    document.body.classList.remove('modal-open');
                }
            });
        });

        const modalTriggers = document.querySelectorAll('[data-bs-toggle="modal"]');
        modalTriggers.forEach(trigger => {
            trigger.addEventListener('click', function() {
                const targetModalID = this.getAttribute('data-bs-target');
                const currentModal = document.querySelector('.modal.show');

                if (currentModal) {

                    currentModal.addEventListener('hidden.bs.modal', function() {
                        const targetModal = document.querySelector(targetModalID);
                        const modalInstance = bootstrap.Modal.getOrCreateInstance(targetModal);
                        modalInstance.show();
                    }, {
                        once: true
                    });

                    bootstrap.Modal.getInstance(currentModal).hide();
                }
            });
        });
    });
</script>

<script>
    document.querySelector('.signupphone').addEventListener('input', function(e) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
</script>