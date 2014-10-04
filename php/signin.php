<?php
    error_reporting(E_ALL);
    ini_set('display_errors', true);
    ini_set('html_errors', true);

    //var_dump($_POST);

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    function is_ajax() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }

    include "lib_couch.php";

    function main() {
    	global $username, $password;
        // Fetch the credentials from the db
        $resp = check_credentials($username);
        // 
        $rows = $resp['rows'];
        //echo($rows);
        if(count($rows)) {
        	$server_user = $rows[0]['key'];
        	//echo($server_user);

        	$server_pass = $rows[0]['value'];
        	//echo($server_pass." ");

			if (password_verify($password, $server_pass)) {
			    // Start a session
			    //$_COOKIE['session_name'] = session_id($username);
			    session_start();
			    $_SESSION['username'] = $server_user;
			    $_SESSION['password'] = $server_pass;

			    //$ret = array('status' => 'Valid password');
			    $ret = array('status' => 1, 'session' => 1);			    
			} else {
				//$ret = array('status' => 'Invalid password');
        		$ret = array('status' => 2);
			}
        }
        else {
        	//$ret = array('status' => 'User not found');
        	$ret = array('status' => 0);
        }
   
        // Pipe it to the browser 
        echo json_encode($ret);
    }

    if(is_ajax()) {
        main();
    }
?>