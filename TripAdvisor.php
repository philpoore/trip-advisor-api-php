<?php

class TripAdvisor {
	private $api_key;
	
	public function __construct($api_key){
		$this->api_key = $api_key;
	}
	
	public function update($location_id){
		$filename = dirname(__FILE__) . '/ta_data/' . $location_id . '.json';
		$url = "http://api.tripadvisor.com/api/partner/2.0/location/" . $location_id . "?key=" . $this->api_key;
		
		$data = file_get_contents($url);
		file_put_contents($filename, $data);
		
		print("Updated ".$filename);
	}
	
	public function get($location_id){
		$filename = dirname(__FILE__) . '/ta_data/' . $location_id . '.json';
		$data = file_get_contents($filename);
		return json_decode($data);
	}
}

?>