<?php

// activate full error reporting
error_reporting(E_ALL & E_STRICT);

var_dump(__DIR__);
// Make sure composer dependencies have been installed
require __DIR__ . '/../vendor/XMPPHP/XMPP.php';

function send_message($server, $port, $from, $pass, $to) {
	#Use XMPPHP_Log::LEVEL_VERBOSE to get more logging for error reports
	#If this doesn't work, are you running 64-bit PHP with < 5.2.6?
	$conn = new XMPPHP_XMPP($server, $port, $from, $pass, 'xmpphp', 'foobar', $printlog=false, $loglevel=XMPPHP_Log::LEVEL_INFO);

	try {
	    $conn->connect();
	    $conn->processUntil('session_start');
	    $conn->presence();
	    $conn->message($to.'@server', 'This is a test message!');
	    $conn->disconnect();
	} catch(XMPPHP_Exception $e) {
	    die($e->getMessage());
	}
}



