<?php

$response = wp_remote_get('https://bwiairport.com/wp-content/themes/bwitheme/cron/parking-availability.php');
if (is_wp_error($response)) {
    echo "Error: " . $response->get_error_message();
} else {
    $body = wp_remote_retrieve_body($response);
    echo "Parking Availability: " . $body;
}



?>