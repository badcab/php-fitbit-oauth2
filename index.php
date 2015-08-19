<?php

require '../keys.php';
//also require the other files


//https://github.com/thephpleague/oauth2-client

//these items are classes being passed in
// Consumer key

$oAppCustomer = new AppCustomer( $conskey, $conssec ); //these values are contained in keys.php

//oAuth1aUserToken  ||  oAuth2UserToken
$ConnectionData = new ConnectionData( $oAppCustomer );

$connection = new Oauth1a( $ConnectionData );//this can be switched

//set the token
//get the steps
//

//should add an interface for the endpoints
