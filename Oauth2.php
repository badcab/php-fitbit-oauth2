<?php

class Oauth2 implaments ApiInterface {

	private $ConnectionData;

	__construct($ConnectionData){
		if($ConnectionData instanceof ConnectionData){
			$this->ConnectionData = $ConnectionData;
		}
	}

	public function getYearSteps(array $token = []);
	public function getRangeSteps(array $token = [], DateTme $start, DateTme $end);

	public function getYearDistance(array $token = []);
	public function getRangeDistance(array $token = [], DateTme $start, DateTme $end);

	public function migrateTokenFromOauth1aToOauth2(array $oauth1aToken = []){
		return NULL; //not yet necessary unless there is an oAuth3 released one day
	}

	public function getUserToken($input);
	public function setUserToken($input, $clear_cache = TRUE);
}