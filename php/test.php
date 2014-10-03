<?php
//phpinfo();

$a = array(1, 2, array("a", "b", "c"));
//var_dump($a);

var_dump($_POST['action']);

var_dump($_SERVER['HTTP_X_REQUESTED_WITH']);
/*$_SERVER['HTTP_X_REQUESTED_WITH']
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'http://127.0.0.1:5984/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'Content-type: application/json',
	'Accept: 
));
 
$response = curl_exec($ch);
 
var_dump($response);

curl_close($ch);
*/

?>
