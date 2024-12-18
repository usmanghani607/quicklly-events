<?php

ini_set('session.gc_maxlifetime', 3600 * 24 * 365); 

session_set_cookie_params([
    'lifetime' => 3600 * 24 * 365, 
    'path' => '/',
    'secure' => true, 
    'httponly' => true,
    'samesite' => 'Strict',
]);

// session_start();

// print_r($_SESSION);

?>
<!DOCTYPE html>
<html>

<head>
    <?php include 'header-checkout.php'; ?>
    <link rel="shortcut icon" href="images/favicon.png">
</head>

<body style="background: #F8F8F8;">

    <div class="dashboard account-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-4 col-md-2">
                    <div class="side-bar">
                        <button onclick="window.location.href='booking';"><img src="images/tickets.png" alt=""><span>My Bookings</span></button>
                        <button onclick="window.location.href='account';"><img src="images/profile-bg.png" alt=""><span>Account Summary</span></button>
                        <button onclick="window.location.href='change-password';"><img src="images/key.png" alt=""><span>Change Password</span></button>
                    </div>
                </div>
                <div class="col-12 col-sm-8 col-md-10">
                    <div class="account">
                        <div class="heading">
                            <h2>Account Summary</h2>
                        </div>

                        <div class="account-area">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="heading">
                                        <h3>Personal Information</h3>
                                    </div>
                                    <form action="update_profile.php" method="POST">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="form-label">First Name</label>
                                                <input type="text" class="form-control firstNameField" name="firstName">
                                                <div id="firstNameError" class="error-message text-danger"></div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="form-label">Last Name</label>
                                                <input type="text" class="form-control lastNameField" name="lastName">
                                                <div id="lastNameError" class="error-message text-danger"></div>
                                            </div>
                                        </div>

                                        <div class="heading mt-2">
                                            <h3>Contact Information</h3>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="form-label">Email Address</label>
                                                <input type="email" class="form-control mail emailField profileemail" name="email">
                                                <div class="error-message text-danger emailError"></div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="form-label">Mobile Number</label>
                                                <input type="text" class="form-control phoneField" name="phone" minlength="10" maxlength="10" pattern="\d*" inputmode="numeric">
                                                <div id="phoneError" class="error-message text-danger"></div>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="button-area">
                                        <button class="view" id="updateProfileBtn">Update Profile</button>
                                        <button type="button" class="cancel">Cancel</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <script>
        $(document).ready(function() {
            $("#updateProfileBtn").on("click", function(e) {
                e.preventDefault();

                $(".error-message").text("");

                var uid = localStorage.getItem("uid");
                if (!uid) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'User ID not found!'
                    });
                    return;
                }

                var firstName = $(".firstNameField").val().trim();
                var lastName = $(".lastNameField").val().trim();
                var email = $(".profileemail").val().trim();
                var phone = $(".phoneField").val().trim();

                var isValid = true;

                if (firstName === "") {
                    $("#firstNameError").text("First Name is required.");
                    isValid = false;
                }
                if (lastName === "") {
                    $("#lastNameError").text("Last Name is required.");
                    isValid = false;
                }
                if (email === "") {
                    $(".profileemail").text("Email is required.");
                    isValid = false;
                }
                if (phone === "") {
                    $("#phoneError").text("Mobile Number is required.");
                    isValid = false;
                }

                if (!isValid) {
                    return;
                }

                var profileData = {
                    uid: uid,
                    firstName: firstName,
                    lastName: lastName,
                    email: email,
                    phone: phone
                };

                $.ajax({
                    type: "POST",
                    url: "update_profile.php",
                    data: profileData,
                    success: function(response) {
                        var data = JSON.parse(response);

                        if (data.success) {

                            localStorage.setItem("firstName", firstName);
                            
                            Swal.fire({
                                icon: 'success',
                                title: 'Profile Updated',
                                text: 'Your profile was updated successfully!',
                                timer: 2000,
                                showConfirmButton: false
                            });

                            setTimeout(function() {
                                window.location.href = "";
                            }, 2000);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Update Failed',
                                text: 'Profile update failed: ' + data.message
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
        $(document).ready(function () {
            $("#updateProfileBtn").on("click", function (e) {
                e.preventDefault();

                $(".error-message").text(""); // Clear previous error messages

                // Get the UID from the session (provided by PHP)
                const uid = "<?php echo isset($_SESSION['value_user_id']) ? $_SESSION['value_user_id'] : ''; ?>";

                if (!uid) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'User ID not found in session!'
                    });
                    return;
                }

                // Get input field values
                const firstName = $(".firstNameField").val().trim();
                const lastName = $(".lastNameField").val().trim();
                const email = $(".profileemail").val().trim();
                const phone = $(".phoneField").val().trim();

                let isValid = true;

                // Validate form fields
                if (firstName === "") {
                    $("#firstNameError").text("First Name is required.");
                    isValid = false;
                }
                if (lastName === "") {
                    $("#lastNameError").text("Last Name is required.");
                    isValid = false;
                }
                if (email === "") {
                    $(".profileemail").text("Email is required.");
                    isValid = false;
                }
                if (phone === "") {
                    $("#phoneError").text("Mobile Number is required.");
                    isValid = false;
                }

                if (!isValid) {
                    return;
                }

                // Prepare the data to be sent to the server
                const profileData = {
                    firstName: firstName,
                    lastName: lastName,
                    email: email,
                    phone: phone
                };

                // Make the AJAX request to the server
                $.ajax({
                    type: "POST",
                    url: "update_profile.php", // URL of the PHP script
                    data: profileData,
                    success: function (response) {
                        const data = JSON.parse(response);

                        if (data.success) {
                            // Update successful
                            Swal.fire({
                                icon: 'success',
                                title: 'Profile Updated',
                                text: 'Your profile was updated successfully!',
                                timer: 2000,
                                showConfirmButton: false
                            });

                            setTimeout(function () {
                                window.location.reload(); // Reload the page to reflect updated session values
                            }, 2000);
                        } else {
                            // Update failed
                            Swal.fire({
                                icon: 'error',
                                title: 'Update Failed',
                                text: data.message
                            });
                        }
                    },
                    error: function (xhr, status, error) {
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


    <!-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            const apiUrl = 'https://devrestapi.goquicklly.com/user/my-account';
            const bearerToken = "<?php echo $_SESSION['bearer_token']; ?>";
            const uid = localStorage.getItem('uid');

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

                    // console.log('Response status:', response.status, response.statusText);

                    if (!response.ok) {
                        throw new Error('Failed to fetch profile data');
                    }

                    const data = await response.json();
                    // console.log('API Response:', data); 
                    populateFormFields(data);

                } catch (error) {
                    console.error('Error:', error);
                }
            }

            function populateFormFields(data) {
                
                if (data && data.success && data.firstName) {
                    document.querySelector(".firstNameField").value = data.firstName || '';
                    document.querySelector(".lastNameField").value = data.lastName || '';
                    document.querySelector(".emailField").value = data.email || '';
                    document.querySelector(".phoneField").value = data.phone || '';
                } else {
                    console.log("Data fields are missing or structured differently in the API response.");
                }
            }

            loadUserProfile();
        });
    </script> -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const apiUrl = 'https://devrestapi.goquicklly.com/user/my-account';
            
            const bearerToken = "<?php echo $_SESSION['bearer_token']; ?>";
            
            const uid = "<?php echo $_SESSION['uid']; ?>";

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

            function populateFormFields(data) {
                if (data && data.success && data.firstName) {
                    document.querySelector(".firstNameField").value = data.firstName || '';
                    document.querySelector(".lastNameField").value = data.lastName || '';
                    document.querySelector(".emailField").value = data.email || '';
                    document.querySelector(".phoneField").value = data.phone || '';
                } else {
                    console.log("Data fields are missing or structured differently in the API response.");
                }
            }

            loadUserProfile();
        });
    </script>

    <script>
        document.querySelector('.phoneField').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
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