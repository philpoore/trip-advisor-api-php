<?php
require('TripAdvisor.php');
$TripAdvisor = new TripAdvisor('343eed02c74d42f9a00e471a7b3ec32d');
$TripAdvisor->updateIfNeeded('1892907');

// Get the last cached data
$data = $TripAdvisor->get('1892907');

// Uncomment the following line to see the data
// print_r($data);
die();
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Example Web Page</title>
</head>
<body>
	<h1>Example Web Page</h1>
	
	<? // Loop over each Review in $ta_data ?>
	<? foreach ($data->reviews as $review) :?>
		<div>
			<h2><?= $review->user->username; ?></h2>
			<h2><?= $review->user->user_location->name; ?></h2>
			<p><?= $review->text; ?></p>
			<a href='<?= $review->url; ?>'>Link</a>
		</div>
	<? endforeach;?>
</body>
</html>