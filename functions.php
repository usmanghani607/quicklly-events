<?php
function isMobile() {
    $userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);
    $mobileDevices = ['iphone', 'android', 'blackberry', 'windows phone', 'opera mini', 'mobile'];
    
    foreach ($mobileDevices as $device) {
        if (strpos($userAgent, $device) !== false) {
            return true;
        }
    }
    return false;
}
?>
