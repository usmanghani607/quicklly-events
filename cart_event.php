<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $json = file_get_contents('php://input');
    
    $cartEvents = json_decode($json, true);

    if ($cartEvents) {
        
        echo "Event Name: " . htmlspecialchars($cartEvents['name']) . "<br>";
        echo "Total Quantity: " . htmlspecialchars($cartEvents['totalcalcqty']) . "<br>";
        echo "Total Price: $" . htmlspecialchars($cartEvents['total']) . "<br>";
        echo "Service Fee: $" . htmlspecialchars($cartEvents['servicefeevalue']) . "<br>";
        echo "Remarks: " . htmlspecialchars($cartEvents['remarks']) . "<br>";
        
        if (isset($cartEvents['addOns']) && is_array($cartEvents['addOns'])) {
            echo "<h3>Add-Ons:</h3>";
            foreach ($cartEvents['addOns'] as $addOn) {
                echo "Name: " . htmlspecialchars($addOn['name']) . "<br>";
                echo "Quantity: " . htmlspecialchars($addOn['qty']) . "<br>";
                echo "Cost: $" . htmlspecialchars($addOn['cost']) . "<br>";
                echo "<hr>";
            }
        }
    } else {
        echo "Failed to decode JSON.";
    }
} else {
    echo "No data received.";
}
?>
