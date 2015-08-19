<?php

require '../keys.php';
//also require the other files


//https://github.com/thephpleague/oauth2-client

//these items are classes being passed in
// Consumer key

$oAppCustomer = new AppCustomer($conskey, $conssec);

//oAuth1aUserToken  ||  oAuth2UserToken
$ConnectionData = new ConnectionData( $oAppCustomer );

$connection = new Oauth1a($ConnectionData);

//should add an interface for the endpoints
