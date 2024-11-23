<!DOCTYPE html>
<html>

<head>

</head>

<body>
    <div class="topheader">
        <div class="container-fluid">
            <div class="row">

                <!-- <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
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
                                        <input type="text" class="form-control" id="email" placeholder="Enter email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="pass" class="col-form-label">Password</label>
                                        <input type="password" class="form-control" id="pass" placeholder="Enter password">
                                    </div>
                                    <div class="mb-3">
                                        <input type="checkbox" class="check-remember"><span>Remember me</span>
                                    </div>
                                    <div class="mb-3">
                                        <button type="button" id="loginBtn" class="login-btn">Login</button>
                                    </div>
                                    <div class="forgot-pass">
                                        <p><a href="change-password">Forgot Password?</a></p>
                                    </div>
                                    <div class="as-guest text-center">
                                        <a href="#">Continue as a Guest</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="signupModalLabel">Sign Up</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h2>Already have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">Log in</a></h2>
                                <form action="signup.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstName" class="col-form-label">First Name</label>
                                                <input type="text" name="firstName" class="form-control" placeholder="First Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="lastName" class="col-form-label">Last Name</label>
                                                <input type="text" name="lastName" class="form-control" placeholder="Last Name" required>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="address" class="col-form-label">Address</label>
                                            <input type="text" name="address" class="form-control" placeholder="Enter your address" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="apartment" class="col-form-label">Apartment, Suite, Building (Optional)</label>
                                            <input type="text" name="apartment" class="form-control" placeholder="Apartment, Suite, Building">
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="phone" class="col-form-label">Phone Number</label>
                                                <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="email" class="col-form-label">Email Address</label>
                                                <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="password" class="col-form-label">Password</label>
                                                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="confirmPassword" class="col-form-label">Confirm Password</label>
                                                <input type="password" name="confirmPassword" class="form-control" placeholder="Confirm Password" required>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <button type="submit" class="login-btn btn btn-primary">Register</button>
                                        </div>
                                        <div class="as-guest text-center">
                                            <a href="#">Continue as a Guest</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</body>

<!-- <script>
    $(document).ready(function() {
        
        updateUI();

        $("#loginBtn").on("click", function() {
            var email = $("#email").val();
            var password = $("#pass").val();

            $.ajax({
                type: "POST",
                url: "login.php",
                data: {
                    email: email,
                    pass: password
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    $("#toastBody").text(data.message);

                    if (data.success) {
                        
                        localStorage.setItem('firstName', data.firstName);

                        updateUI();

                        var toast = new bootstrap.Toast($('#toast'));
                        toast.show();

                        setTimeout(function() {
                            window.location.href = 'index';
                        }, 1500);
                    } else {
                        
                        var toast = new bootstrap.Toast($('#toast'));
                        toast.show();
                    }
                },
                error: function(xhr, status, error) {
                    $("#toastBody").text('An error occurred: ' + error);
                    var toast = new bootstrap.Toast($('#toast'));
                    toast.show();
                }
            });
        });

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
            updateUI();
            $("#toastBody").text('Logged out successfully.'); 
            var toast = new bootstrap.Toast($('#toast'));
            toast.show();
        });


    });
</script> -->

</html>