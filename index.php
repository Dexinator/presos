  <link rel="stylesheet" href="style.css">
  		<h1> <img src="logo.png" id="imgprinc"></h1>
<?php
// Set the time range (e.g., only allow access between 9 AM and 5 PM)
$start_time = 0;  // 0
$end_time = 24;   // 6

// Get the current hour in 24-hour format
$current_hour = date('G'); 

// Check if the current hour is within the allowed range
if ($current_hour >= $start_time && $current_hour <= $end_time) {
    // Show the content of the PHP file
    require 'welcome.php';
    // Add the rest of your PHP code or content here
} else {
    // Show a message or redirect if it's outside of the allowed time
    echo "Sorry, Solo registramos presos en horario de servicio";
    // Alternatively, you can redirect to another page
    // header('Location: closed.html');
    exit;
}
?>
