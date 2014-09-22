#Trip Advisor "Thing" for PHP Websites

Make sure the class in required at the top of the web page

```
<?php
require('TripAdvisor.php');
...
?>
```

Replace `API_KEY` and `LOCATION_ID`

#Class TripAdvisor
```
require('TripAdvisor.php');
$TripAdvisor = new TripAdvisor('API_KEY_HERE');
```

###Update Script
Run the update script every so oftern (15 min) to keep the local cache updated.
Add the following to cron scripts using `crontab -e`

```
*/15 * * * *	/FULL_PATH_TO_PHP/php /FULL_PATH_TO_PROJECT/update.php
```