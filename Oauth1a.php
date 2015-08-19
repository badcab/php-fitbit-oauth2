<?php

class Oauth1a implaments ApiInterface {

	private $ConnectionData;

	__construct($ConnectionData){
		if($ConnectionData instanceof ConnectionData){
			$this->ConnectionData = $ConnectionData;
		}
	}

	public function getYearSteps(array $token = [], $oauth2 = TRUE);
	public function getRangeSteps(array $token = [], DateTme $start, DateTme $end, $oauth2 = TRUE);

	public function getYearDistance(array $token = [], $oauth2 = TRUE);
	public function getRangeDistance(array $token = [], DateTme $start, DateTme $end, $oauth2 = TRUE);

	public function migrateTokenFromOauth1aToOauth2(array $oauth1aToken = []);

	public function getUserToken($input);
	public function setUserToken($input, $clear_cache = TRUE);
}