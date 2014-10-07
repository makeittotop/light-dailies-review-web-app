<?php
// As an object set
$s = new SplObjectStorage();

$o1 = new StdClass;
$o2 = new StdClass;
$o3 = new StdClass;

$o4 = "abhi";

$s->attach($o4);
$s->attach($o1);
$s->attach($o2);

var_dump($s->contains($o1));
var_dump($s->contains($o2));
var_dump($s->contains($o3));
var_dump($s->contains($o4));

$s->detach($o2);

var_dump($s->contains($o1));
var_dump($s->contains($o2));
var_dump($s->contains($o3));

/*
phpinfo();

$a = array(1, 2, array("a", "b", "c"));
//var_dump($a);

var_dump($_POST['action']);
setcookie("user", "fo");

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
