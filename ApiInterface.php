<?php

interface ApiInterface {
	public function getYearSteps(array $token = []);
	public function getRangeSteps(array $token = [], DateTme $start, DateTme $end, $oauth2 = TRUE);

	public function getYearDistance(array $token = []);
	public function getRangeDistance(array $token = [], DateTme $start, DateTme $end, $oauth2 = TRUE);

	public function migrateTokenFromOauth1aToOauth2(array $oauth1aToken = []);

	public function getUserToken($input);
	public function setUserToken($input, $clear_cache = TRUE);

	private $ConnectionData;
}

class ConnectionData {
	public $oAppCustomer ;
	public $oUserToken ;
	public $use_oAuth2 ;
	public $stepHistory ;
	public $distanceHistory ;
	public $uniqueIdentifyer ;

	__construct( $oAppCustomer, $oUserToken = NULL ){
		$this->uniqueIdentifyer = NULL;
		$this->stepHistory = new MonthsOfYear();
		$this->distanceHistory = new MonthsOfYear();
		$this->use_oAuth2 = NULL; //default full in case it needs to be set latter

		if ($oUserToken instanceof oAuth1aUserToken) {
			$this->oUserToken = $oUserToken ;
			$this->use_oAuth2 = FALSE;
		}

		if ($oUserToken instanceof oAuth2UserToken) {
			$this->oUserToken = $oUserToken ;
			$this->use_oAuth2 = TRUE;
		}

		if ($oAppCustomer instanceof AppCustomer) {
			$this->oAppCustomer = $oAppCustomer ;
		}
	}
}

class MonthsOfYear {
	public $January ;
	public $February ;
	public $March ;
	public $April ;
	public $May ;
	public $June ;
	public $July ;
	public $August ;
	public $September ;
	public $October ;
	public $November ;
	public $December ;
}

//add interface for tokens

class AppCustomer {
	public $secret ;
	public $key ;

	__construct($key, $secret){
		$this->key = $key;
		$this->secret = $secret;
	}
}

class oAuth1aUserToken {}

class oAuth2UserToken {}
