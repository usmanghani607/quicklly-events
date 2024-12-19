<?php
// session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <?php include 'header-checkout.php'; ?>
    <link rel="shortcut icon" href="images/favicon.png">
</head>

<body style="background: #F8F8F8;">

    <div class="dashboard pass-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <div class="side-bar">
                        <button onclick="window.location.href='booking';"><img src="images/tickets.png" alt=""><span>My Bookings</span></button>
                        <button onclick="window.location.href='account';"><img src="images/profile.png" alt=""><span>Account Summary</span></button>
                        <button onclick="window.location.href='change-password';"><img src="images/key-bg.png" alt=""><span>Change Password</span></button>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="password">
                        <div class="heading">
                            <h2>Change Password</h2>
                        </div>

                        <!-- <div class="c-password-area">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="heading">
                                        <h3>Set New Password</h3>
                                    </div>
                                    <form action="change_password.php" method="POST">
                                        <div class="col-md-6 mb-3">
                                            <label for="" class="form-label">Current Password</label>
                                            <input type="password" class="form-control" name="oldPass" id="" placeholder="Enter current password">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="" class="form-label">New Password</label>
                                            <input type="password" class="form-control" name="newPass" id="" placeholder="Enter new password">
                                            <p>Minimum 6 characters</p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="" class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" name="newPass" id="" placeholder="Reenter password">
                                        </div>
                                    </div>
                                <div class="col-md-12">
                                    <div class="button-area">
                                        <button class="view" id="changePasswordBtn">Change Password</button>
                                        <button class="cancel">Cancel</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div> -->

                        <div class="c-password-area">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="heading">
                                        <h3>Set New Password</h3>
                                    </div>
                                    <form id="changePasswordForm" method="POST">
                                        <div class="col-md-6">
                                        <div class="col-md-6 mb-3">
                                            <label for="oldPass" class="form-label">Current Password</label>
                                            <input type="password" class="form-control" name="oldPass" id="oldPass" placeholder="Enter current password">
                                            <div id="oldPassError" class="error-message text-danger"></div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="newPass" class="form-label">New Password</label>
                                            <input type="password" class="form-control" name="newPass" id="newPass" placeholder="Enter new password">
                                            <p>Minimum 6 characters</p>
                                            <div id="newPassError" class="error-message text-danger"></div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="confirmPass" class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" name="confirmPass" id="confirmPass" placeholder="Reenter password">
                                            <div id="confirmPassError" class="error-message text-danger"></div>
                                        </div>
                                        </div>
                                        <div class="col-md-6"></div>
                                        <div class="col-md-12">
                                            <div class="button-area">
                                                <button type="submit" class="view" id="changePasswordBtn">Change Password</button>
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
                $("#changePasswordBtn").on("click", function(e) {
                    e.preventDefault();

                    var uid = localStorage.getItem("uid");
                    if (!uid) {
                        // Handle case where UID is missing
                        $("#toastBody").text('User ID not found.');
                        var toast = new bootstrap.Toast($('#toast'));
                        toast.show();
                        return; // Stop further execution if no UID
                    }

                    var passwordData = {
                        uid: uid,
                        oldPass: $("input[name='oldPass']").val(),
                        newPass: $("input[name='newPass']").val()
                    };

                    $.ajax({
                        type: "POST",
                        url: "change_password.php", // Assuming this is the correct path
                        data: passwordData,
                        success: function(response) {
                            var data = JSON.parse(response);

                            if (data.success) {
                                alert('Password changed successfully!');
                            } else {
                                alert('Error: ' + data.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            alert('An error occurred: ' + error);
                        }
                    });
                });
            });
        </script> -->

        <script>
            $(document).ready(function() {
                
                const uid = "<?php echo isset($_SESSION['value_user_id']) ? $_SESSION['value_user_id'] : ''; ?>";
                
                $("#changePasswordForm").on("submit", function(e) {
                    e.preventDefault();

                    $(".error-message").text("");

                    var oldPass = $("#oldPass").val().trim();
                    var newPass = $("#newPass").val().trim();
                    var confirmPass = $("#confirmPass").val().trim();
                    // var uid = localStorage.getItem("uid"); 

                    var isValid = true;

                    if (oldPass === "") {
                        $("#oldPassError").text("Current password is required.");
                        isValid = false;
                    }
                    if (newPass.length < 6) {
                        $("#newPassError").text("You must Enter at least 6 characters");
                        isValid = false;
                    }
                    if (newPass !== confirmPass) {
                        $("#confirmPassError").text("The passwords don’t match.");
                        isValid = false;
                    }

                    if (!isValid) {
                        return; 
                    }

                    var requestData = {
                        callFrom: "WEB", 
                        uid: uid,
                        oldPass: oldPass,
                        newPass: newPass
                    };

                    $.ajax({
                        type: "POST",
                        url: "https://devrestapi.goquicklly.com/user/change-pass", 
                        contentType: "application/json",
                        data: JSON.stringify(requestData), 
                        success: function(response) {
                            
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Password Changed',
                                    text: 'Your password has been successfully updated.',
                                    timer: 2000,
                                    showConfirmButton: false
                                });

                                setTimeout(function() {
                                    window.location.href = "account";
                                }, 2000);
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Failed to Change Password',
                                    text: response.message || 'Password change failed.'
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

                // $(".cancel").on("click", function() {
                //     window.location.href = "account"; 
                // });
            });
        </script>



</body>
<?php include 'signup-modal.php'; ?>


</html>