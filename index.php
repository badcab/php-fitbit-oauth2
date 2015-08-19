<?php

require '../keys.php';

//https://github.com/thephpleague/oauth2-client

//these items are classes being passed in

$oAppCustomer = new AppCustomer($key, $secret);

//oAuth1aUserToken  ||  oAuth2UserToken
$ConnectionData = new ConnectionData( $oAppCustomer, $oUserToken );

//should add an interface for the endpoints
