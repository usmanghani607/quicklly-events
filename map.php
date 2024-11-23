<?php

$latitude = isset($_GET['lat']) ? $_GET['lat'] : '0';
$longitude = isset($_GET['lng']) ? $_GET['lng'] : '0';
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> 
    <?php include 'header.php'; ?>
    <link rel="shortcut icon" href="images/favicon.png">
    <title>Get Directions</title>
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
        
        @media (max-width: 768px) {
            #map {
                height: 300px; /* Adjust for mobile screen */
            }
        }

        @media (max-width: 576px) {
            #map {
                height: 250px; /* Adjust for smaller mobile screens */
            }
        }
    </style>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7FCoN0eNTNGEsX6d-BUW-Uh1SiVzn2f0&callback=initMap">
    </script>
    <script>
        function initMap() {
            const location = {
                lat: parseFloat("<?php echo $latitude; ?>"),
                lng: parseFloat("<?php echo $longitude; ?>")
            };

            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: location,
            });

            const marker = new google.maps.Marker({
                position: location,
                map: map,
                title: "Event Location"
            });
        }
    </script>
</head>

<body>
    <div id="map"></div>

</body>

</html>