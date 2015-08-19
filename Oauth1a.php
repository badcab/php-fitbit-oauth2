<?php

class Oauth1a implaments ApiInterface {

	private $ConnectionData;

	__construct($ConnectionData){
		if($ConnectionData instanceof ConnectionData){
			$this->ConnectionData = $ConnectionData;
		}
	}

	public function getYearSteps(array $token = []){

		$oauth = new OAuth(
			$ConnectionData->oAppCustomer->key,
			$ConnectionData->oAppCustomer->secret,
			OAUTH_SIG_METHOD_HMACSHA1,
			OAUTH_AUTH_TYPE_AUTHORIZATION
		);

		$baseUrl = 'https://api.fitbit.com';

		$oauth->setToken($token['token'],$token['secret']);

		$api_uri = $baseUrl . '/1/user/-/activities/steps/date/'.date('Y-m-01',strtotime('-11 months')).'/'.date('Y-m-t',strtotime('now')).'.json';
		$oauth->fetch($api_uri);
		$response = $oauth->getLastResponse();
		$results = json_decode($response,TRUE);
		$steps = array();

		foreach ($results['activities-steps'] as $day) {
			$m = date('F',strtotime($day['dateTime']));
			if(!isset($steps[$m])){
				$steps[$m] = 0;
			}
			$steps[$m] += (int)$day['value'];
		}

		//return array_sum($steps);

		$steps['details'] = $results;

//here we need to do something to store the results or something
	}
	public function getRangeSteps(array $token = [], DateTme $start, DateTme $end){

		//add a token check here

		$oauth = new OAuth(
			$ConnectionData->oAppCustomer->key,
			$ConnectionData->oAppCustomer->secret,
			OAUTH_SIG_METHOD_HMACSHA1,
			OAUTH_AUTH_TYPE_AUTHORIZATION
		);

		$baseUrl = 'https://api.fitbit.com';

		$oauth->setToken($token['token'],$token['secret']);

		$api_uri = $baseUrl . '/1/user/-/activities/steps/date/'.$start->format('Y-m-d').'/'.$end->format('Y-m-d').'.json';
		$oauth->fetch($api_uri);
		$response = $oauth->getLastResponse();
		$results = json_decode($response,TRUE);
		$steps = array();

		foreach ($results['activities-steps'] as $day) { //not necessary but leaving as above for now
			$m = date('F',strtotime($day['dateTime']));
			if(!isset($steps[$m])){
				$steps[$m] = 0;
			}
			$steps[$m] += (int)$day['value'];
		}

		return array_sum($steps);
	}

	public function getYearDistance(array $token = []);
	public function getRangeDistance(array $token = [], DateTme $start, DateTme $end);

	public function migrateTokenFromOauth1aToOauth2(array $oauth1aToken = []);

	public function getUserToken($input);
	public function setUserToken($input, $clear_cache = TRUE);
}