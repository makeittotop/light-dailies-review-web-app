<?php
    error_reporting(E_ALL);
    ini_set('display_errors', true);
    ini_set('html_errors', true);

    //var_dump($_POST);
    
    function is_ajax() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }

    //server
    $server = "http://127.0.0.1:5984/";
    $database = 'employee';

    function main() {
        // CHECK DB
        check_db();

        // ADD A DOC
        $resp = put_doc();
        
        echo json_encode($resp);
    }

    if(is_ajax()) {
        main();
    }
?>