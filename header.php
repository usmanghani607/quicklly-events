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
                                <form class="d-flex" role="search">
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

    <script>
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