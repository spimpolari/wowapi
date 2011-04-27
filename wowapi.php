<?php
class Armory {
	
	var $ArmoryZone; //Set the Armory Zone US = America EU = Europe
	var $JsonData;
	var $ApiName;
	var $OptionString;
	
	public function __construct($AZ) {
		$this->ArmoryZone = $AZ;
	}
	
	public function getDataWithApi($ApiName) {
		
		//init Curl
		$ch = curl_init();
		// set URL and other appropriate options
		curl_setopt($ch, CURLOPT_URL, "http://{$this->ArmoryZone}.battle.net/api/wow/".$ApiName);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		// grab URL and pass it to the browser
		$this->JsonData = curl_exec($ch);

		// close cURL resource, and free up system resources
		curl_close($ch);
	}
}

class Realm extends Armory  {
	
	var $RealmName;
	
	public function __construct($AZ, $RN = NULL) {
		
		$this->ApiName = "realm/status";
		parent::__construct($AZ);
		
		
		
		$this->RealmName = $RN;
	}
}

class Guild extends Armory {
	
}

class Character extends Armory {
	
}