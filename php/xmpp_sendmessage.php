<?php

// activate full error reporting
error_reporting(E_ALL & E_STRICT);

function is_ajax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

// Make sure composer dependencies have been installed
require __DIR__ . '/../vendor/XMPPHP/XMPP.php';

function send_message($to, $message='This is a test message!', $server='server', $port=5222, $from='abhishek', $pass='abhishek') {
	#Use XMPPHP_Log::LEVEL_VERBOSE to get more logging for error reports
	#If this doesn't work, are you running 64-bit PHP with < 5.2.6?
	$conn = new XMPPHP_XMPP($server, $port, $from, $pass, 'xmpphp', 'foobar', $printlog=false, $loglevel=XMPPHP_Log::LEVEL_INFO);

	try {
	    $conn->connect();
	    $conn->processUntil('session_start');
	    $conn->presence();
	    $conn->message($to.'@server', $message);
	    $conn->disconnect();
	    $ret = array("status" => 1, "error" => '', 'to' => $to.'@server');
	} catch(XMPPHP_Exception $e) {
		$ret = array("status" => 0, "error" => $e->getMessage());
	    //die($e->getMessage());
	}

	echo json_encode($ret);
}

if (is_ajax()) {
	$to = $_POST['to'];
	if(isset($_POST['message'])) {
		$message = $_POST['message'];
		send_message($to, $message);
	}
	else {
		send_message($to);
	}
}
else {
	var_dump("foo");
}

?>
