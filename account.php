<?php
session_start();
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
                                                <input type="text" class="form-control phoneField" name="phone">
                                                <div id="phoneError" class="error-message text-danger"></div>
                                            </div>
                                        </div>
                                        <!-- <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="form-label">Mobile Number</label>
                                                <input type="text" class="form-control phoneField" name="phone">
                                                <div id="phoneError" class="error-message text-danger"></div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="form-label">Telephone Number</label>
                                                <input type="text" class="form-control tel" id="tel" placeholder="Telephone Number">
                                            </div>
                                        </div> -->
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

    <script>
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
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const apiUrl = 'https://devrestapi.goquicklly.com/user/my-account';
            // const bearerToken = localStorage.getItem('bearer_token');
            const bearerToken = "<?php echo $_SESSION['bearer_token']; ?>";
            const uid = localStorage.getItem('uid');

            // console.log('Bearer Token:', bearerToken);
            // console.log('User ID:', uid);

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
    </script>

</body>

</html>