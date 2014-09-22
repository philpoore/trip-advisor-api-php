<?php
require('TripAdvisor.php');

$TA = new TripAdvisor('API_KEY');
$TA->update('LOCATION_ID');

?>