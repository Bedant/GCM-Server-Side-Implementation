<?php


// API access key from Google API's Console
define( 'API_ACCESS_KEY', 'AIzaSyCAWLd58mb9n6F3mM5r8qcs7pxTGkOEWtQ' );


$registrationIds = array("fwXBr173Cbg:APA91bG_jwO576Zf7ylHad67JDPVp6Q09bmbU_c3uoyrMPCL5FmpMbbz7r6-Cceyz0ReYd68NdoZZbaIAzC8wvh8C3HeSiBMraemGOFrpPEmF0Ydx12Tgk_2lF-d8YGvpF6FQKekYaPS" );

// prep the bundle
$msg = array
(
    'message'       => 'Welcome to Moriz',
    'tag'         => 'IO',
    'phone'      => '7204773534',
    'tickerText'    => 'Ticker text here...Ticker text here...Ticker text here',
    'vibrate'   => 1,
    'sound'     => 1
);

$fields = array
(
	'to'=>  '/topics/global',
    'data'              => $msg
);

$headers = array
(
    'Authorization: key=' . API_ACCESS_KEY,
    'Content-Type: application/json'
);

$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
$result = curl_exec($ch );
curl_close( $ch );

echo $result;
?>