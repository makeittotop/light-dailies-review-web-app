<?php

    //server
    $server = "http://127.0.0.1:5984/";
    $database = 'employee';

    function get_data($arg) {
        //init
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $arg);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, '');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-type: application/json',
            'Accept: */*'
        ));
         
        $resp_json = curl_exec($ch);
        curl_close($ch);

        //var_dump($resp_json);
        return json_decode($resp_json, true);
    }

    function check_db() {
        global $server, $database;
        $arg = $server.$database;
        $db = get_data($arg);
        //print("database: ".$db["db_name"]);

        return $db;
    }

    function get_uuid() {
        global $server, $database;

        $arg = $server.'_uuids';
        $uuid = get_data($arg);
        //print("uuid: ".$uuid['uuids'][0]."\n");

        return $uuid['uuids'][0];
    }

    function put_data($arg, $payload) {
        //init
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $arg);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, '');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-type: application/json',
            'Accept: */*'
        ));

        $resp_json = curl_exec($ch);
        curl_close($ch);

        return json_decode($resp_json, true);
    }

    function put_doc() {
        global $server, $database;
        global $username, $password;
        // Prepare a doc
        $doc = array(
            'name' => $username,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ); 
        // GET A UUID
        $uuid = get_uuid();
        $arg = $server.$database.'/'.$uuid;
        $payload = json_encode($doc);

        //var_dump($payload);

        $resp = put_data($arg, $payload);

        //var_dump($resp);
        /*
        if($resp['ok'] == true) {
            print("User added: ".$username);
        }
        */
        
        return $resp;
    }

    function check_credentials($username) {
        global $server, $database;
        // http://localhost:5984/employee/_design/view_name/_view/_by_name?key="abhishek"
        $arg = $server.$database."/_design/view_name/_view/_by_name?key=\"".$username."\"";
        $resp = get_data($arg);

        return $resp;
    }

?>