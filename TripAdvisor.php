<?php

class TripAdvisor {
	private $api_key;
	private $CACHE_UPDATE_INTERVAL = 60;	// 60 seconds

	public function __construct($api_key){
		$this->api_key = $api_key;
	}
	
	public function update($location_id){
		$filename = dirname(__FILE__) . '/ta_data/' . $location_id . '.json';
		$url = "http://api.tripadvisor.com/api/partner/2.0/location/" . $location_id . "?key=" . $this->api_key;
		
		$data = file_get_contents($url);
		file_put_contents($filename, $data);

		// print("Updated ".$filename);
	}

	public function updateIfNeeded($location_id){
		$filename = dirname(__FILE__) . '/ta_data/' . $location_id . '.json';

		$file_mtime = @filemtime($filename);
		$now = time();
		$file_mtime_offset = $now - $file_mtime;
		if ($file_mtime_offset > $this->CACHE_UPDATE_INTERVAL){
			file_put_contents(dirname(__FILE__) ."/TripAdvisorAPI.log", "[$now] Updating $filename because its $file_mtime_offset seconds old.\n", FILE_APPEND);
			$this->update($location_id);
		}else{
			file_put_contents(dirname(__FILE__) ."/TripAdvisorAPI.log", "[$now] Skipping Update because its $file_mtime_offset seconds old.\n", FILE_APPEND);
		}
	}
	
	public function get($location_id){
		$filename = dirname(__FILE__) . '/ta_data/' . $location_id . '.json';
		$data = file_get_contents($filename);
		return json_decode($data);
	}
}

?>
