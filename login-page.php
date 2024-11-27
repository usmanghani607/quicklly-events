<?php

$countryCodes = [
    "+1" => "United States/Canada",
    "+91" => "India"
    // "+7" => "Russia",
    // "+20" => "Egypt",
    // "+27" => "South Africa",
    // "+30" => "Greece",
    // "+31" => "Netherlands",
    // "+32" => "Belgium",
    // "+33" => "France",
    // "+34" => "Spain",
    // "+36" => "Hungary",
    // "+39" => "Italy",
    // "+40" => "Romania",
    // "+41" => "Switzerland",
    // "+43" => "Austria",
    // "+44" => "United Kingdom",
    // "+45" => "Denmark",
    // "+46" => "Sweden",
    // "+47" => "Norway",
    // "+48" => "Poland",
    // "+49" => "Germany",
    // "+51" => "Peru",
    // "+52" => "Mexico",
    // "+53" => "Cuba",
    // "+54" => "Argentina",
    // "+55" => "Brazil",
    // "+56" => "Chile",
    // "+57" => "Colombia",
    // "+58" => "Venezuela",
    // "+60" => "Malaysia",
    // "+61" => "Australia",
    // "+62" => "Indonesia",
    // "+63" => "Philippines",
    // "+64" => "New Zealand",
    // "+65" => "Singapore",
    // "+66" => "Thailand",
    // "+81" => "Japan",
    // "+82" => "South Korea",
    // "+84" => "Vietnam",
    // "+86" => "China",
    // "+90" => "Turkey",
    // "+91" => "India",
    // "+92" => "Pakistan",
    // "+93" => "Afghanistan",
    // "+94" => "Sri Lanka",
    // "+95" => "Myanmar",
    // "+98" => "Iran",
    // "+211" => "South Sudan",
    // "+212" => "Morocco",
    // "+213" => "Algeria",
    // "+216" => "Tunisia",
    // "+218" => "Libya",
    // "+220" => "Gambia",
    // "+221" => "Senegal",
    // "+222" => "Mauritania",
    // "+223" => "Mali",
    // "+224" => "Guinea",
    // "+225" => "Ivory Coast",
    // "+226" => "Burkina Faso",
    // "+227" => "Niger",
    // "+228" => "Togo",
    // "+229" => "Benin",
    // "+230" => "Mauritius",
    // "+231" => "Liberia",
    // "+232" => "Sierra Leone",
    // "+233" => "Ghana",
    // "+234" => "Nigeria",
    // "+235" => "Chad",
    // "+236" => "Central African Republic",
    // "+237" => "Cameroon",
    // "+238" => "Cape Verde",
    // "+239" => "Sao Tome and Principe",
    // "+240" => "Equatorial Guinea",
    // "+241" => "Gabon",
    // "+242" => "Congo",
    // "+243" => "Democratic Republic of the Congo",
    // "+244" => "Angola",
    // "+245" => "Guinea-Bissau",
    // "+246" => "British Indian Ocean Territory",
    // "+248" => "Seychelles",
    // "+249" => "Sudan",
    // "+250" => "Rwanda",
    // "+251" => "Ethiopia",
    // "+252" => "Somalia",
    // "+253" => "Djibouti",
    // "+254" => "Kenya",
    // "+255" => "Tanzania",
    // "+256" => "Uganda",
    // "+257" => "Burundi",
    // "+258" => "Mozambique",
    // "+260" => "Zambia",
    // "+261" => "Madagascar",
    // "+262" => "Reunion",
    // "+263" => "Zimbabwe",
    // "+264" => "Namibia",
    // "+265" => "Malawi",
    // "+266" => "Lesotho",
    // "+267" => "Botswana",
    // "+268" => "Eswatini",
    // "+269" => "Comoros",
    // "+291" => "Eritrea",
    // "+297" => "Aruba",
    // "+298" => "Faroe Islands",
    // "+299" => "Greenland",
    // "+350" => "Gibraltar",
    // "+351" => "Portugal",
    // "+352" => "Luxembourg",
    // "+353" => "Ireland",
    // "+354" => "Iceland",
    // "+355" => "Albania",
    // "+356" => "Malta",
    // "+357" => "Cyprus",
    // "+358" => "Finland",
    // "+359" => "Bulgaria",
    // "+370" => "Lithuania",
    // "+371" => "Latvia",
    // "+372" => "Estonia",
    // "+373" => "Moldova",
    // "+374" => "Armenia",
    // "+375" => "Belarus",
    // "+376" => "Andorra",
    // "+377" => "Monaco",
    // "+378" => "San Marino",
    // "+380" => "Ukraine",
    // "+381" => "Serbia",
    // "+382" => "Montenegro",
    // "+383" => "Kosovo",
    // "+385" => "Croatia",
    // "+386" => "Slovenia",
    // "+387" => "Bosnia and Herzegovina",
    // "+389" => "North Macedonia",
    // "+420" => "Czech Republic",
    // "+421" => "Slovakia",
    // "+423" => "Liechtenstein",
    // "+500" => "Falkland Islands",
    // "+501" => "Belize",
    // "+502" => "Guatemala",
    // "+503" => "El Salvador",
    // "+504" => "Honduras",
    // "+505" => "Nicaragua",
    // "+506" => "Costa Rica",
    // "+507" => "Panama",
    // "+508" => "Saint Pierre and Miquelon",
    // "+509" => "Haiti",
    // "+590" => "Guadeloupe",
    // "+591" => "Bolivia",
    // "+592" => "Guyana",
    // "+593" => "Ecuador",
    // "+594" => "French Guiana",
    // "+595" => "Paraguay",
    // "+596" => "Martinique",
    // "+597" => "Suriname",
    // "+598" => "Uruguay",
    // "+670" => "East Timor",
    // "+672" => "Antarctica",
    // "+673" => "Brunei",
    // "+674" => "Nauru",
    // "+675" => "Papua New Guinea",
    // "+676" => "Tonga",
    // "+677" => "Solomon Islands",
    // "+678" => "Vanuatu",
    // "+679" => "Fiji",
    // "+680" => "Palau",
    // "+681" => "Wallis and Futuna",
    // "+682" => "Cook Islands",
    // "+683" => "Niue",
    // "+685" => "Samoa",
    // "+686" => "Kiribati",
    // "+687" => "New Caledonia",
    // "+688" => "Tuvalu",
    // "+689" => "French Polynesia",
    // "+690" => "Tokelau",
    // "+691" => "Micronesia",
    // "+692" => "Marshall Islands",
    // "+850" => "North Korea",
    // "+852" => "Hong Kong",
    // "+853" => "Macau",
    // "+855" => "Cambodia",
    // "+856" => "Laos",
    // "+880" => "Bangladesh",
    // "+886" => "Taiwan",
    // "+960" => "Maldives",
    // "+961" => "Lebanon",
    // "+962" => "Jordan",
    // "+963" => "Syria",
    // "+964" => "Iraq",
    // "+965" => "Kuwait",
    // "+966" => "Saudi Arabia",
    // "+967" => "Yemen",
    // "+968" => "Oman",
    // "+970" => "Palestine",
    // "+971" => "United Arab Emirates",
    // "+972" => "Israel",
    // "+973" => "Bahrain",
    // "+974" => "Qatar",
    // "+975" => "Bhutan",
    // "+976" => "Mongolia",
    // "+977" => "Nepal",
    // "+992" => "Tajikistan",
    // "+993" => "Turkmenistan",
    // "+994" => "Azerbaijan",
    // "+995" => "Georgia",
    // "+996" => "Kyrgyzstan",
    // "+998" => "Uzbekistan"
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

<!-- <script>
    const otpInputs = document.querySelectorAll('.otp-input');

    otpInputs.forEach((input, index) => {
        input.addEventListener('input', (event) => {
            if (event.target.value.length === 1) {
                if (index < otpInputs.length - 1) {
                    otpInputs[index + 1].focus();
                }
            } else if (event.target.value.length === 0 && index > 0) {
                otpInputs[index - 1].focus();
            }
        });

        input.addEventListener('keydown', (event) => {
            if (!/[0-9]/.test(event.key) && event.key !== 'Backspace') {
                event.preventDefault();
            }
        });
    });
</script> -->

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
                            // window.location.href = 'index';
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
</script>

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